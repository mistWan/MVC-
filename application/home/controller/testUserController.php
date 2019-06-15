<?php


namespace home\controller;


use framework\core\Controller;
use framework\core\Factory;
use framework\tools\Captcha;
use framework\tools\Email;
use framework\tools\Validate;

class testUserController extends Controller
{
    public function registerAction()
    {
        $this->smarty->display("user/register.html");
    }

    public function doRegisterAction()
    {
        $data = array('activate_code'=>111,'username'=>222, 'email'=>333);
        $title = "注册成功，请点击激活";
        $active_link = <<<HTML
<a href="http://iou.cn/index.php?m=home&c=user&a=activeAction&code={$data['activate_code']}&user={$data['username']}">点击激活</a>
HTML;
        $res = Email::send($title, $active_link, $data['email']);
        if ($res){
            echo "成功！";
        } else {
            echo "失败？";
        }
    }

    public function loginAction()
    {
        $this->smarty->display('user/login.html');
    }


    public function msmAction()
    {
        $this->smarty->display('user/msm_register.html');
    }

    public function MsgRegisterAction()
    {
        $this->smarty->display('user/do_register.html');
    }

    public function makeCaptchaAction()
    {
        $captcha = new Captcha();
        $captcha->font_file = FONT_PATH . 'STHUPO.TTF';
        $captcha->makeImage();
    }

    public function activeAction()
    {
        $user_model = Factory::model("User");
        $user_info = $user_model->checkUserCode($_GET['user'], $_GET['code']);
        if ($user_info) {
            if (time() - $user_info['reg_time'] > 24 * 3600) {
                if ($user_info['activate_code'] == 1) {
                    $this->jump('?c=user&a=loginAction', "<b>Error</b>: The account is activated, please login !");
                } else {
                    $data['activate_code'] = 1;
                    $where = array('user_id' => $user_info['user_id']);
                    $user_res = $user_model->update($data, $where);
                    if ($user_res) {
                        $this->jump('?c=user&a=loginAction', "<i>Succeed</i>: The account is activated, please login !");
                    } else {
                        $this->jump('?c=user&a=registerAction', "<b>Error</b>: Activation fails !");
                    }
                }
            } else {
                $this->jump('?c=user&a=registerAction', "<b>Error</b>: Activation expired, please resend activation email !");
            }
        } else {
            $this->jump('?c=user&a=registerAction', "<b>Error</b>: Please resend the activation email !");
        }
    }
}

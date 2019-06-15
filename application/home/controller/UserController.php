<?php


namespace home\controller;


use framework\core\Controller;
use framework\core\Factory;
use framework\tools\Captcha;
use framework\tools\Email;
use framework\tools\Message;
use framework\tools\Validate;

class UserController extends Controller
{
    public function registerAction()
    {
        $this->smarty->display("user/register.html");
    }

    public function doRegisterAction()
    {
        if ($_POST['agreement_chk']) {
//            session_start();
            if (strtolower($_SESSION['code']) == strtolower($_POST['seccode_verify'])) {
                $validate = new Validate();
                $user = $validate->checkUser($_POST['user_name']);
                $email = $validate->checkEmail($_POST['email']);
                $pass = $validate->checkPass($_POST['password']);

                if ($user && $email && $pass) {
                    $user_model = Factory::model("User");
                    $hasEmail = $user_model->hasUserEmail($_POST['user_name'], $_POST['email']);

                    if ($hasEmail) {
                        $this->jump('?c=user&a=registerAction', "<b>Error</b>: Username or email already exists !");
                    } else {
                        $data['username'] = $_POST['user_name'];
                        $data['password'] = md5($_POST['password']);
                        $data['email'] = $_POST['email'];
                        $data['is_active'] = 0;
                        $data['reg_time'] = time();
                        $data['activate_code'] = md5(mt_rand(1000, 9999) . time());
                        $user_info = $user_model->insert($data);

                        if ($user_info) {
                            $title = "注册成功，请点击激活";
                            $active_link = <<<HTML
<a href="http://iou.cn/index.php?m=home&c=user&a=activeAction&code={$data['activate_code']}&user={$data['username']}">点击激活</a>
HTML;
                            $res_email = Email::send($title, $active_link, $data['email']);
                            if ($res_email) {
                                $this->jump('?c=user&a=loginAction', "<i>Succeed: Mail registration succeeded !</i>");
                            } else {
                                $this->jump('?c=user&a=registerAction', "<b>Error</b>: Mail registration failed !");
                            }
                        }
                    }
                } else {
                    $this->jump('?c=user&a=registerAction', $validate->showError());
                }
            } else {
                $this->jump('?c=user&a=registerAction', "<b>Error</b>: Please enter correct verify code !");
            }
        } else {
            $this->jump('?c=user&a=registerAction', "<b>Error</b>: Please agree to the user agreement first !");
        }
    }

    public function loginAction()
    {
        $this->smarty->display('user/login.html');
    }

    public function doLoginAction()
    {
        $user = $_POST['user_name'];
        $pass = md5($_POST['password']);
        $user_model = Factory::model('User');
        $user_info = $user_model->checkUserPass($user, $pass);
        if ($user_info) {
            if ($user_info['is_active'] == 1) {
                if (isset($_POST['net_auto_login'])) {
                    setcookie('user', $user_info['username'], time() + 7 * 24 * 3600);
                    setcookie('pass', $user_info['password'], time() + 7 * 24 * 3600);
                }
//                session_start();
//                $_SESSION['nick'] = $user_info['username'];
                $_SESSION['nick'] = $user_info;
                $this->jump('index.php', "<i>Succeed to login in !</i>");
            } else {
                $this->jump('?c=user&a=loginAction', "<b>Error</b>: Please activate before login !");
            }
        } else {
            $this->jump('?c=user&a=loginAction', "<b>Error</b>: wrong user name or password !");
        }
    }

    public function logoutAction()
    {
//        session_start();
        unset($_SESSION['nick']);
        setcookie('user', '', time() - 1);
        setcookie('pass', '', time() - 1);
        $this->jump('?c=user&a=loginAction', '<i>Succeed to logout !</i>');
    }

    public function msmAction()
    {
        $this->smarty->display('user/msm_register.html');
    }

    public function sendMessageAction()
    {
        /*        echo '<pre>';
                var_dump($_POST);
                die();*/
        if (isset($_POST['agreement_chk'])) {
//            session_start();
            if (strtolower($_SESSION['code']) == strtolower($_POST['seccode_verify'])) {
                $validate = new Validate();
                $tel = $validate->checkTel($_POST['phone']);
                if ($tel) {
                    $message = new Message();
                    $code = mt_rand(1000, 9999);
                    $expire = $GLOBALS['config']['expire_time'];
                    $tempID = $GLOBALS['config']['tempId'];
                    $data = array($code, $expire);
                    $message->sendTemplateSMS($_POST['phone'], $data, $tempID);

                    $msg['phone'] = $_POST['phone'];
                    $msg['code'] = $code;
                    $msg['send_time'] = time();
                    $msg_model = Factory::model('Message');
                    $ins = $msg_model->insert($msg);
                    if ($ins) {
                        $this->jump('?c=user&a=MsgRegisterAction', '<i>Succeed to send message !</i>');
                    } else {
                        $this->jump('?c=user&a=msmAction', "<b>Error</b>: Failed to send !");
                    }
                } else {
                    $this->jump('?c=user&a=msmAction', "<b>Error</b>: Please enter correct tel !");
                }
            } else {
                $this->jump('?c=user&a=msmAction', "<b>Error</b>: Please enter correct verify code !");
            }
        } else {
            $this->jump('?c=user&a=msmAction', "<b>Error</b>: Please agree to the user agreement first !");
        }
    }

    public function MsgRegisterAction()
    {
        $this->smarty->display('user/do_register.html');
    }


    public function doSubmitAction()
    {
        if ($_POST['agreement_chk']) {
//            session_start();
            if (strtolower($_SESSION['code']) == strtolower($_POST['seccode_verify'])) {
                $validate = new Validate();
                $user = $validate->checkUser($_POST['user_name']);
                $tel = $validate->checkTel($_POST['msm']);
                $pass = $validate->checkPass($_POST['password']);
                if ($user && $tel && $pass) {
                    $user_model = Factory::model("User");
                    $hasTel = $user_model->hasUserTel($_POST['user_name'], $_POST['msm']);
                    if (!$hasTel) {
                        $msg_model = Factory::model('Message');
                        $send_time = $msg_model->hasTelCode($_POST['msm'], $_POST['msm_code']);
                        /*echo '<pre>';
                        var_dump($send_time);
                        die();*/
                        if ((time() - $send_time['send_time']) < $GLOBALS['config']['expire_time'] * 60000) {
                            $data['username'] = $_POST['user_name'];
                            $data['password'] = md5($_POST['password']);
                            $data['phone'] = $_POST['msm'];
                            $data['is_active'] = 1;
                            $user_reg = $user_model->insert($data);
                            if ($user_reg) {
                                $this->jump('?c=user&a=loginAction', "<i>Succeed: Mail registration succeeded !</i>");
                            } else {
                                $this->jump('?c=user&a=MsgRegisterAction', "<b>Error</b>: registration failed !");
                            }
                        } else {
                            $this->jump('?c=user&a=MsgRegisterAction', "<b>Error</b>: Verification code expired !");
                        }
                    } else {
                        $this->jump('?c=user&a=MsgRegisterAction', "<b>Error</b>: Username or telephone already exists !");
                    }
                } else {
                    $this->jump('?c=user&a=MsgRegisterAction', $validate->showError());
                }
            } else {
                $this->jump('?c=user&a=MsgRegisterAction', "<b>Error</b>: Please enter correct verify code !");
            }
        } else {
            $this->jump('?c=user&a=MsgRegisterAction', "<b>Error</b>: Please agree to the user agreement first !");
        }
    }

    public function makeCaptchaAction()
    {
        $captcha = new Captcha();
        $captcha->font_file = FONT_PATH . 'OpenSans-Bold.ttf';
        $captcha->makeImage();
    }

    public function activeAction()
    {
        $user_model = Factory::model("User");
        $user_info = $user_model->checkUserCode($_GET['user'], $_GET['code']);
        if ($user_info) {
            if (time() - $user_info['reg_time'] < 24 * 3600) {
                if ($user_info['is_active'] == 1) {
                    $this->jump('?c=user&a=loginAction', "<b>Error</b>: The account is activated, please login !");
                } else {
                    $data['is_active'] = 1;
                    $where = array('user_id' => $user_info['user_id']);
                    $user_res = $user_model->update($data, $where);
                    if ($user_res) {
                        $this->jump('?c=user&a=loginAction', "<i>Succeed: The account is activated, please login !</i>");
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

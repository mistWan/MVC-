<?php


namespace framework\core;


class Controller
{
    protected $smarty;

    public function __construct()
    {
        $this->initTimezone();
        $this->initSmarty();
        $this->initSession();
    }

    public function initSession()
    {
        session_start();
    }

    public function initTimezone()
    {
        date_default_timezone_set("PRC");
    }

    public function initSmarty()
    {
        $this->smarty = new \Smarty();
        $this->smarty->left_delimiter = '<{';
        $this->smarty->right_delimiter = '}>';
//        $this->smarty->setTemplateDir('./application/'.MODULE.'/view/');
//        $this->smarty->setCompileDir('./application/'.MODULE.'/runtime/view/tpl_c');
        $this->smarty->setTemplateDir(APP_PATH . MODULE . '/view/');
        $this->smarty->setCompileDir('./runtime/view/tpl_c');
    }

    public function jump($url, $msg, $delay = 3)
    {
        header("Refresh:$delay;url=$url");
        echo $msg;
        die();
    }

    public function isLogin()
    {
//        session_start();
        if (!isset($_SESSION['nick'])) {
            if (!isset($_COOKIE['user'])) {
                $this->jump('?c=user&a=loginAction', "<b>Error:</b>Illegal access, please log in !");
            } else {
                $user_model = Factory::model("User");
                $user_res = $user_model->checkUserPass($_COOKIE['user'], $_COOKIE['pass']);
                if (!$user_res) {
                    $this->jump('?c=user&a=loginAction', "<b>Error:</b>The password has expired, please log in again !");
                } else {
                    $_SESSION['nick'] = $_COOKIE['user'];
                }
            }
        }
    }
}

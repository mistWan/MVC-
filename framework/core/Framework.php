<?php


namespace framework\core;


class Framework
{
    public function __construct()
    {

        $this->initPathinfo();
        $this->initConst();
        $this->autoload();
        $framework_config = $this->loadFrameworkConfig();
        $common_config = $this->loadCommonConfig();
        $GLOBALS['config'] = array_merge($framework_config, $common_config);
        $this->initMCA();
        $module_config = $this->loadModuleConfig();
        $GLOBALS['config'] = array_merge($GLOBALS['config'], $module_config);
        $this->dispatch();
    }

    public function initPathinfo()
    {
//        var_dump($_SERVER['PATH_INFO']);
//        die();
//        /admin/question/add.html
        if (isset($_SERVER['PATH_INFO'])) {
            $path = $_SERVER['PATH_INFO'];
            $last_fix = strstr($path, '.');
            $path = str_replace($last_fix, '', $path);
            $path = substr($path, 1);
            $arr = explode('/', $path);
            $len = count($arr);
            if ($len == 1) {
                $_GET['m'] = $arr[0];
            } elseif ($len == 2) {
                $_GET['m'] = $arr[0];
                $_GET['c'] = $arr[1];
            } elseif ($len == 3) {
                $_GET['m'] = $arr[0];
                $_GET['c'] = $arr[1];
                $_GET['a'] = $arr[2];
            } else {
                $_GET['m'] = $arr[0];
                $_GET['c'] = $arr[1];
                $_GET['a'] = $arr[2];
                for ($i = 3; $i < $len; $i += 2) {
                    $_GET[$arr[$i]] = $arr[$i+1];
                }
            }
        }
    }

    public function autoload()
    {
        spl_autoload_register(array($this, 'autoloader'));
    }

    public function autoloader($className)
    {
//        echo "We need => " . $className . '<br>';
        if ($className == 'Smarty') {
            require './framework/vendor/smarty/Smarty.class.php';
        }
        $arr = explode('\\', $className);
        if ($arr[0] == 'framework') {
            $base_path = './';
        } else {
            $base_path = './application/';
        }
        $file_path = str_replace('\\', '/', $className);
        $class_file = $base_path . $file_path . '.php';
        if (file_exists($class_file)) {
            require_once $class_file;
        }
    }

    public function initMCA()
    {
        $module = isset($_GET['m']) ? $_GET['m'] : $GLOBALS['config']['default_model'];
        define('MODULE', $module);
        $controller = isset($_GET['c']) ? $_GET['c'] : $GLOBALS['config']['default_controller'];
        define('CONTROLLER', $controller);
        $action = isset($_GET['a']) ? $_GET['a'] : $GLOBALS['config']['default_action'];
        if (substr($action, -6) != 'Action') {
            $action .= "Action";
        }
        define('ACTION', $action);
    }

    public function dispatch()
    {
        $controller_name = MODULE . '\controller\\' . CONTROLLER . 'Controller';
        $controller = new $controller_name;
        $action = ACTION;
        $controller->$action();
    }

    private function loadFrameworkConfig()
    {
        $config = './framework/config/config.php';
        return require_once $config;
    }

    private function loadCommonConfig()
    {
        $config = './application/common/config/config.php';
        if (file_exists($config)) {
            return require_once $config;
        } else {
            return array();
        }
    }

    private function loadModuleConfig()
    {
        $config = './application/' . MODULE . '/config/config.php';
        if (file_exists($config)) {
            return require_once $config;
        } else {
            return array();
        }
    }

    public function initConst()
    {
        define('ROOT_PATH', str_replace('\\', '/', getcwd() . '/'));
//        define('APP_PATH', ROOT_PATH.'application/');
//        define('FRAMEWORK_PATH', ROOT_PATH.'framework/');
        define('APP_PATH', ROOT_PATH . 'application/');
        define('FRAMEWORK_PATH', ROOT_PATH . 'framework/');
        define('PUBLIC_PATH', '/iou.cn/application/public/');
        define('UPLOADS_PATH', './application/public/uploads/');
        define('THUMB_PATH', './application/public/thumb/');
        define('FONT_PATH', './application/public/fonts/');
    }
}

<?php


namespace framework\core;
/*
 * 工厂类，功能是根据用户传递的模型类，返回单例的模型对象
 */

class Factory
{
    static public function model($modelName)
    {

        if (substr($modelName, -5) != "Model") {
            $modelName .= "Model";
        }
        if (!strstr($modelName, "\\")) {
            $modelName = MODULE . "\model\\" . $modelName;
        }
//        echo $modelName;
        static $model_list = array();
        if (!isset($model_list[$modelName])) {
            $model_list[$modelName] = new $modelName;
        }
        return $model_list[$modelName];
    }
//    static function newClass()
//    {
//        $class = 'framework\core\UserModel';
//        new $class;
//    }

    static public function URL($mca, $params = array())
    {
        $root = $_SERVER['SCRIPT_NAME'];
        $root = str_replace('index.php', '', $root);
        $root = $root . $mca;
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                $root .= '/' . $key . '/' . $val;
            }
            $root .= '.html';
        }
        return $root;
    }
}

//class UserModel
//{
//    public function __construct()
//    {
//        echo 'isOK';
//    }
//}
//$m1 = Factory::newClass();
//$m2 = Factory::newClass();
//$m3 = Factory::newClass();
//echo "<pre>";
//
//var_dump($m1,$m2,$m3);

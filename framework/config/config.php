<?php
return array(
    # 数据库配置
    'host' => '127.0.0.1',
    'user' => 'root',
    'pass' => 'root',
    'dbname' => 'ask',
    'port' => 3306,
    'charset' => 'utf8',

    'table_fix' => '',
    # 默认页面
    'default_model' => 'home',
    'default_controller' => 'Index',
    'default_action' => 'indexAction',

    //邮件服务器的配置
    'email_host' => 'smtp.163.com',      //邮件服务器主机地址
    'sender' => '18772930944@163.com', //发送者的邮箱
    'nickname' => 'iou.cn',           //昵称
    'account' => '18772930944',         //发送者邮箱账号
    'token' => '263008sqm',         //授权码

    'accountSid' => '8a216da8661968050166203cbca5054d',
    'accountToken' => 'c013f8b1958948a594570e55e2f6f01c',
    'appId' => '8a216da8661968050166203cbd020554',
    'serverIP' => 'app.cloopen.com',
    'serverPort' => '8883',
    'softVersion' => '2013-12-26',
    'expire_time' => 5,  //验证码有效期
    'tempId' => 1   //短信模板，测试账号的模板是1
);

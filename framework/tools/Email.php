<?php
namespace framework\tools;
use framework\vendor\PHPMailer\PHPMailer;

/*
 * 使用PHPMailer发送邮件的代码
 */
class Email
{
    //发送邮件
    //参数1：邮件的标题
    //参数2：邮件的内容
    //参数3：接收者的邮箱地址
    public static function send($title,$content,$getter)
    {
        //发送邮件：以我的163邮箱，给我的QQ邮箱发送邮件
        //引入需要的核心类文件
        //实例化对象
        $mail = new PHPMailer();

        //3.设置属性，告诉我们的服务器，谁跟谁发送邮件
        $mail -> IsSMTP();			//告诉服务器使用smtp协议发送
        $mail -> SMTPAuth = true;		//开启SMTP授权
        $mail -> Host = $GLOBALS['config']['email_host'];	//告诉我们的服务器使用163的smtp服务器发送
        $mail -> From = $GLOBALS['config']['sender'];	//发送者的邮件地址
        $mail -> FromName = $GLOBALS['config']['nickname'];	//发送邮件的用户昵称
        $mail -> Username = $GLOBALS['config']['account'];	//登录到163邮箱的用户名、账号
        $mail -> Password = $GLOBALS['config']['token'];	//第三方登录的授权码，在邮箱里面设置

        //编辑发送的邮件内容
        $mail -> IsHTML(true);		//发送的内容使用html编写
        $mail -> CharSet = 'utf-8';		//设置发送内容的编码
        $mail -> Subject = $title;	//设置邮件的主题、标题
        $mail -> MsgHTML($content);//发送的邮件内容主体
        //告诉服务器接收人的邮件地址
        $mail -> AddAddress($getter);
        //调用send方法，执行发送
        $result = $mail -> Send();

        if($result){
            return true;
        }else{
            return $mail -> ErrorInfo;
        }
    }
}

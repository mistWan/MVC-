<?php


namespace framework\tools;


class Validate
{
    private $error = array();

    public function showError()
    {
        $err_str = '<br>';
        foreach ($this->error as $val) {
            $err_str .= $val . "<br>";
        }
        return $err_str;
    }

    public function checkUser($username, $min = 2, $max = 30)
    {
        $reg = '/^[a-zA-Z0-9]\w{' . $min . ',' . $max . '}$/';
        preg_match($reg, $username, $result);
        if ($result) {
            return true;
        } else {
            $this->error[] = "<b>Error:</b>Username must be 3 to 30 characters !";
            return false;
        }
    }

    public function checkTel($tel)
    {
        $reg = "/^1[3-9]\d{9}$/";
        preg_match($reg, $tel, $result);
        if ($result) {
            return true;
        } else {
            $this->error[] = "<b>Error:</b>Please enter the correct phone number !";
            return false;
        }
    }

    public function checkPass($password, $min = 6, $max = 30)
    {
        $reg1 = '/^\d{' . $min . ',' . $max . '}$/';
        $reg2 = '/^[a-zA-Z]{' . $min . ',' . $max . '}$/';
        $reg3 = '/^[a-zA-Z0-9]{' . $min . ',' . $max . '}$/';
        $reg4 = '/^[a-zA-Z0-9~`!@#\$%\^&\*\(\)\-_\+=\{\}\[\]\|\;:\'\"<>,\.\?\/]{' . $min . ',' . $max . '}$/';

        preg_match($reg1, $password, $result1);
        preg_match($reg2, $password, $result2);
        preg_match($reg3, $password, $result3);
        preg_match($reg4, $password, $result4);
        if ($result1 || $result2) {
            $this->error[] = "<b>Error:</b>Password cannot be a pure number or a pure letter !";
            return false;
        } else {
            return true;
        }
    }

    public function checkEmail($email)
    {
//        xxxxxx@163.com
        $reg = '/[\w\-\.]+@([\w]+\.)?[\w]+\.([a-zA-Z]{1,5})$/';
        preg_match($reg, $email, $result);
        if ($result) {
            return true;
        } else {
            $this->error[] = "<b>Error:</b>Email is illegal !";
            return false;
        }
    }
}

$check = new Validate();
$check->checkUser('12wd');
$check->checkEmail('29251sss08338@qq.11.qa');
$check->checkPass('fdsfsdgw1');
$check->checkTel('15345678911');
var_dump($check->showError());

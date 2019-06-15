<?php


namespace home\model;


use framework\core\Model;

class UserModel extends Model
{
    protected $logic_table = 'user';

    public function getHotUser()
    {
        $sql = "SELECT COUNT(q.question_id) AS q_nums,u.username,u.user_pic FROM ask_user AS u LEFT JOIN ask_question AS q ON u.user_id=q.user_id GROUP BY u.user_id ORDER BY q_nums DESC LIMIT 3";
        return $this->dao->fetchAll($sql);
    }

    public function hasUserEmail($user, $email)
    {
        $sql = "SELECT 1 FROM $this->true_table WHERE `username`='$user' OR `email`='$email'";
        return $this->dao->fetchColumn($sql);
    }

    public function checkUserCode($user, $code)
    {
        $sql = "SELECT * FROM $this->true_table WHERE `username`='$user' AND `activate_code`='$code'";
        return $this->dao->fetchRow($sql);
    }

    public function checkUserPass($user, $pass)
    {
        $sql = "SELECT * FROM $this->true_table WHERE `username`='$user' AND `password`='$pass'";
        return $this->dao->fetchRow($sql);
    }


    public function hasUserTel($user, $tel)
    {
        $sql = "SELECT 1 FROM $this->true_table WHERE `username`='$user' OR `email`='$tel'";
        return $this->dao->fetchColumn($sql);
    }

}

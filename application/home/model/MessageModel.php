<?php


namespace home\model;


use framework\core\Model;

class MessageModel extends Model
{
    protected $logic_table = 'message';

    public function hasTelCode($tel, $code)
    {
        $sql = "SELECT `send_time` FROM $this->true_table WHERE `phone`='$tel' AND `code`='$code'";
        return $this->dao->fetchRow($sql);
    }
}

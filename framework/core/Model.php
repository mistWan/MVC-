<?php


namespace framework\core;

use framework\dao\DAOPDO;

class Model
{
    protected $dao;
    protected $true_table;
    protected $primary_key;

    public function __construct()
    {
//        require '../dao/DAOPDO.php';
        $this->initDAO();
        $this->initTrueTable();
        $this->initField();
    }

    public function initDAO()
    {
        $option = $GLOBALS['config'];
        $this->dao = DAOPDO::getSingleton($option);
    }

    public function initTrueTable()
    {
        if (isset($this->logic_table)) {
            $this->true_table = '`' . $GLOBALS['config']['table_fix'] . $this->logic_table . '`';
            return;
        }
//        home\model\QuestionModel
        $className = get_class($this);
        $basename = basename($className);
        $tableName = substr($basename, 0, -5);
//        将特殊情况：TopicQuestion----->topic_question
        $reg = '/(?<=[a-z])([A-Z])/';
        $tableName = strtolower(preg_replace($reg, '_$1', $tableName));
        $this->true_table = '`' . $GLOBALS['config']['table_fix'] . $tableName . '`';
    }

    public function initField()
    {
        $sql = "DESC $this->true_table";
        $result = $this->dao->fetchAll($sql);
        foreach ($result as $key => $val) {
            if ($val['Key'] == "PRI") {
                $this->primary_key = $val['Field'];
            }
        }
//        var_dump($this->primary_key);
//        echo '<br><pre>';
//        var_dump($result);
    }

    public function insert($data)
    {
        $sql = "INSERT INTO $this->true_table";

        $field = array_keys($data);

        $field_list = array_map(function ($val) {
            return '`' . $val . '`';
        }, $field);
        $field_list = "(" . implode(',', $field_list) . ")";
        $sql .= $field_list;

        $field = array_values($data);
        $field_list = array_map(array($this->dao, "quote"), $field);
        $field_list = " VALUES " . "(" . implode(',', $field_list) . ")";
        $sql .= $field_list;
//        die($sql);

        $this->dao->exec($sql);
        return $this->dao->lastInsertId();
    }

    # delete  from `table` where pri_field = $id;
    public function delete($id)
    {
        $sql = "DELETE FROM $this->true_table WHERE $this->primary_key = $id";
        return $this->dao->exec($sql);
    }

    # update `table` set `field1` = 'val1', `field2` = 'val2' where `field` = 'val'
    public function update($fields, $where = null)
    {
        if (!$where) {
            return false;
        } else {
            /*
             * array(1) {["goods_id"]=>int(535)}
             */
            foreach ($where as $key=>$val) {
                $where_str = "WHERE `$key`='$val'";
            }
        }
//        echo '<pre>';
//        var_dump($fields);
        $fields_str = '';
        foreach ($fields as $key=>$val) {
            $fields_str .= "`$key`='$val',";
        }
//        var_dump($fields_str);
        $fields_str = substr($fields_str,0,-1);
        $sql = "UPDATE $this->true_table SET $fields_str $where_str";
//        echo '<pre>';
//        var_dump($sql);
//        die();
        return $this->dao->exec($sql);
    }

    # select * from `table`
    # select `field1`, `field2` from `table`  where `field` = 'val'
    public function select($where=array(), $fields=array())
    {
        if (!$fields) {
            $fields = "*";
        } else {
            $fields = array_map(function ($val) {
                return "`$val`";
            }, $fields);
            $fields = implode(",", $fields);
        }
        if (!$where) {
            $sql = "SELECT $fields FROM $this->true_table";
        } else {
            foreach ($where as $key=>$val) {
                $where = "WHERE `$key`='$val'";
            }
            $sql = "SELECT $fields FROM $this->true_table $where";
        }
        return $this->dao->fetchAll($sql);

    }



//    public function user_add(){
//        $sql = "CREATE TABLE `user`(id INT NOT NULL ,name VARCHAR(32) NOT NULL)";
//        $result = $this->dao -> exec($sql);
//        return $result;
//    }
}

//$res = (new Model())->user_add();
//var_dump($res);



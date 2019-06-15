<?php


namespace admin\model;


use framework\core\Model;

//require '../../../framework/core/Model.php';
class CategoryModel extends Model
{
//    protected $logic_table = 'category';

    function getTreeCategory($cat_list, $parent_id = 0, $level = 0)
    {
        static $arr = array();
        foreach ($cat_list as $key => $val) {
            if ($val["parent_id"] == $parent_id) {
                $val['level'] = $level;
                $arr[] = $val;
                $this->getTreeCategory($cat_list, $val['cat_id'], $level + 1);
            }
        }
        return $arr;
    }

    public function isLeafCategory($cat_id)
    {
        $sql = "SELECT 1 FROM $this->true_table WHERE parent_id=$cat_id";
        return $this->dao->fetchColumn($sql);
    }

    public function checkData($data = array())
    {
        if ($data['cat_name'] == '') {
            $this->error[] = 'Category title is not null';
        }

        if ((int)$data['cat_name'] != 0) {
            $this->error[] = 'Category title is not the full number, starting with a number';
        }

        if (mb_strlen($data['cat_name'])>10 || mb_strlen($data['cat_desc'])>10) {
            $this->error[] = "Category title is too long character !";
        }

        if ($this->hasCategory($data['cat_name'], $data['parent_id'])) {
            $this->error[] = "The category has existed !";
        }

        if (empty($this->error)) {
            return true;
        } else {
            return false;
        }
    }

    public function hasCategory($cat_name, $pid)
    {
        $sql = "SELECT 1 FROM $this->true_table WHERE cat_name='$cat_name' AND parent_id=$pid";
        return $this->dao->fetchColumn($sql);
    }

    public function showError()
    {
        if (!empty($this->error)) {
            $error_str = '';
            foreach ($this->error as $val) {
                $error_str .= $val . "<br/>";
            }
            return $error_str;
        }
    }
}

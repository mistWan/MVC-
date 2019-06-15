<?php


namespace admin\controller;


use framework\core\Controller;
use framework\core\Factory;
use framework\tools\Thumb;
use framework\tools\Upload;

/*
 * 分类模块，主要负责：后台添加分类、删除分类、修改分类、查询分类等
 * 操作分类数据表
 */

class CategoryController extends Controller
{
    //http://iou.cn/index.php?m=admin&c=category&a=indexAction
    # 显示问题列表
    public function indexAction()
    {
        $model = Factory::model('Category');

        $cat_list = $model->select();
        $this->smarty->assign('cat_list', $cat_list);
        $this->smarty->display("category/index.html");
    }

    //http://iou.cn/index.php?m=admin&c=category&a=addAction
    # 显示添加内容的表单
    public function addAction()
    {
        $model = Factory::model('Category');
        $cat_list = $model->select();
        $cat_list = $model->getTreeCategory($cat_list);
//        die();
        $this->smarty->assign('cat_list', $cat_list);
        $this->smarty->display("category/add.html");
    }

    # 提交表单，处理表单接受的数据
    public function addHandleAction()
    {
        $model = Factory::model("Category");
        if (!$model->checkData($_POST)) {
            $this->jump('?m=admin&c=category&a=addAction', $model->showError());
        }
//        echo "<pre>";
//        var_dump($_POST);
//        die();
        $upload = new Upload();
        $upload->upload_path = UPLOADS_PATH . 'category/';
        $upload_file = $upload->doUpload($_FILES['cat_logo']);
//        die(UPLOADS_PATH.'category/'.$upload_file);
        $thumb = new Thumb(UPLOADS_PATH . 'category/' . $upload_file);
        $thumb->thumb_path = THUMB_PATH . 'category/';
        $thumb_path = $thumb->makeThumb(50, 50);
//        die($thumb_path);
        $data['cat_name'] = $_POST['cat_name'];
        $data['cat_desc'] = $_POST['cat_desc'];
        $data['cat_logo'] = $thumb_path;
        $data['parent_id'] = $_POST['parent_id'];

        /*echo THUMB_PATH . 'category/' . $thumb_path;
        $src = THUMB_PATH . 'category/' . $thumb_path;
        $src = UPLOADS_PATH . 'category/' . $upload_file;
        echo "<img src=$src>";
        echo "<pre>";
        var_dump($data);
        die();*/

        $result = $model->insert($data);
        if ($result) {
            $this->jump("?m=admin&c=category&a=indexAction", "Succeed to add !");
        } else {
            $this->jump("?m=admin&c=category&a=addAction", "Failed to add !");
        }
    }

    # 显示编辑的表单
    public function editAction()
    {
        $model = Factory::model('Category');
        $cat_id = $_GET['cat_id'];
        $where = array('cat_id' => $cat_id);
        $cat_list = $model->select($where);

        $cat_lists = $model->getTreeCategory($model->select());
//        echo '<pre>';
//        var_dump($cat_lists);
//        die();
        $this->smarty->assign('cat_list', $cat_list);
        $this->smarty->assign('cat_lists', $cat_lists);
        $this->smarty->display('category/edit.html');
    }

    # 提交表单，更新数据
    public function updateAction()
    {
        $data = array();
        $data['cat_name'] = $_POST['cat_name'];
        $data['cat_desc'] = $_POST['cat_desc'];
        $data['parent_id'] = $_POST['parent_id'];
        /*echo "<pre>";
        var_dump($_FILES);*/
//        说明已经上传新的图标
        if ($_FILES['cat_logo']['error'] == 0) {
            $upload = new Upload();
            $upload->upload_path = UPLOADS_PATH . 'category/';
            $upload_file = $upload->doUpload($_FILES['cat_logo']);

            $thumb = new Thumb(UPLOADS_PATH . 'category/' . $upload_file);
            $thumb->thumb_path = THUMB_PATH . 'category/';
            $thumb_file = $thumb->makeThumb(50, 50);

            unlink(THUMB_PATH . 'category/' . $_POST['old_cat_logo']);
            $upload_img = str_replace('thumb_', '', $_POST['old_cat_logo']);
            unlink(UPLOADS_PATH . 'category/' . $upload_img);

            $data['cat_logo'] = $thumb_file;
        }

        $model = Factory::model("Category");
        $where = array('cat_id' => $_POST['cat_id']);

//        echo '<pre>';
//        var_dump($data, $where);
//        die();
        $result = $model->update($data, $where);

        if ($result) {
            $this->jump("?m=admin&c=category&a=indexAction", "Succeed to edit !");
        } else {
            $this->jump("?m=admin&c=category&a=editAction&id=" . $_POST['cat_id'], "Failed to edit !");
        }
    }

    # 删除数据
    public function deleteAction()
    {
        $cat_id = $_GET['cat_id'];

        $model = Factory::model("Category");
        $result = $model->isLeafCategory($cat_id);

        if ($result) {
            $this->jump('?m=admin&c=category&a=indexAction', "Failed to delete, reason: Not a child classification !");
        }

        $where = array('cat_id' => $cat_id);
        $data = array('cat_logo');
        $cat_res = $model->select($where, $data);
        $cat_logo = $cat_res[0]['cat_logo'];

        unlink(THUMB_PATH . 'category/' . $cat_logo);
        $upload_img = str_replace('thumb_', '', $cat_logo);
        unlink(UPLOADS_PATH . 'category/' . $upload_img);

        $del_res = $model->delete($cat_id);

        if ($del_res) {
            $this->jump('?m=admin&c=category&a=indexAction', "Succeed to delete !");
        } else {
            $this->jump('?m=admin&c=category&a=indexAction', "Failed to delete !");
        }
    }
}

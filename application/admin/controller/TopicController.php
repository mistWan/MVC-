<?php


namespace admin\controller;


use framework\core\Controller;
use framework\core\Factory;
use framework\tools\Thumb;
use framework\tools\Upload;

//http://iou.cn/index.php?m=admin&c=topic&a=indexAction
class TopicController extends Controller
{
    public function indexAction()
    {
        $model = Factory::model("Topic");
        $topic_list  = $model->select();

        $this->smarty->assign("topics", $topic_list);
        $this->smarty->display("topic/index.html");
    }

    public function addAction()
    {
        $this->smarty->display("topic/add.html");
    }

    public function addHandleAction()
    {
        $uploads = new Upload();
        $uploads->upload_path = UPLOADS_PATH . "topic/";
        $uploads_file = $uploads->doUpload($_FILES['topic_pic']);

        $thumb = new Thumb(UPLOADS_PATH . "topic/" . $uploads_file);
        $thumb->thumb_path = THUMB_PATH . 'topic/';
        $thumb_file = $thumb->makeThumb(50, 50);

        $data['topic_title'] = $_POST['topic_title'];
        $data['topic_desc'] = $_POST['topic_desc'];
        $data['topic_pic'] = 'topic/' . $thumb_file;
        $data['user_id'] = 1;
        $data['pub_time'] = time();

        $model = Factory::model('Topic');
        $ins = $model->insert($data);
        if ($ins) {
            $this->jump("?m=admin&c=topic&a=indexAction", "Succeed to add !");
        } else {
            $this->jump("?m=admin&c=topic&a=addAction", "Failed to add !");
        }
    }

//http://iou.cn/index.php?m=admin&c=topic&a=editAction
    public function editAction()
    {
        $topic_id = $_GET['id'];
        $model = Factory::model('Topic');
        $where = array('topic_id' => $topic_id);
        $topic = $model->select($where);

        $this->smarty->assign('topic', $topic[0]);
        $this->smarty->display("topic/edit.html");
    }

    public function updateAction()
    {
        if ($_FILES['topic_pic']['error'] == 0) {
            $upload = new Upload();
            $upload->upload_path = UPLOADS_PATH . 'topic/';
            $upload_file = $upload->doUpload($_FILES['topic_pic']);

            $thumb = new Thumb(UPLOADS_PATH . 'topic/' . $upload_file);
            $thumb->thumb_path = THUMB_PATH . 'topic/';
            $thumb_path = $thumb->makeThumb(50, 50);

            $old_topic_pic = $_POST['old_topic_pic'];
            $orign = str_replace('thumb_', '', $old_topic_pic);
            unlink(THUMB_PATH . $old_topic_pic);
            unlink(UPLOADS_PATH . $orign);

            $data['topic_pic'] = "topic/" . $thumb_path;
        }

        $data['topic_title'] = $_POST['topic_title'];
        $data['topic_desc'] = $_POST['topic_desc'];
        $data['pub_time'] = time();
        $where = array('topic_id'=>$_POST['topic_id']);
        $model = Factory::model('Topic');
        $update = $model->update($data, $where);

        if ($update) {
            $this->jump('?m=admin&c=topic&a=indexAction', "Succeed to edit !");
        } else {
            $this->jump('?m=admin&c=topic&a=editAction&id=' . $_POST['topic_id'], "Failed to edit");
        }
    }

    public function deleteAction()
    {
        $topic_id = $_GET['id'];
        $where = ['topic_id' => $topic_id];
        $data = ['topic_pic'];
        $model = Factory::model('Topic');
        $topic_pic = $model->select($where, $data);
        $topic_pic = $topic_pic[0]['topic_pic'];

        unlink(THUMB_PATH . $topic_pic);
        $orign = str_replace('thumb_', "", $topic_pic);
        unlink(UPLOADS_PATH . $orign);

        $del = $model->delete($topic_id);
        if ($del) {
            $this->jump('?m=admin&c=topic&a=indexAction', "Succeed to delete !");
        } else {
            $this->jump('?m=admin&c=topic&a=indexAction', "FAiled to delete !");
        }

    }
}

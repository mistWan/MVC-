<?php


namespace home\controller;


use framework\core\Controller;
use framework\core\Factory;

class QuestionController extends Controller
{
    public function addAction()
    {
        $cat_model = Factory::model('admin\model\Category');
        $cat_list = $cat_model->select();
        $cat_list = $cat_model->getTreeCategory($cat_list);

        $topic_model = Factory::model('admin\model\Topic');
        $topic_list = $topic_model->select();

        $this->smarty->assign('cat_list', $cat_list);
        $this->smarty->assign('topics', $topic_list);
        $this->smarty->display('question/add.html');
    }

    public function addHandleAction()
    {
        $data["question_title"] = $_POST["question_title"];
        $data["cat_id"] = $_POST["cat_id"];
        $data["question_desc"] = $_POST["question_desc"];
        $data['user_id'] = 1;
        $data['pub_time'] = time();

        $question_model = Factory::model('Question');
        $question_id = $question_model->insert($data);
        $topic_lists = $_POST['topic_id'];
        $qt_model = Factory::model('QuestionTopic');
        if (isset($topic_lists)) {
            foreach ($topic_lists as $value) {
                $qt['question_id'] = $question_id;
                $qt['topic_id'] = $value;
                $qt_model->insert($qt);
            }
        }

        if ($question_id) {
            $details = $question_model->getDetails($question_id);
            $this->smarty->assign("question", $details['question']);
            $this->smarty->assign('replys', $details['replys']);
            $this->smarty->assign('reply_nums',count($details['replys']));

            $res = $this->smarty->fetch("question/detail.html");

            $basic_path = './application/public/html/';
            $sub_path = date('Ymd').'/';

            /*var_dump($basic_path.$sub_path);
            die();*/
            if (!is_dir($basic_path.$sub_path)) {
                mkdir($basic_path.$sub_path);
            }
            $file = 'detail_'.$question_id.'.html';
            $html = file_put_contents($basic_path.$sub_path.$file, $res);
            if ($html) {
                $data['static_url'] = $sub_path.$file;
                $where['question_id'] = $question_id;

                $update = $question_model->update($data, $where);
                if ($update) {
                    $this->jump('/iou.cn/', 'Succeed to publish!');
                } else {
                    $this->jump(Factory::URL('home/question/add'), 'Failed to publish!');
                }
            }
        }
    }

    public function detailAction()
    {

        $model = Factory::model('Question');
        $details = $model->getDetails($_GET['id']);

//        echo "<pre>";
//        var_dump($details);
//        die();
        $this->smarty->assign("question", $details['question']);
        $this->smarty->assign('replys', $details['replys']);
        $this->smarty->assign('reply_nums',count($details['replys']));
        $this->smarty->display("question/detail.html");
    }

    public function replyAction()
    {
        $data['reply_content'] = $_POST['answer_content'];
        $data['user_id'] = $_SESSION['nick']['user_id'];
        $data['reply_time'] = time();
        $data['question_id'] = $_POST['question_id'];
        /*echo '<pre>';
        var_dump($data);*/
        $reply_model = Factory::model('admin\model\Reply');
        $reply_id = $reply_model->insert($data);
        if ($reply_id) {
            $q_model = Factory::model('Question');
            $details = $q_model->getDetails($_POST['question_id']);
            $this->smarty->assign("question", $details['question']);
            $this->smarty->assign('replys', $details['replys']);
            $this->smarty->assign('reply_nums',count($details['replys']));
            $result = $this->smarty->fetch("question/detail.html");

            $data = array('static_url');
            $where = array('question_id'=>$_POST['question_id']);
            $static_url = $q_model->select($where, $data);
            $filename = './application/public/html/'.$static_url[0]['static_url'];

            $res =file_put_contents($filename, $result);

            if ($res) {
                $this->jump('/iou.cn/application/public/html/'.$static_url[0]['static_url'], '<i>Reply successfully !</i>');
            } else {
                $this->jump('/iou.cn', 'Reply failed, please try again');
            }
        }
    }
}

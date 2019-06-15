<?php


namespace home\controller;


use framework\core\Controller;
use framework\core\Factory;
use framework\tools\Page;

// http://iou.cn?index.php
class IndexController extends Controller
{
    public function indexAction()
    {
        $this->isLogin();
        $model = Factory::model("admin\model\Category");
        $where = array("parent_id" => 0);
        $cat_list = $model->select($where);

        $question_model = Factory::model('Question');
        $this->smarty->assign("cat_list", $cat_list);

        $page = new Page();

        $page->total_pages = $question_model->countQuestion();
        $page->pagesize = 3;
        $page->now_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $page->url = Factory::URL('home/index/index');
        $offset = ($page->now_page - 1) * $page->pagesize;
        $limit = $page->pagesize;
        $questions = $question_model->getQuestions($offset, $limit);
        $page_bar = $page->create();

        $this->smarty->assign('questions', $questions);
        $this->smarty->assign('pagebar', $page_bar);

        $topic_model = Factory::model('Topic');
        $hot_topics = $topic_model->getHotTopic();
        $this->smarty->assign('hot_topics', $hot_topics);

        $user_model = Factory::model('User');
        $hot_users = $user_model->getHotUser();
        $this->smarty->assign('hot_users', $hot_users);

        $this->smarty->display("index.html");
    }
}

<?php


namespace admin\controller;


use framework\core\Controller;
use framework\core\Factory;
use framework\tools\HttpRequest;

class QuestionController extends Controller
{
//http://iou.cn/index.php?m=admin&c=Question&a=addAction
    public function addAction()
    {
        $this->smarty->display("question/add.html");
    }

    public function collectAction()
    {
//        https://www.jianshu.com/c/yD9GAd
        $http = new HttpRequest($_POST['url']);
        $result = $http->send();
//        .+?<p.+?class="abstract">(.+?)<\/p>
        $reg = '/<a.+?class="title".+?>(.+?)<\/a>.+?<p.+?class="abstract">(.+?)<\/p>/su';
        preg_match_all($reg, $result, $match);

//        echo "<pre>";
//        var_dump($match[1], $match[2]);
//        var_dump($match[2]);
        $q_model = Factory::model("home\model\Question");
        $reply_model = Factory::model('Reply');
        foreach ($match[1] as $key=>$value) {
            $data['question_title'] = $value;
            $data['cat_id'] = 1;
            $data['user_id'] = 1;
            $data['pub_time'] = time();
            $question_id = $q_model->insert($data);
            if ($question_id) {
                $reply['reply_content'] = $match[2][$key];
                $reply['user_id'] = 1;
                $reply['reply_time'] = time();
                $reply['question_id'] = $question_id;
                $reply_model->insert($reply);
            }
        }
        $this->jump('index.php', "<i>Successful acquisition !</i>");
    }
}

/*<a class="title" target="_blank" href="/p/45206cc4aef0">你的失败多源于你不理智的恐惧</a>
<p class="abstract">
秦始皇统一天下以后，就大兴土木到处开疆拓土，经过几百年的兼并战争，老百姓已经疲惫不堪了。等到秦二世继位以后，比他老爹更甚，于是各地兴起了反叛朝廷...
</p>

<a class="title" target="_blank" href="/p/d6119e7d8861">一首乡土中国的挽歌——《白鹿原》中的家国史</a>
<p class="abstract">
花了十多天时间看完了这部被誉为史诗般的巨著。掩卷之后，白鹿原上那些各色人物面貌在我脑海中一一闪过，有的眉头紧锁，有的激情四射，有的黯然神伤，有的...
</p>


<a class="title" target="_blank" href="/p/ea46d21dfb0a">【每周一本书】96 延展：释放有限资源的无限潜能</a>
<p class="abstract">
这周的读书笔记晚了3天，就当假期偷懒了。 《延展》这本书，是公司号召全员阅读的，也许是老板觉得大家都在争各种资源，而没有好好利用手里的现有资源，...
</p>*/



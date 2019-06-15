<?php


namespace home\model;


use framework\core\Model;

class TopicModel extends Model
{
    protected $logic_table = 'topic';

    public function getHotTopic ()
    {
        $sql_view = "DROP VIEW IF EXISTS `ask_hot_topic`;CREATE VIEW `ask_hot_topic` AS SELECT t.topic_id,t.topic_title,t.topic_pic,count(qt.question_id) AS q_nums FROM ask_topic as t LEFT JOIN ask_question_topic AS qt ON t.topic_id=qt.topic_id GROUP BY qt.topic_id";
        $this->dao->exec($sql_view);

        $sql = "SELECT h.*,COUNT(ut.user_id) AS user_nums FROM ask_hot_topic AS h LEFT JOIN ask_user_topic AS ut ON h.topic_id=ut.topic_id GROUP BY h.topic_id ORDER BY h.q_nums DESC LIMIT 3";

        return $this->dao->fetchAll($sql);
    }
}

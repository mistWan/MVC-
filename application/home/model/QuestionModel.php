<?php


namespace home\model;


use framework\core\Model;

class QuestionModel extends Model
{
    protected $logic_table = 'question';

    public function countQuestion()
    {
        $sql = "SELECT COUNT(*) AS total FROM $this->true_table";
        return $this->dao->fetchColumn($sql);
    }

    public function getQuestions($offset, $limit)
    {
        $sql = "SELECT q.*,c.cat_name,u.username,u.user_pic FROM ask_question AS q LEFT JOIN ask_category AS c ON q.cat_id=c.cat_id LEFT JOIN ask_user AS u ON q.user_id=u.user_id ORDER BY q.pub_time DESC LIMIT $offset,$limit";
        return $this->dao->fetchAll($sql);
    }

    public function getDetails($question_id)
    {
        $question_sql = "SELECT q.*,c.cat_name,u.username,u.user_pic FROM ask_question AS q LEFT JOIN ask_category AS c ON q.cat_id=c.cat_id LEFT JOIN ask_user AS u ON q.user_id=u.user_id WHERE q.question_id=$question_id";
        $question = $this->dao->fetchRow($question_sql);

        $reply_sql = "SELECT r.*,u.username,u.user_pic FROM ask_reply AS r LEFT JOIN ask_user AS u ON r.user_id=u.user_id WHERE r.question_id=$question_id";
        $replys = $this->dao->fetchAll($reply_sql);

        $data['question'] = $question;
        $data['replys'] = $replys;

        return $data;
    }
}

CREATE DATABASE `ask`;
USE ask;

CREATE TABLE `ask_category`(
cat_id INT PRIMARY KEY AUTO_INCREMENT,
cat_name VARCHAR(32),
cat_logo VARCHAR(128),
cat_desc VARCHAR(32),
parent_id INT
)ENGINE myisam DEFAULT charset utf8;

CREATE TABLE ask_topic(
topic_id INT(5) PRIMARY KEY AUTO_INCREMENT,
topic_title VARCHAR(128),
topic_desc TEXT,
topic_pic VARCHAR(128),
discus_nums INT(5),
focus_nums INT(5),
user_id INT(5),
pub_time INT(5)
)ENGINE myisam DEFAULT charset utf8;

CREATE TABLE ask_question_topic(
qt_id INT PRIMARY KEY AUTO_INCREMENT,
question_id INT,
topic_id INT
)ENGINE myisam DEFAULT charset utf8;

CREATE TABLE ask_question(
question_id INT PRIMARY KEY AUTO_INCREMENT,
question_title VARCHAR(128),
question_desc TEXT,
cat_id INT,
user_id INT,
pub_time INT,
focus_nums INT,
view_num INT,
reply_num INT
)ENGINE myisam DEFAULT charset utf8;

CREATE TABLE ask_user(
user_id INT PRIMARY KEY AUTO_INCREMENT,
username VARCHAR(32),
password VARCHAR(64),
email VARCHAR(64),
phone VARCHAR(13), 
is_active TINYINT(4),
reg_time INT,
user_pic VARCHAR(128),
activate_code VARCHAR(64) 
)ENGINE myisam DEFAULT charset utf8;

CREATE TABLE ask_user_topic(
ut_id INT PRIMARY KEY AUTO_INCREMENT,
user_id INT,
topic_id INT
)ENGINE myisam DEFAULT charset utf8;

INSERT INTO ask_user_topic(user_id, topic_id) VALUES
(1, 2),
(1, 1),
(1, 3),
(2, 2),
(2, 1);

CREATE TABLE ask_message(
id INT PRIMARY KEY AUTO_INCREMENT,
phone VARCHAR(13),
code VARCHAR(10),
send_time INT
)ENGINE myisam DEFAULT charset utf8;


CREATE TABLE ask_reply(
reply_id INT PRIMARY KEY AUTO_INCREMENT,
reply_content TEXT,
user_id INT,
reply_time INT,
question_id INT,
agree_nums INT,
disagree_nums INT,
parent_id INT
)ENGINE myisam DEFAULT charset utf8;
<?php
/* Smarty version 3.1.30, created on 2018-10-05 19:55:23
  from "C:\xampp\htdocs\iou.cn\application\home\view\question\detail.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5bb7512b02b545_73859081',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f99248bd88cb05b9148de7d9b32b4b0657a5aba0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\iou.cn\\application\\home\\view\\question\\detail.html',
      1 => 1538740474,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.html' => 1,
  ),
),false)) {
function content_5bb7512b02b545_73859081 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\xampp\\htdocs\\iou.cn\\framework\\vendor\\smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_48055bb7512b01b7e1_03972080', "content");
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "content"} */
class Block_48055bb7512b01b7e1_03972080 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="aw-container-wrap">
    <div class="container">
        <div class="row">
            <div class="aw-content-wrap clearfix">
                <div class="col-sm-12 col-md-9 aw-main-content">
                    <!-- 话题推荐bar -->
                    <!-- 话题推荐bar -->
                    <!-- 话题bar -->
                    <div data-id="12" data-type="question" id="question_topic_editor" class="aw-mod aw-topic-bar">
                        <div class="tag-bar clearfix">
							<span data-id="2" class="topic-tag">
								<a class="text" href="topic.html">
									<?php echo $_smarty_tpl->tpl_vars['question']->value['cat_name'];?>

								</a>
							</span>

                        </div>
                    </div>
                    <!-- end 话题bar -->
                    <div class="aw-mod aw-question-detail aw-item">
                        <div class="mod-head">
                            <h1><?php echo $_smarty_tpl->tpl_vars['question']->value['question_title'];?>
</h1>

                        </div>
                        <div class="mod-body">
                            <div class="content markitup-box"></div>
                        </div>
                        <div class="mod-footer">
                            <div class="meta">
								<span class="text-color-999">
									<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['question']->value['pub_time'],'%Y-%M-%D %H:%M:%S');?>

								</span>


                                <a href="publish.html" class="text-color-999">
                                    <i class="icon icon-edit"></i>
                                    编辑
                                </a>

                                <div class="pull-right more-operate">
                                    <a data-toggle="dropdown" class="text-color-999 dropdown-toggle">
                                        <i class="icon icon-share"></i>
                                        分享
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="aw-mod aw-question-comment">
                        <div class="mod-head">
                            <!--							<ul class="nav nav-tabs aw-nav-tabs active">
                                                            <li>
                                                                <a href="question.html">
                                                                    时间
                                                                    <i class="icon icon-up"></i>
                                                                </a>
                                                            </li>-->

                            <h2 class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['reply_nums']->value;?>
个回复</h2>
                            </ul>
                        </div>
                        <div class="mod-body aw-feed-list">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['replys']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                            <div id="answer_list_<?php echo $_smarty_tpl->tpl_vars['v']->value['reply_id'];?>
" force_fold="0" uninterested_count="0"
                                 class="aw-item">
                                <div class="mod-head">
                                    <a name="answer_2" class="anchor"></a>
                                    <!-- 用户头像 -->
                                    <a data-id="3" href="people.html" class="aw-user-img aw-border-radius-5">
                                        <img alt="" src="<?php echo PUBLIC_PATH;?>
common/avatar-mid-img.png"></a>
                                    <!-- end 用户头像 -->
                                    <div class="title">
                                        <p>
                                            <a data-id="3" href="people.html" class="aw-user-name">han</a>
                                            -
                                            <span class="text-color-999">一句话介绍</span>
                                        </p>
                                        <p class="text-color-999 aw-agree-by hide">赞同来自:</p>
                                    </div>
                                </div>
                                <div class="mod-body clearfix">
                                    <!-- 评论内容 -->
                                    <div class="markitup-box"><?php echo $_smarty_tpl->tpl_vars['v']->value['reply_content'];?>
</div>

                                    <!-- end 评论内容 -->
                                </div>
                                <div class="mod-footer">
                                    <!-- 社交操作 -->
                                    <div class="meta clearfix">
										<span class="text-color-999 pull-right">
											<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['reply_time'],'%Y-%M-%D %H:%M:%S');?>

										</span>
                                        <!-- 投票栏 -->
                                        <span class="operate">
											<a onclick="AWS.User.agree_vote(this, 'itbull', 2);" class="agree  ">
												<i data-original-title="赞同回复" class="icon icon-agree"
                                                   data-toggle="tooltip" title="" data-placement="right"></i> <b
                                                    class="count">
												<?php echo (($tmp = @$_smarty_tpl->tpl_vars['v']->value['agree_nums'])===null||$tmp==='' ? 0 : $tmp);?>

												</b>
											</a>
											<a onclick="AWS.User.disagree_vote(this, 'itbull', 2)" class="disagree ">
												<i data-original-title="对回复持反对意见" class="icon icon-disagree"
                                                   data-toggle="tooltip" title="" data-placement="right">
												<?php echo (($tmp = @$_smarty_tpl->tpl_vars['v']->value['disagree_nums'])===null||$tmp==='' ? 0 : $tmp);?>

												</i>
											</a>
										</span>
                                        <!-- end 投票栏 -->
                                        <span class="operate">
											<a href="javascript:;" data-first-click="hide" data-comment-count="0"
                                               data-type="answer" data-id="2" class="aw-add-comment">
												<i class="icon icon-comment"></i>
												0
											</a>
										</span>
                                        <!-- 可显示/隐藏的操作box -->
                                        <div class="more-operate">
                                            <a onclick="AWS.dialog('commentEdit', {answer_id:2,attach_access_key:'cb47a83f34f20122b8fcb1119f7b8fdb'});"
                                               href="javascript:;" class="text-color-999">
                                                <i class="icon icon-edit"></i>
                                                编辑
                                            </a>
                                            <a class="text-color-999" onclick="AWS.User.answer_force_fold($(this), 2);"
                                               href="javascript:;">
                                                <i class="icon icon-fold"></i>
                                                折叠
                                            </a>

                                            <a class="text-color-999"
                                               onclick="AWS.dialog('favorite', {item_id:2, item_type:'answer'});"
                                               href="javascript:;">
                                                <i class="icon icon-favor"></i>
                                                收藏
                                            </a>

                                            <a data-placement="bottom" title="" data-toggle="tooltip"
                                               data-original-title="感谢热心的回复者" class="aw-icon-thank-tips text-color-999"
                                               onclick="AWS.User.answer_user_rate($(this), 'thanks', 2);"
                                               href="javascript:;">
                                                <i class="icon icon-thank"></i>
                                                感谢
                                            </a>
                                            <div class="btn-group pull-left">
                                                <a data-toggle="dropdown" class="text-color-999 dropdown-toggle">
                                                    <i class="icon icon-share"></i>
                                                    分享
                                                </a>
                                                <div class="aw-dropdown shareout pull-right" role="menu"
                                                     aria-labelledby="dropdownMenu">
                                                    <!--													<ul class="aw-dropdown-list">
                                                                                                            <li>
                                                                                                                <a onclick="AWS.User.share_out({webid: 'tsina', title: $(this).parents('.aw-item').find('.markitup-box').text()});">
                                                                                                                    <i class="icon icon-weibo"></i>
                                                                                                                    微博
                                                                                                                </a>
                                                                                                            </li>
                                                                                                            <li>
                                                                                                                <a onclick="AWS.User.share_out({webid: 'qzone', title: $(this).parents('.aw-item').find('.markitup-box').text()});">
                                                                                                                    <i class="icon icon-qzone"></i>
                                                                                                                    QZONE
                                                                                                                </a>
                                                                                                            </li>
                                                                                                            <li>
                                                                                                                <a onclick="AWS.User.share_out({webid: 'weixin', title: $(this).parents('.aw-item').find('.markitup-box').text()});">
                                                                                                                    <i class="icon icon-wechat"></i>
                                                                                                                    微信
                                                                                                                </a>
                                                                                                            </li>
                                                                                                        </ul>-->
                                                </div>
                                            </div>
                                            <a class="text-color-999"
                                               onclick="AWS.ajax_request(G_BASE_URL + '/question/ajax/set_best_answer/', 'answer_id=2');"
                                               href="javascript:;">
                                                <i class="icon icon-best"></i>
                                                最佳回复
                                            </a>
                                        </div>
                                        <!-- end 可显示/隐藏的操作box -->

                                    </div>
                                    <!-- end 社交操作 -->
                                </div>
                            </div>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </div>
                        <div class="mod-footer">
                            <div id="load_uninterested_answers" class="aw-load-more-content hide">
                                <span onclick="AWS.alert('被折叠的回复是被你或者被大多数用户认为没有帮助的回复');" tabindex="-1"
                                      href="javascript:;"
                                      class="text-color-999 aw-alert-box text-color-999">为什么被折叠?</span>
                                <a class="aw-load-more-content" href="javascript:;">
                                    <span class="hide_answers_count">0</span>
                                    个回复被折叠
                                </a>
                            </div>

                            <div id="uninterested_answers_list" class="hide aw-feed-list"></div>
                        </div>

                    </div>
                    <!-- end 问题详细模块 -->


                    <!-- 回复编辑器 -->
                    <?php if (!isset($_SESSION['nick'])) {?>
                    <div class="aw-mod aw-replay-box question">
                        <p align="center">
                            要回复问题请先<a href="">登录</a>或<a href="">注册</a>
                        </p>
                    </div>
                    <?php } else { ?>
                    <div class="aw-mod aw-replay-box question">
                        <form class="question_answer_form" id="answer_form" method="post"
                              action="/iou.cn/index.php?c=question&a=reply">
                            <div class="mod-head">
                                <p>
                                    <label class="pull-right">
                                        <input type="checkbox" name="anonymous" value="1">匿名回复</label>
                                    <label class="pull-right"></label>
                                </p>
                            </div>
                            <div class="mod-body">
                                <div class="aw-mod aw-editor-box">
									<textarea name="answer_content" rows="10" class="form-control"
                                              style="border:1px solid #ccc">
									</textarea>
                                </div>
                                <!-- 回复编辑器 -->
                                <div class="aw-mod aw-replay-box question">
                                    <p align="center">
                                        <input type="hidden" name="question_id" value="<?php echo $_smarty_tpl->tpl_vars['question']->value['question_id'];?>
">
                                        <input type="submit" value="发表回复" class="btn btn-success">
                                    </p>
                                </div>
                                <!-- end 回复编辑器 -->
                            </div>
                        </form>
                    </div>
                    <?php }?>
                    <!-- end 回复编辑器 -->

                </div>
                <!-- 侧边栏 -->
                <div class="col-md-3 aw-side-bar hidden-xs hidden-sm">
                    <!-- 发起人 -->
                    <div class="aw-mod">
                        <div class="mod-head">
                            <h3>发起人</h3>
                        </div>
                        <div class="mod-body">
                            <dl>
                                <dt class="pull-left aw-border-radius-5">
                                    <a href="http://localhost/wecenter/?/people/itbull">
                                        <img src="<?php echo PUBLIC_PATH;?>
common/avatar-mid-img.png" alt="itbull"></a>
                                </dt>
                                <br>
                                <dd class="pull-left">
                                    <a data-id="1" href="http://localhost/wecenter/?/people/itbull" class="aw-user-name"
                                       style="margin-left: 20px;">
                                        <?php echo $_smarty_tpl->tpl_vars['question']->value['username'];?>

                                    </a>
                                    <p></p>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <!-- end 发起人 -->
                    <br>
                    <!-- 问题状态 -->
                    <div class="aw-mod question-status">
                        <div class="mod-head">
                            <h3>问题状态</h3>
                        </div>

                        <div class="mod-body">
                            <ul>
                                <li>
                                    浏览:
                                    <span class="aw-text-color-blue">
										<?php echo (($tmp = @$_smarty_tpl->tpl_vars['question']->value['view_num'])===null||$tmp==='' ? 0 : $tmp);?>

									</span>
                                </li>
                                <li>
                                    关注:
                                    <span class="aw-text-color-blue">
									<?php echo (($tmp = @$_smarty_tpl->tpl_vars['question']->value['focus_num'])===null||$tmp==='' ? 0 : $tmp);?>

									</span>
                                    人
                                </li>


                            </ul>
                        </div>
                    </div>
                    <!-- end 问题状态 -->
                </div>
                <!-- end 侧边栏 -->
            </div>
        </div>
    </div>
</div>

<?php
}
}
/* {/block "content"} */
}

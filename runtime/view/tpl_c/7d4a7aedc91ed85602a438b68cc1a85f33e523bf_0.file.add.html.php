<?php
/* Smarty version 3.1.30, created on 2018-10-06 01:18:01
  from "C:\xampp\htdocs\iou.cn\application\home\view\question\add.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5bb79cc9bbf547_43411666',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d4a7aedc91ed85602a438b68cc1a85f33e523bf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\iou.cn\\application\\home\\view\\question\\add.html',
      1 => 1538759696,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.html' => 1,
  ),
),false)) {
function content_5bb79cc9bbf547_43411666 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_50565bb79cc9bbb5d0_84079711', "content");
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "content"} */
class Block_50565bb79cc9bbb5d0_84079711 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="aw-container-wrap">
		<div class="container aw-publish">
			<div class="row">
				<div class="aw-content-wrap clearfix">
					<div class="col-sm-12 col-md-9 aw-main-content">
						<!-- tab 切换 -->
						<ul class="nav nav-tabs aw-nav-tabs active">
																									<li><a href="http://localhost/wecenter/?/publish/article/">文章</a></li>
													<li class="active"><a href="http://localhost/wecenter/?/publish/">问题</a></li>
							<h2 class="hidden-xs"><i class="icon icon-ask"></i> 发起</h2>
						</ul>
						<!-- end tab 切换 -->
						<form id="question_form" method="post" action="<?php echo framework\core\Factory::URL('home/question/addHandle');?>
">
							<div class="aw-mod aw-mod-publish">
								<div class="mod-body">
									<h3>问题标题:</h3>
									<!-- 问题标题 -->
									<div class="aw-publish-title">
										<div>
											<input type="text" class="form-control" value="" id="question_contents"
											name="question_title" placeholder="问题标题...">
											<div class="aw-publish-suggest-question hide">
												<p class="text-color-999">你的问题可能已经有答案</p>
												<ul class="aw-dropdown-list">
												</ul>
											</div>
										</div>
										<select id="category_id" name="cat_id"
										style="float: right;margin-top: -35px;height: 35px;border-radius: 5px;">
											<option value="0">- 顶级分类 -</option>
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cat_list']->value, 'cat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_id'];?>
">
													<?php echo preg_replace('!^!m',str_repeat('&nbsp;&nbsp;',$_smarty_tpl->tpl_vars['cat']->value['level']),$_smarty_tpl->tpl_vars['cat']->value['cat_name']);?>

												</option>
											<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

										</select>
									</div>
									<h3>问题补充 (选填):</h3>
									<div class="aw-mod aw-editor-box">
										<div class="mod-head">
											<textarea class="form-control" rows="10" name="question_desc"></textarea>
										</div>

									</div>
									<h3>添加话题:</h3>
									<div data-type="publish" class="aw-topic-bar active">
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['topics']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
										<label>
											<input type="checkbox" name="topic_id[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['topic_id'];?>
">
											<?php echo $_smarty_tpl->tpl_vars['v']->value['topic_title'];?>

										</label>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

									</div>

																																</div>
								<div class="mod-footer clearfix">
																	<span class="aw-anonymity">
																												<label><input type="checkbox" name="anonymous" value="1" class="pull-left">
											匿名</label>

									</span>
									<input type="submit" value="确认发起" class="btn btn-large btn-success btn-publish-submit">
								</div>
							</div>
						</form>
					</div>
					<!-- 侧边栏 -->
					<div class="col-sm-12 col-md-3 aw-side-bar hidden-xs">
						<!-- 问题发起指南 -->
						<div class="aw-mod publish-help">
							<div class="mod-head">
								<h3>问题发起指南</h3>
							</div>
							<div class="mod-body">
								<p><b>• 问题标题:</b> 请用准确的语言描述您发布的问题思想</p>
								<p><b>• 问题补充:</b> 详细补充您的问题内容, 并提供一些相关的素材以供参与者更多的了解您所要问题的主题思想</p>
								<p><b>• 选择话题:</b> 选择一个或者多个合适的话题, 让您发布的问题得到更多有相同兴趣的人参与. 所有人可以在您发布问题之后添加和编辑该问题所属的话题</p>
														</div>
						</div>
						<!-- end 问题发起指南 -->
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

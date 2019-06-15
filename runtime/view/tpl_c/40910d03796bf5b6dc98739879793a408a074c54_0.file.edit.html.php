<?php
/* Smarty version 3.1.30, created on 2018-09-21 13:22:50
  from "C:\xampp\htdocs\iou.cn\application\admin\view\topic\edit.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ba4802a2e6c64_06014505',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40910d03796bf5b6dc98739879793a408a074c54' => 
    array (
      0 => 'C:\\xampp\\htdocs\\iou.cn\\application\\admin\\view\\topic\\edit.html',
      1 => 1501458324,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/layout.html' => 1,
  ),
),false)) {
function content_5ba4802a2e6c64_06014505 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_175195ba4802a2e3951_07549475', "content");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:common/layout.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "content"} */
class Block_175195ba4802a2e3951_07549475 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="aw-content-wrap">
        <form method="post" id="settings_form" 
        action="?m=admin&c=topic&a=updateAction"
        enctype="multipart/form-data">
        
        <div class="mod">
            <div class="mod-head">
                <h3>
                    <span class="pull-left">话题编辑</span>
                </h3>
            </div>

            <div class="tab-content mod-content">
                <table class="table table-striped">
                    <tbody><tr>
                        <td>
                            <div class="form-group">
                                <span class="col-sm-4 col-xs-3 control-label">缩略图:</span>
                                <div class="col-sm-5 col-xs-8">
                                	<?php if (isset($_smarty_tpl->tpl_vars['topic']->value['topic_pic'])) {?>
                                		<img src="<?php echo THUMB_PATH;
echo $_smarty_tpl->tpl_vars['topic']->value['topic_pic'];?>
" 
                                		style="max-width:50px;max-height:50px">
                                		<font color="red">您已上传，再次上传会覆盖</font>
                                		<input type="file" name="topic_pic">
                                	<?php } else { ?>
                                		<input type="file" name="topic_pic">
                                	<?php }?>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="form-group">
                                <span class="col-sm-4 col-xs-3 control-label">话题标题:</span>
                                <div class="col-sm-5 col-xs-8">
                                    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['topic']->value['topic_title'];?>
" class="form-control" name="topic_title">
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="form-group">
                                <span class="col-sm-4 col-xs-3 control-label">话题描述:</span>
                                <div class="col-sm-5 col-xs-8">
                                    <textarea name="topic_desc" class="form-control"><?php echo $_smarty_tpl->tpl_vars['topic']->value['topic_desc'];?>
</textarea>
                                </div>
                            </div>
                        </td>
                    </tr>

                    </tbody><tfoot>
                    <tr>
                        <td>
                        	<input type="hidden" name="topic_id" value="<?php echo $_smarty_tpl->tpl_vars['topic']->value['topic_id'];?>
">
                        	<input type="hidden" name="old_topic_pic" value="<?php echo $_smarty_tpl->tpl_vars['topic']->value['topic_pic'];?>
">
                            <input type="submit" class="btn btn-primary center-block" value="保存设置">
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        </form>
    </div>

<?php
}
}
/* {/block "content"} */
}

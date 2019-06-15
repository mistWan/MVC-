<?php
/* Smarty version 3.1.30, created on 2018-09-21 19:26:48
  from "C:\xampp\htdocs\iou.cn\application\admin\view\topic\add.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ba4d5785f96e3_39087322',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '354bd634a882f32374ebdfb1db55773887d7cbc0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\iou.cn\\application\\admin\\view\\topic\\add.html',
      1 => 1537529202,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/layout.html' => 1,
  ),
),false)) {
function content_5ba4d5785f96e3_39087322 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_76335ba4d5785f65e6_10513470', "content");
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:common/layout.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "content"} */
class Block_76335ba4d5785f65e6_10513470 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="aw-content-wrap">
        <form method="post" action="?m=admin&c=topic&a=addHandleAction"
        enctype="multipart/form-data" id="settings_form">

        <div class="mod">
            <div class="mod-head">
                <h3>
                    <ul class="nav nav-tabs">
                        <li><a href="?m=admin&c=topic&a=indexAction">话题管理</a></li>
                        <li class="active"><a href="javascript:;">新建话题</a></li>
                    </ul>
                </h3>
            </div>

            <div class="tab-content mod-content">
                <table class="table table-striped">
                    <tbody><tr>
                        <td>
                            <div class="form-group">
                                <span class="col-sm-4 col-xs-3 control-label">缩略图:</span>
                                <div class="col-sm-5 col-xs-8">
                                    <input type="file" name="topic_pic">
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="form-group">
                                <span class="col-sm-4 col-xs-3 control-label">话题标题:</span>
                                <div class="col-sm-5 col-xs-8">
                                    <input type="text" name="topic_title" class="form-control">
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="form-group">
                                <span class="col-sm-4 col-xs-3 control-label">话题描述:</span>
                                <div class="col-sm-5 col-xs-8">
                                    <textarea name="topic_desc" class="form-control"></textarea>
                                </div>
                            </div>
                        </td>
                    </tr>

                    </tbody><tfoot>
                    <tr>
                        <td>
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

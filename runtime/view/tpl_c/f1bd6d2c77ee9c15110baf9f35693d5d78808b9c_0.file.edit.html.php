<?php
/* Smarty version 3.1.30, created on 2018-09-19 17:15:24
  from "C:\xampp\htdocs\iou.cn\application\admin\view\category\edit.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ba213ac2f5430_70659306',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f1bd6d2c77ee9c15110baf9f35693d5d78808b9c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\iou.cn\\application\\admin\\view\\category\\edit.html',
      1 => 1537348514,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/layout.html' => 1,
  ),
),false)) {
function content_5ba213ac2f5430_70659306 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_306575ba213ac2f16a7_16049399', "content");
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:common/layout.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "content"} */
class Block_306575ba213ac2f16a7_16049399 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="aw-content-wrap">
    <form method="post" id="category_form"
          action="?m=admin&c=category&a=updateAction" enctype="multipart/form-data">
        <div class="mod">
            <div class="mod-head">
                <h3>
                    <span class="pull-left">分类编辑</span>
                </h3>
            </div>
            <div class="tab-content mod-content">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                                <span class="col-sm-4 col-xs-3 control-label">分类标题:</span>
                                <div class="col-sm-5 col-xs-8">
                                    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['cat_list']->value[0]['cat_name'];?>
" name="cat_name"
                                           class="form-control">
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="form-group">
                                <span class="col-sm-4 col-xs-3 control-label">分类描述:</span>
                                <div class="col-sm-5 col-xs-8">
                                    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['cat_list']->value[0]['cat_desc'];?>
" name="cat_desc"
                                           class="form-control">
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="form-group">
                                <span class="col-sm-4 col-xs-3 control-label">分类图标:</span>
                                <div class="col-sm-5 col-xs-8">
                                    <input type="file" value="<?php echo THUMB_PATH;?>
category/<?php echo $_smarty_tpl->tpl_vars['cat_list']->value[0]['cat_logo'];?>
" name="cat_logo" class="form-control">
                                    <p>ICON已存在</p>
                                    <!--<img src="<?php echo THUMB_PATH;?>
category/<?php echo $_smarty_tpl->tpl_vars['cat_list']->value[0]['cat_logo'];?>
" alt="">-->
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <span class="col-sm-4 col-xs-3 control-label">父级分类:</span>
                                <div class="col-sm-5 col-xs-8">
                                    <select class="form-control" name="parent_id">
                                        <option value="0">无</option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cat_lists']->value, 'val', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>
                                        <option
                                        <?php if ($_smarty_tpl->tpl_vars['cat_list']->value[0]["parent_id"] == $_smarty_tpl->tpl_vars['val']->value['cat_id']) {?>selected<?php }?>
                                        value="<?php echo $_smarty_tpl->tpl_vars['val']->value['cat_id'];?>
" >
                                            <?php echo preg_replace('!^!m',str_repeat("&nbsp;&nbsp;",$_smarty_tpl->tpl_vars['val']->value['level']),$_smarty_tpl->tpl_vars['val']->value['cat_name']);?>

                                        </option>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    </select>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td>
                            <input type="hidden" name="cat_id" value="<?php echo $_smarty_tpl->tpl_vars['cat_list']->value[0]['cat_id'];?>
">
                            <input type="hidden" name="old_cat_logo" value="<?php echo $_smarty_tpl->tpl_vars['cat_list']->value[0]['cat_logo'];?>
">
                            <input type="submit"
                                   class="btn btn-primary center-block" value="保存设置">
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </form>
</div>


<div class="aw-footer">
    <p>
        Copyright &copy; 2016-2099 - Powered By
        <a target="blank" href="">有问必答 1.0</a>
    </p>
</div>
<?php
}
}
/* {/block "content"} */
}

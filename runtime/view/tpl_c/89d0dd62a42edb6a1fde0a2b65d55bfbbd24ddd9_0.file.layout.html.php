<?php
/* Smarty version 3.1.30, created on 2018-11-22 01:49:26
  from "C:\xampp\htdocs\iou.cn\application\admin\view\common\layout.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5bf59aa69907a2_79066769',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89d0dd62a42edb6a1fde0a2b65d55bfbbd24ddd9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\iou.cn\\application\\admin\\view\\common\\layout.html',
      1 => 1542822551,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf59aa69907a2_79066769 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="webkit" name="renderer">
    <meta content="IE=edge,Chrome=1" http-equiv="X-UA-Compatible">
    <meta content="width=device-width,initial-scale=1,maximum-scale=1" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="blank" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <title>分类管理-有问必答</title>
    <link href="<?php echo PUBLIC_PATH;?>
home/css/bootstrap.css?v=20151125" rel="stylesheet" type="text/css">
    <link href="<?php echo PUBLIC_PATH;?>
home/css/icon.css?v=20151125" rel="stylesheet" type="text/css">
    <link href="<?php echo PUBLIC_PATH;?>
admin/css/common.css?v=20151125" rel="stylesheet" type="text/css">
    <?php echo '<script'; ?>
 src="<?php echo PUBLIC_PATH;?>
home/js/jquery.2.js?v=20151125" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo PUBLIC_PATH;?>
home/js/jquery.form.js?v=20151125" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo PUBLIC_PATH;?>
admin/js/framework.js?v=20151125" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo PUBLIC_PATH;?>
admin/js/global.js?v=20151125" type="text/javascript"><?php echo '</script'; ?>
>
    <!--[if lte IE 8]>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PUBLIC_PATH;?>
js/respond.js"><?php echo '</script'; ?>
>
    <![endif]-->
</head>
<body>
<div class="aw-header">
    <button class="btn btn-sm mod-head-btn pull-left">
        <i class="icon icon-bar"></i>
    </button>

    <div class="mod-header-user">
        <ul class="pull-right">

            <li class="dropdown username">
                <a data-toggle="dropdown" class="dropdown-toggle" href="">
                    <img width="30" class="img-circle" src="<?php echo PUBLIC_PATH;?>
common/avatar-mid-img.png">
                    HAZY
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu pull-right mod-user">
                    <li>
                        <a target="_blank" href="">
                            <i class="icon icon-user"></i>
                            账户
                        </a>
                    </li>

                    <li>
                        <a href="login.html">
                            <i class="icon icon-logout"></i>
                            退出
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div id="aw-side" class="aw-side ps-container">
    <div class="mod">
        <div class="mod-logo">
            <img alt="" src="<?php echo PUBLIC_PATH;?>
admin/img/logo.png" class="pull-left">
            <h1>有问必答</h1>
        </div>

        <div class="mod-message">
            <div class="message">
                <a title="首页" target="_blank" href="../index.html" class="btn btn-sm">
                    <i class="icon icon-home"></i>
                </a>

                <a title="退出" href="login.html" class="btn btn-sm">
                    <i class="icon icon-logout"></i>
                </a>
            </div>
        </div>

        <ul class="mod-bar">
            <input type="hidden" val="0" id="hide_values">
            <li>
                <a class=" icon icon-ul" href="index.html">
                    <span>摘要信息</span>
                </a>
            </li>

            <li>
                <a data="icon" class=" icon icon-reply active" href="javascript:;">
                    <span>内容管理</span>
                </a>

                <ul class="hide" style="display: block;">
                    <li>
                        <a class="active" href="?m=admin&c=category&a=indexAction">
                            <span>分类管理</span>
                        </a>
                    </li>
                    <li>
                        <a href="?m=admin&c=Question&a=addAction">
                            <span>采集管理</span>
                        </a>
                    </li>
                    <li>
                        <a href="?m=admin&c=topic&a=indexAction">
                            <span>话题管理</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a data="icon" class=" icon icon-user" href="javascript:;">
                    <span>用户管理</span>
                </a>

                <ul class="hide">
                    <li>
                        <a href="user.html">
                            <span>用户列表</span>
                        </a>
                    </li>
                    <li>
                        <a href="role.html">
                            <span>用户角色</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a data="icon" class="icon icon-setting" href="javascript:;">
                    <span>全局设置</span>
                </a>

                <ul class="hide">
                    <li>
                        <a href="site.html">
                            <span>站点信息</span>
                        </a>
                    </li>
                    <li>
                        <a href="regedit.html">
                            <span>注册访问</span>
                        </a>
                    </li>
                    <li>
                        <a href="mail.html">
                            <span>邮件设置</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a data="icon" class=" icon icon-job" href="javascript:;">
                    <span>工具</span>
                </a>

                <ul class="hide">
                    <li>
                        <a href="tool.html">
                            <span>系统维护</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="ps-scrollbar-x-rail" style="width: 235px; display: none; left: 0px; bottom: 3px;">
        <div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps-scrollbar-y-rail" style="top: 0px; height: 607px; display: inherit; right: 0px;">
        <div class="ps-scrollbar-y" style="top: 0px; height: 560px;"></div>
    </div>
</div>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_115065bf59aa69897c7_09693354', "content");
?>

</body>
</html>
<?php }
/* {block "content"} */
class Block_115065bf59aa69897c7_09693354 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "content"} */
}

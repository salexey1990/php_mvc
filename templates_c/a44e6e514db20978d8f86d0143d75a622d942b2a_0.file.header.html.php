<?php
/* Smarty version 3.1.29, created on 2016-02-09 22:21:26
  from "Y:\home\php2\www\mvc\views\header.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56ba2e26645401_13369864',
  'file_dependency' => 
  array (
    'a44e6e514db20978d8f86d0143d75a622d942b2a' => 
    array (
      0 => 'Y:\\home\\php2\\www\\mvc\\views\\header.html',
      1 => 1455042067,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56ba2e26645401_13369864 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['site_title']->value;?>
</title>
</head>
<body>
	<div id='header'>
		<h1><a href="index.php">My site</a></h1>
	</div>
	<div class="loginform">
            <?php if (!$_smarty_tpl->tpl_vars['logged']->value) {?>
            <form method="post" action="index.php?page=User&action=login">
            <div>
                Email: <input type="text" name="username">
            </div>
            <div>
                Password: <input type="password" name="password">
            </div>
            <input type="submit" name="submit" value='login'>
            <input type="submit" name="register" value='register'>
            </form>
            <?php } else { ?>
            Вы вошли как ...
            <?php }?>
            
        </div><?php }
}

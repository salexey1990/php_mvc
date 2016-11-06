<?php
/* Smarty version 3.1.29, created on 2016-02-09 22:32:38
  from "Y:\home\php2\www\mvc\views\register.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56ba30c6c02647_86758566',
  'file_dependency' => 
  array (
    '8cc51006558f0d34d5dcdbf4403901ead583a035' => 
    array (
      0 => 'Y:\\home\\php2\\www\\mvc\\views\\register.html',
      1 => 1455040139,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56ba30c6c02647_86758566 ($_smarty_tpl) {
?>
<form method="post" action="index.php?page=User&action=register">
            <div>
                Email: <input type="text" name="email">
            </div>
            <div>
                Password: <input type="password" name="password">
            </div>
            <div>
                Confirm: <input type="password" name="password2">
            </div>
            <input type="submit" name="register_submitted">
            </form><?php }
}

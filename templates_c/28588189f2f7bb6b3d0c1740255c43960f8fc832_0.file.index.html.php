<?php
/* Smarty version 3.1.29, created on 2016-02-09 22:13:54
  from "Y:\home\php2\www\mvc\views\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56ba2c62b75219_15465495',
  'file_dependency' => 
  array (
    '28588189f2f7bb6b3d0c1740255c43960f8fc832' => 
    array (
      0 => 'Y:\\home\\php2\\www\\mvc\\views\\index.html',
      1 => 1455041609,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/header.html' => 1,
    'file:views/footer.html' => 1,
  ),
),false)) {
function content_56ba2c62b75219_15465495 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:views/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<div id='content'>
		<?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
		<?php
$_from = $_smarty_tpl->tpl_vars['articles']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_value_0_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$__foreach_value_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$__foreach_value_0_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>
			<h1>
				<a href="index.php?page=Articles&action=read&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->Properties['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value->Properties['title'];?>
</a>
			</h1>
			<p>
				<?php echo $_smarty_tpl->tpl_vars['value']->value->Properties['text'];?>

			</p>
			<p>
				Author: <a href="index.php?page=Authors&action=read&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->Properties['author'][0]->Properties['id'];?>
">
				<?php echo $_smarty_tpl->tpl_vars['value']->value->Properties['author'][0]->Properties['name'];?>
</a><br>
				Views: <?php echo $_smarty_tpl->tpl_vars['value']->value->Properties['views'];?>

			</p>
		<?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_0_saved_local_item;
}
if ($__foreach_value_0_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_0_saved_item;
}
if ($__foreach_value_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_value_0_saved_key;
}
?>
		<?php }?>




	</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:views/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}

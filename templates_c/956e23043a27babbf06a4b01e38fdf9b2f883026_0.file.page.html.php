<?php
/* Smarty version 3.1.29, created on 2016-02-07 14:29:08
  from "Y:\home\php2\www\mvc\views\page.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56b71c746fe397_66962205',
  'file_dependency' => 
  array (
    '956e23043a27babbf06a4b01e38fdf9b2f883026' => 
    array (
      0 => 'Y:\\home\\php2\\www\\mvc\\views\\page.html',
      1 => 1454840909,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/header.html' => 1,
    'file:views/footer.html' => 1,
  ),
),false)) {
function content_56b71c746fe397_66962205 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:views/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<div id='content'>
		<?php
$_from = $_smarty_tpl->tpl_vars['authors']->value;
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
				<?php echo $_smarty_tpl->tpl_vars['value']->value->Properties['name'];?>
</a>
			</h1>
			<p>
				articles: <?php
$_from = $_smarty_tpl->tpl_vars['value']->value->Properties['article'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_value1_1_saved_item = isset($_smarty_tpl->tpl_vars['value1']) ? $_smarty_tpl->tpl_vars['value1'] : false;
$__foreach_value1_1_saved_key = isset($_smarty_tpl->tpl_vars['key1']) ? $_smarty_tpl->tpl_vars['key1'] : false;
$_smarty_tpl->tpl_vars['value1'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key1'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value1']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['value1']->value) {
$_smarty_tpl->tpl_vars['value1']->_loop = true;
$__foreach_value1_1_saved_local_item = $_smarty_tpl->tpl_vars['value1'];
?>
					<a href="index.php?page=Articles&action=read&id=<?php echo $_smarty_tpl->tpl_vars['value1']->value->Properties['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value1']->value->Properties['title'];?>
</a>
				<?php
$_smarty_tpl->tpl_vars['value1'] = $__foreach_value1_1_saved_local_item;
}
if ($__foreach_value1_1_saved_item) {
$_smarty_tpl->tpl_vars['value1'] = $__foreach_value1_1_saved_item;
}
if ($__foreach_value1_1_saved_key) {
$_smarty_tpl->tpl_vars['key1'] = $__foreach_value1_1_saved_key;
}
?>
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
	</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:views/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

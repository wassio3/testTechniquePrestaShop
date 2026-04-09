<?php
/* Smarty version 3.1.33, created on 2026-04-09 15:02:42
  from 'C:\wamp64\www\prestashop\testTechniquePrestaShop\themes\classic\templates\page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_69d7a37253c3a5_41270071',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da0bd1cf4e8ca5e58b45d57a2596729b3be437b7' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\testTechniquePrestaShop\\themes\\classic\\templates\\page.tpl',
      1 => 1775726682,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69d7a37253c3a5_41270071 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18423406869d7a37252fa15_57884595', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'page_title'} */
class Block_7285718169d7a372530f09_70712551 extends Smarty_Internal_Block
{
public $callsChild = 'true';
public $hide = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <header class="page-header">
          <h1><?php 
$_smarty_tpl->inheritance->callChild($_smarty_tpl, $this);
?>
</h1>
        </header>
      <?php
}
}
/* {/block 'page_title'} */
/* {block 'page_header_container'} */
class Block_189742478669d7a372530359_46938077 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7285718169d7a372530f09_70712551', 'page_title', $this->tplIndex);
?>

    <?php
}
}
/* {/block 'page_header_container'} */
/* {block 'page_content_top'} */
class Block_8323008669d7a372536f58_00418336 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'page_content'} */
class Block_136785811069d7a372537e91_16582331 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Page content -->
        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_141577731169d7a3725361d6_33605164 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-content card card-block">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8323008669d7a372536f58_00418336', 'page_content_top', $this->tplIndex);
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_136785811069d7a372537e91_16582331', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_footer'} */
class Block_139022965169d7a37253aad2_00950946 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Footer content -->
        <?php
}
}
/* {/block 'page_footer'} */
/* {block 'page_footer_container'} */
class Block_172094244269d7a372539f91_74089862 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <footer class="page-footer">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_139022965169d7a37253aad2_00950946', 'page_footer', $this->tplIndex);
?>

      </footer>
    <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_18423406869d7a37252fa15_57884595 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_18423406869d7a37252fa15_57884595',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_189742478669d7a372530359_46938077',
  ),
  'page_title' => 
  array (
    0 => 'Block_7285718169d7a372530f09_70712551',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_141577731169d7a3725361d6_33605164',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_8323008669d7a372536f58_00418336',
  ),
  'page_content' => 
  array (
    0 => 'Block_136785811069d7a372537e91_16582331',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_172094244269d7a372539f91_74089862',
  ),
  'page_footer' => 
  array (
    0 => 'Block_139022965169d7a37253aad2_00950946',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <section id="main">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_189742478669d7a372530359_46938077', 'page_header_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_141577731169d7a3725361d6_33605164', 'page_content_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_172094244269d7a372539f91_74089862', 'page_footer_container', $this->tplIndex);
?>


  </section>

<?php
}
}
/* {/block 'content'} */
}

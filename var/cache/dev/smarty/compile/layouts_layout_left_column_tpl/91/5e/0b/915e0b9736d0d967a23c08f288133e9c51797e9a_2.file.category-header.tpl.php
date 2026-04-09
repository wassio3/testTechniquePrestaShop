<?php
/* Smarty version 3.1.33, created on 2026-04-09 16:08:07
  from 'C:\wamp64\www\prestashop\testTechniquePrestaShop\themes\classic\templates\catalog\_partials\category-header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_69d7b2c7b23d98_40848419',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '915e0b9736d0d967a23c08f288133e9c51797e9a' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\testTechniquePrestaShop\\themes\\classic\\templates\\catalog\\_partials\\category-header.tpl',
      1 => 1775740315,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69d7b2c7b23d98_40848419 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="js-product-list-header">
    <?php if ($_smarty_tpl->tpl_vars['listing']->value['pagination']['items_shown_from'] == 1) {?>

                <?php $_smarty_tpl->_assignInScope('subcats', Category::getChildren($_smarty_tpl->tpl_vars['category']->value['id'],$_smarty_tpl->tpl_vars['language']->value['id'],true));?>
        <?php if (isset($_smarty_tpl->tpl_vars['subcategories_slider']->value) && count($_smarty_tpl->tpl_vars['subcategories_slider']->value) > 0) {?>
            <div class="subcategories-slider-wrapper">
                <div class="subcategories-slider" id="subcategories-slider">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['subcategories_slider']->value, 'subcat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['subcat']->value) {
?>
                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subcat']->value['url'], ENT_QUOTES, 'UTF-8');?>
" class="subcat-item">
                            <div class="subcat-circle">
                                <?php if ($_smarty_tpl->tpl_vars['subcat']->value['image_url']) {?>
                                    <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subcat']->value['image_url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subcat']->value['name'], ENT_QUOTES, 'UTF-8');?>
">
                                <?php } else { ?>
                                    <div class="subcat-no-image"></div>
                                <?php }?>
                            </div>
                            <span class="subcat-name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subcat']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span>
                            <span class="subcat-count"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subcat']->value['nb'], ENT_QUOTES, 'UTF-8');?>
 produits</span>
                        </a>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
                <button class="slider-btn slider-prev" onclick="slideSubcat(-1)">&#10094;</button>
                <button class="slider-btn slider-next" onclick="slideSubcat(1)">&#10095;</button>
            </div>
        <?php }?>

        <div class="block-category card card-block">
            <h1 class="h1"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['name'], ENT_QUOTES, 'UTF-8');?>
</h1>
            <div class="block-category-inner">
                <?php if ($_smarty_tpl->tpl_vars['category']->value['description']) {?>
                    <div id="category-description" class="text-muted"><?php echo $_smarty_tpl->tpl_vars['category']->value['description'];?>
</div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['category']->value['image']['large']['url']) {?>
                    <div class="category-cover">
                        <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['image']['large']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php if (!empty($_smarty_tpl->tpl_vars['category']->value['image']['legend'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['image']['legend'], ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['name'], ENT_QUOTES, 'UTF-8');
}?>">
                    </div>
                <?php }?>
            </div>
        </div>

    <?php }?>
</div>

<style>
    .subcategories-slider-wrapper {
        position: relative;
        overflow: hidden;
        padding: 20px 40px;
        background: #fff;
        margin-bottom: 20px;
        border-bottom: 1px solid #eee;
    }
    .subcategories-slider {
        display: flex;
        gap: 20px;
        transition: transform 0.4s ease;
        align-items: flex-start;
    }
    .subcat-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-decoration: none;
        color: #333;
        min-width: 110px;
        cursor: pointer;
    }
    .subcat-circle {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid #eee;
        margin-bottom: 8px;
        background: #f5f5f5;
    }
    .subcat-circle img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .subcat-no-image {
        width: 100%;
        height: 100%;
        background: #ddd;
    }
    .subcat-name {
        font-size: 12px;
        font-weight: 600;
        text-align: center;
        text-transform: uppercase;
        margin-bottom: 3px;
    }
    .subcat-count {
        font-size: 11px;
        color: #999;
        text-align: center;
    }
    .subcat-item:hover .subcat-circle {
        border-color: #333;
    }
    .slider-btn {
        position: absolute;
        top: 45%;
        transform: translateY(-50%);
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 50%;
        width: 32px;
        height: 32px;
        cursor: pointer;
        font-size: 14px;
        z-index: 10;
        box-shadow: 0 2px 5px rgba(0,0,0,.1);
    }
    .slider-prev {
        left: 5px;
    }
    .slider-next {
        right: 5px;
    }
</style>

<?php echo '<script'; ?>
>
    var sliderIndex = 0;
    var itemWidth = 130;

    function slideSubcat(direction) {
        var slider = document.getElementById('subcategories-slider');
        var items = slider.querySelectorAll('.subcat-item');
        var maxIndex = Math.max(0, items.length - 4);

        sliderIndex += direction;
        if (sliderIndex < 0)
            sliderIndex = 0;
        if (sliderIndex > maxIndex)
            sliderIndex = maxIndex;

        slider.style.transform = 'translateX(-' + (sliderIndex * itemWidth) + 'px)';
    }
<?php echo '</script'; ?>
>
<?php }
}

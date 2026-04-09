{**
 * 2007-2019 PrestaShop and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2019 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
<div id="js-product-list-header">
    {if $listing.pagination.items_shown_from == 1}

        {* DIAPORAMA SOUS-CATÉGORIES *}
        {assign var='subcats' value=Category::getChildren($category.id, $language.id, true)}
        {if isset($subcategories_slider) && $subcategories_slider|count > 0}
            <div class="subcategories-slider-wrapper">
                <div class="subcategories-slider" id="subcategories-slider">
                    {foreach from=$subcategories_slider item=subcat}
                        <a href="{$subcat.url}" class="subcat-item">
                            <div class="subcat-circle">
                                {if $subcat.image_url}
                                    <img src="{$subcat.image_url}" alt="{$subcat.name}">
                                {else}
                                    <div class="subcat-no-image"></div>
                                {/if}
                            </div>
                            <span class="subcat-name">{$subcat.name}</span>
                            <span class="subcat-count">{$subcat.nb} produits</span>
                        </a>
                    {/foreach}
                </div>
                <button class="slider-btn slider-prev" onclick="slideSubcat(-1)">&#10094;</button>
                <button class="slider-btn slider-next" onclick="slideSubcat(1)">&#10095;</button>
            </div>
        {/if}

        <div class="block-category card card-block">
            <h1 class="h1">{$category.name}</h1>
            <div class="block-category-inner">
                {if $category.description}
                    <div id="category-description" class="text-muted">{$category.description nofilter}</div>
                {/if}
                {if $category.image.large.url}
                    <div class="category-cover">
                        <img src="{$category.image.large.url}" alt="{if !empty($category.image.legend)}{$category.image.legend}{else}{$category.name}{/if}">
                    </div>
                {/if}
            </div>
        </div>

    {/if}
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

<script>
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
</script>

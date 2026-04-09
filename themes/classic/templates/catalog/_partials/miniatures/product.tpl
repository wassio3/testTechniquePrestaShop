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
{block name='product_miniature_item'}
  <article class="product-miniature js-product-miniature"
           data-id-product="{$product.id_product}"
           data-id-product-attribute="{$product.id_product_attribute}"
           itemscope itemtype="http://schema.org/Product">
    <div class="thumbnail-container">

      {block name='product_thumbnail'}
        {if $product.cover}
          <a href="{if isset($product._is_variant)}{$product.url}{else}{$product.canonical_url}{/if}" class="thumbnail product-thumbnail">
            <img
              src="{$product.cover.bySize.home_default.url}"
              alt="{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name|truncate:50:'...'}{/if}"
              data-full-size-image-url="{$product.cover.large.url}"
            />
          </a>
        {else}
          <a href="{if isset($product._is_variant)}{$product.url}{else}{$product.canonical_url}{/if}" class="thumbnail product-thumbnail">
            <img src="{$urls.no_picture_image.bySize.home_default.url}" />
          </a>
        {/if}
      {/block}

      {if isset($product._is_variant) && $product._is_variant}
        <span class="color-badge"
              style="background-color: {$product.color_code|escape:'html':'UTF-8'};"
              title="{$product.color_name|escape:'html':'UTF-8'}">
        </span>
      {/if}

      <div class="product-description">
        {block name='product_name'}
          {if $page.page_name == 'index'}
            <h3 class="h3 product-title" itemprop="name">
              <a href="{if isset($product._is_variant)}{$product.url}{else}{$product.canonical_url}{/if}">
                {$product.name|truncate:50:'...'}
              </a>
            </h3>
          {else}
            <h2 class="h3 product-title" itemprop="name">
              <a href="{if isset($product._is_variant)}{$product.url}{else}{$product.canonical_url}{/if}">
                {$product.name|truncate:50:'...'}
              </a>
            </h2>
          {/if}
        {/block}

        {block name='product_price_and_shipping'}
          {if $product.show_price}
            <div class="product-price-and-shipping">
              {if $product.has_discount}
                {hook h='displayProductPriceBlock' product=$product type="old_price"}
                <span class="sr-only">{l s='Regular price' d='Shop.Theme.Catalog'}</span>
                <span class="regular-price">{$product.regular_price}</span>
                {if $product.discount_type === 'percentage'}
                  <span class="discount-percentage discount-product">{$product.discount_percentage}</span>
                {elseif $product.discount_type === 'amount'}
                  <span class="discount-amount discount-product">{$product.discount_amount_to_display}</span>
                {/if}
              {/if}
              {hook h='displayProductPriceBlock' product=$product type="before_price"}
              <span class="sr-only">{l s='Price' d='Shop.Theme.Catalog'}</span>
              <span itemprop="price" class="price">{$product.price}</span>
              {hook h='displayProductPriceBlock' product=$product type='unit_price'}
              {hook h='displayProductPriceBlock' product=$product type='weight'}
            </div>
          {/if}
        {/block}

        {block name='product_reviews'}
          {hook h='displayProductListReviews' product=$product}
        {/block}
      </div>

      {block name='product_flags'}
        <ul class="product-flags">
          {foreach from=$product.flags item=flag}
            <li class="product-flag {$flag.type}">{$flag.label}</li>
          {/foreach}
        </ul>
      {/block}

      <div class="highlighted-informations no-variants hidden-sm-down">
        {block name='quick_view'}
          <a class="quick-view" href="#" data-link-action="quickview">
            <i class="material-icons search">&#xE8B6;</i> {l s='Quick view' d='Shop.Theme.Actions'}
          </a>
        {/block}

        {block name='product_variants'}
          {if !isset($product._is_variant) && $product.main_variants}
            <div class="variant-links">
              {foreach from=$product.main_variants item=variant}
                <a
                  href="{$variant.url}?id_product_attribute={$variant.id_product_attribute}"
                  title="{$variant.name|escape:'html':'UTF-8'}"
                  class="color-swatch-link"
                  aria-label="{$variant.name|escape:'html':'UTF-8'}"
                >
                  <span
                    class="color-swatch rounded"
                    style="background-color:{$variant.color};"
                    title="{$variant.name|escape:'html':'UTF-8'}"
                  ></span>
                </a>
              {/foreach}
            </div>
          {/if}
        {/block}

      </div>

    </div>
  </article>
{/block}

<?php
class CategoryController extends CategoryControllerCore
{
    public function initContent()
    {
        parent::initContent();

        $id_lang = $this->context->language->id;
        $id_category = $this->category->id;

        $children = Category::getChildren($id_category, $id_lang, true);
        $subcategories = [];

        foreach ($children as $child) {
            $id_cat = (int)$child['id_category'];

            // Nombre de produits
            $nb = (int)Db::getInstance()->getValue(
                'SELECT COUNT(*) FROM `' . _DB_PREFIX_ . 'category_product` WHERE `id_category` = ' . $id_cat
            );

            // Image
            $image_url = '';
            if (file_exists(_PS_CAT_IMG_DIR_ . $id_cat . '.jpg')) {
                $image_url = $this->context->link->getMediaLink(_THEME_CAT_DIR_ . $id_cat . '.jpg');
            }

            // Lien
            $cat = new Category($id_cat, $id_lang);
            $url = $this->context->link->getCategoryLink($id_cat);

            $subcategories[] = [
                'name'      => $child['name'],
                'url'       => $url,
                'image_url' => $image_url,
                'nb'        => $nb,
            ];
        }

        $this->context->smarty->assign('subcategories_slider', $subcategories);
    }
    
  protected function getProductSearchVariables()
{
    $data = parent::getProductSearchVariables();

    if (empty($data['products'])) {
        return $data;
}

    foreach ($data['products'] as $product) {
        if (!empty($product['_is_variant'])) {
            return $data;
        }
        break;
    }

    $id_lang  = $this->context->language->id;
    $expanded = [];

    foreach ($data['products'] as $product) {
        $id_product = $product['id_product'];

        if (empty($id_product)) {
            $expanded[] = $product;
            continue;
        }

        $variants = Product::getColorVariants(
            (int)$id_product,
            $id_lang,
            $this->context
        );

        if (empty($variants)) {
            $expanded[] = $product;
            continue;
        }

        foreach ($variants as $variant) {
            $entry = json_decode(json_encode($product), true);

            $entry['id_product_attribute'] = $variant['id_product_attribute'];
            $entry['name']                 = $entry['name'] . ' — ' . $variant['color_name'];
            $entry['url']                  = $variant['link'];
            $entry['canonical_url']        = $variant['link'];
            $entry['main_variants']        = [];
            $entry['color_name']           = $variant['color_name'];
            $entry['color_code']           = $variant['color_code'];
            $entry['_is_variant']          = true;

            if (!empty($variant['image_url'])) {
                $entry['cover']['bySize']['home_default']['url'] = $variant['image_url'];
            }

            $expanded[] = $entry;
        }
    }

    $data['products'] = $expanded;

    return $data;
}
}
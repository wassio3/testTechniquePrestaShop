<?php
class Cart extends CartCore
{
    public function getProducts($refresh = false, $id_product = false, $id_country = null, $fullInfos = true)
    {
        $products = parent::getProducts($refresh, $id_product, $id_country);

        foreach ($products as &$product) {
            $id_product = (int)$product['id_product'];

            // Récupérer toutes les catégories du produit
            $categories = Product::getProductCategoriesFull($id_product, $this->id_lang);

            $deepest = null;
            $max_level = -1;

            foreach ($categories as $cat) {
                $category = new Category($cat['id_category'], $this->id_lang);
                if ($category->level_depth > $max_level && $category->id != Configuration::get('PS_ROOT_CATEGORY') && $category->id != Configuration::get('PS_HOME_CATEGORY')) {
                    $max_level = $category->level_depth;
                    $deepest = $category->name;
                }
            }

            $product['deepest_subcategory'] = $deepest ?? '';
        }

        return $products;
    }
}
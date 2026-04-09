<?php
class Category extends CategoryCore
{
    public static function getSubcategoriesWithProducts($id_parent, $id_lang)
    {
        $subcategories = [];
        $children = Category::getChildren($id_parent, $id_lang, true);

        foreach ($children as $child) {
            $cat = new Category($child['id_category'], $id_lang);
            $nb_products = $cat->getProducts($id_lang, 1, 1);
            $nb = $cat->getProductsNb($id_lang);

            $image_url = '';
            if (file_exists(_PS_CAT_IMG_DIR_ . $child['id_category'] . '.jpg')) {
                $image_url = _THEME_CAT_DIR_ . $child['id_category'] . '.jpg';
            }

            $subcategories[] = [
                'id'        => $child['id_category'],
                'name'      => $child['name'],
                'url'       => $cat->getLink(),
                'image_url' => $image_url,
                'nb'        => $nb,
            ];
        }

        return $subcategories;
    }
}
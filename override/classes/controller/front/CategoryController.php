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
}
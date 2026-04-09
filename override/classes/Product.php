<?php
class Product extends ProductCore
{
    /**
     * Retourne toutes les variantes de couleur d'un produit
     * avec leur image, prix et lien vers la déclinaison.
     */
    public static function getColorVariants($id_product, $id_lang, Context $context = null)
    {
        if (!$context) {
            $context = Context::getContext();
        }

        $id_shop = (int)$context->shop->id;

        // Récupère les attributs de type "couleur" liés au produit
        $sql = '
            SELECT DISTINCT
                ag.id_attribute_group,
                a.id_attribute,
                al.name AS color_name,
                a.color,
                pai.id_image,
                pa.id_product_attribute,
                pa.price AS price_impact
            FROM `' . _DB_PREFIX_ . 'attribute_group` ag
            INNER JOIN `' . _DB_PREFIX_ . 'attribute_group_lang` agl
                ON (ag.id_attribute_group = agl.id_attribute_group
                    AND agl.id_lang = ' . (int)$id_lang . ')
            INNER JOIN `' . _DB_PREFIX_ . 'attribute` a
                ON (a.id_attribute_group = ag.id_attribute_group)
            INNER JOIN `' . _DB_PREFIX_ . 'attribute_lang` al
                ON (a.id_attribute = al.id_attribute
                    AND al.id_lang = ' . (int)$id_lang . ')
            INNER JOIN `' . _DB_PREFIX_ . 'product_attribute_combination` pac
                ON (pac.id_attribute = a.id_attribute)
            INNER JOIN `' . _DB_PREFIX_ . 'product_attribute` pa
                ON (pa.id_product_attribute = pac.id_product_attribute
                    AND pa.id_product = ' . (int)$id_product . ')
            LEFT JOIN `' . _DB_PREFIX_ . 'product_attribute_image` pai
                ON (pai.id_product_attribute = pa.id_product_attribute)
            WHERE ag.is_color_group = 1
              AND pa.id_product = ' . (int)$id_product . '
            GROUP BY a.id_attribute
            ORDER BY a.position ASC
        ';

        $rows = Db::getInstance()->executeS($sql);

        if (!$rows) {
            return [];
        }

        $product    = new Product($id_product, false, $id_lang, $id_shop, $context);
        $base_price = $product->getPrice(true, null, 2);

        $product_link = $context->link->getProductLink(
            $product,
            null,
            null,
            null,
            $id_lang,
            $id_shop
        );

        if (strpos($product_link, '?') !== false) {
            $product_link = substr($product_link, 0, strpos($product_link, '?'));
        }

        $variants = [];

        foreach ($rows as $row) {
            $id_image = (int)$row['id_image'];

            if (!$id_image) {
                $cover    = Product::getCover($id_product);
                $id_image = $cover ? (int)$cover['id_image'] : 0;
            }

            $image_url = $context->link->getImageLink(
                $product->link_rewrite,
                $id_product . '-' . $id_image,
                ImageType::getFormattedName('home')
            );

            $price = $base_price + (float)$row['price_impact'];

            $variant_link = $product_link . '?id_product_attribute=' . (int)$row['id_product_attribute'];

            $variants[] = [
                'id_attribute'         => (int)$row['id_attribute'],
                'id_product_attribute' => (int)$row['id_product_attribute'],
                'color_name'           => $row['color_name'],
                'color_code'           => $row['color'],
                'image_url'            => $image_url,
                'price'                => Tools::displayPrice($price),
                'link'                 => $variant_link,
            ];
        }

        return $variants;
    }
}
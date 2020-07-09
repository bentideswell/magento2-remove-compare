<?php
/**
 *
 */
namespace FishPig\RemoveCatalogProductCompare\Plugin\Magento\Catalog\Model;

use Magento\Catalog\Model\ProductRender;

class ProductRenderPlugin
{
    /**
     * @param ProductRender $subject
     * @param array $images
     * @return array
     */
    public function beforeSetImages(ProductRender $subject, array $images)
    {
        foreach($images as $it => $image) {
            if (strpos($image->getCode(), '_compared_') !== false) {
                unset($images[$it]);
            }
        }
        
        return [$images];
    }
}

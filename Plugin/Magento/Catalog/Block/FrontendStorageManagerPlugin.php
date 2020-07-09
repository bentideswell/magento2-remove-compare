<?php
/**
 *
 */
namespace FishPig\RemoveCatalogProductCompare\Plugin\Magento\Catalog\Block;

use Magento\Catalog\Block\FrontendStorageManager;

class FrontendStorageManagerPlugin
{
    /**
     * @param FrontendStorageManager $subject
     * @param string $result
     * @return string
     */
    public function afterGetConfigurationJson(FrontendStorageManager $subject, $result)
    {
        $data = json_decode($result, true);
        
        unset($data['recently_compared_product']);
        
        return json_encode($data);
    }
}
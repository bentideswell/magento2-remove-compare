<?php
/**
 *
 */
namespace FishPig\RemoveCatalogProductCompare\Plugin\Magento\Customer\Block;

use Magento\Customer\Block\SectionConfig;

class SectionConfigPlugin
{
    /**
     * Remove all references to compare
     *
     * @param SectionConfig $subject
     * @param array $result
     * @return array
     */
    public function afterGetSections(SectionConfig $subject, $result)
    {
        foreach($result as $uri => $items) {
            if (strpos($uri, '_compare/') !== false) {
                unset($result[$uri]);
                continue;
            }
            
            foreach($items as $k => $v) {
                if (in_array($v, ['compare-products', 'recently_compared_product'])) {
                    unset($result[$uri][$k]);
                }
            }
            
            if (!$result[$uri]) {
                unset($result[$uri]);
            }
        }
        
        return $result;
    }
}

<?php
/**
 *
 */
namespace FishPig\RemoveCatalogProductCompare\Plugin\Magento\Customer\CustomerData;

use Magento\Customer\CustomerData\SectionPool;

class SectionPoolPlugin
{
    /**
     * Remove all references to compare
     *
     * @param SectionPool $subject
     * @param array $result
     * @return array
     */
    public function afterGetSectionNames(SectionPool $subject, $result)
    {
        foreach($result as $key => $value) {
            if (in_array($value, ['compare-products', 'recently_compared_product'])) {
                unset($result[$key]);
            }
        }

        return $result;
    }
}

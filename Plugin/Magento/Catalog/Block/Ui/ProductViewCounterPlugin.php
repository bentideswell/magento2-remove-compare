<?php
/**
 *
 */
namespace FishPig\RemoveCatalogProductCompare\Plugin\Magento\Catalog\Block\Ui;

use Magento\Catalog\Block\Ui\ProductViewCounter;
use Magento\Framework\Serialize\SerializerInterface;

class ProductViewCounterPlugin
{
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }
    
    /**
     * @param ProductViewCounter $subject
     * @param string $result
     * @return string
     */
    public function afterGetCurrentProductData(ProductViewCounter $subject, $result)
    {
        $data = $this->serializer->unserialize($result);
        
        if (!empty($data['items'])) {
            foreach($data['items'] as $id => $item) {
                if (isset($item['add_to_compare_button'])) {
                    unset($data['items'][$id]['add_to_compare_button']);
                }
            }
        }
        
        return $this->serializer->serialize($data);
    }
}

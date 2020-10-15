<?php

namespace Training\Module1\Plugin;

class Product
{
    private $scopeConfig;
    public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }
    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {

        $configValue = $this->scopeConfig->getValue('box_size/box_size_group/default_box_size_attribute', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $addValue = $this->scopeConfig->getValue('box_size/box_size_group/size', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        if ($configValue) {
            return $result + $addValue;
        }
        return $result * 0.5;
    }
}

<?php
class ConversionBug_Productbyzipcode_Helper_Data extends Mage_Core_Helper_Abstract {

    const XML_CONFIG_PATH_PRODUCTBYZIPCODE_ENABLED = 'cbproductbyzipcode/general/status';
    const PRODUCTBYZIPCODE_ENABLED = 1;

    public function isEnable() {
        $storeId = Mage::app()->getStore()->getStoreId();
        if (self::PRODUCTBYZIPCODE_ENABLED == Mage::getStoreConfig(self::XML_CONFIG_PATH_PRODUCTBYZIPCODE_ENABLED, $storeId))
            return true;

        return false;
    }
}
?>

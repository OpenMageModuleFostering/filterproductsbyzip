<?php

class ConversionBug_Productbyzipcode_Block_Productbyzipcode extends Mage_Catalog_Block_Product_List {

    /**
     * Product Zipcode
     *
     * @var Mage::getSingleton('core/session')
     */
    protected $_zipcode;
    protected $_collection;

    public function __construct() {
        parent::__construct();
        $helper = Mage::helper('cbproductbyzipcode');
        if ($helper->isEnable()) {
            $this->_zipcode = Mage::getSingleton('core/session')->getZipCode();
            } 
            //if(isset($this->_zipcode) && !empty($this->_zipcode)){
            
            $collection = Mage::getResourceModel('catalog/product_collection');
            $attribute = Mage::getModel('eav/config')->getAttribute('catalog_product', 'zipcode');
            $collection->addAttributeToSelect(Mage::getSingleton('catalog/config')->getProductAttributes())
                    ->addAttributeToFilter($attribute, array(
                        array('finset' => array($this->_zipcode))
                            )
                    )
                    ->addMinimalPrice()
                    ->addFinalPrice()
                    ->addTaxPercents()
                    ->addUrlRewrite();

            Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($collection);
            Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($collection);
            
            $this->_collection = $collection;
            //}
       
    }

    public function _getProductCollection(){
        return $this->_collection;
    }
    /**
     * Retrieve form action url and set "secure" param to avoid confirm
     * message when we submit form from secure page to unsecure
     *
     * @return string
     */
    public function getFormActionUrl() {
        return $this->getUrl('productbyzipcode/search/index', array('_secure' => true));
    }

}

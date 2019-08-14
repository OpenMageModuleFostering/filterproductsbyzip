<?php

$installer = $this->getCatalogSetup();
$installer->startSetup();
 
$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'zipcode', array(
    'group'             => 'General',
    'type'              => 'text',
    'backend'           => '',
    'frontend'          => '',
    'label'             => 'Zipcode',
    'input'             => 'textarea',
    'class'             => '',
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_WEBSITE,
    'visible'           => true,
    'required'          => false,
    'user_defined'      => false,
    'searchable'        => false,
    'filterable'        => false,
    'comparable'        => false,
    'visible_on_front'  => false,
    'unique'            => false,
    'apply_to'          => 'simple,configurable,bundle,grouped,virtual,downloadable',
    'is_configurable'   => false,
    'used_in_product_listing' => true,
));
 
$installer->endSetup();
?>
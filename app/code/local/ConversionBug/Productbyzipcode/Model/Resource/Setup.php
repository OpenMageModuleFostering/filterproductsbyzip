
<?php
class ConversionBug_Productbyzipcode_Model_Resource_Setup extends Mage_Core_Model_Resource_Setup
{
	public function getCatalogSetup()
	{
		return new Mage_Catalog_Model_Resource_Setup('cbproductbyzipcode_setup');
	}
 
	public function getCustomerSetup()
	{
		return new Mage_Customer_Model_Resource_Setup('cbproductbyzipcode_setup');
	}
}
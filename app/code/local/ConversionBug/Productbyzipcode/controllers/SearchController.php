<?php
class ConversionBug_Productbyzipcode_SearchController extends Mage_Core_Controller_Front_Action
{
    /**
      * New subscription action
      */
    public function indexAction()
    {
        $zipcode = trim($this->getRequest()->getPost('zipcode')); 
        if ($this->getRequest()->isPost() && $zipcode) {
            Mage::getSingleton('core/session')->setZipCode($zipcode); 
            Mage::getSingleton('core/session')->addSuccess($this->__("Your Zipcode: %s recorded successfully.",$zipcode));
        }
        $this->_redirectReferer();
    }
    public function productAction()
    {
        $this->loadLayout()->renderLayout();
    }
}

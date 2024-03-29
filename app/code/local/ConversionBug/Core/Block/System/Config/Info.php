<?php

class ConversionBug_Core_Block_System_Config_Info extends Mage_Adminhtml_Block_Abstract
    implements Varien_Data_Form_Element_Renderer_Interface
{

    /**
     * Render fieldset html
     *
     * @param Varien_Data_Form_Element_Abstract $element
     * @return string
     */
    public function render(Varien_Data_Form_Element_Abstract $element)
    {
        $adminUser = Mage::getSingleton('admin/session');
        $adminEmail = $adminUser->getUser()->getEmail();
        $url = Mage::getBaseUrl();
        $ip = $_SERVER['REMOTE_ADDR'];
        $modules = Mage::getConfig()->getNode('modules')->children();
        $modulesArray = (array)$modules;
        Mage::log($modulesArray,null,"modules.log");
        $options = array();
        foreach($modules as $key => $value):
            if (strpos($key, 'ConversionBug') !== FALSE):
                $options[] = $key;
            endif;
        endforeach;
        $string = implode(', ', $options);
        Mage::log($string,null,"string.log");

        $html = <<<HTML
            <div class="cb-intro">
                     <div class="content"> 
                      <div class="cb-pattern"></div>
                      <div class="cb-details">
                       <ul class="list-inline">
                        <li class="cb-web">                          
                            <a href="http://www.conversionbug.com/" target="_blank">www.conversionbug.com</a>
                         </li>
                         <li class="cb-mail">
                            <a href="mailto:support@conversionbug.com">support@conversionbug.com</a>
                         </li>
                         <li class="cb-skype">
                            <a href="#">conversionbug</a>
                         </li>
                        <ul>
                       </div> 
                     </div>                   
                  </div>
                  <script>
                   var email = "$adminEmail",
                       url = "$url",
                       ip = "$ip";                       
                       //extension = "M1-Filter Products By Zip-Code";
                       extension = "$string";                   
                      conversionbug.init(url,email,ip,extension);
                  </script>
HTML;

        return $html;
    }
}

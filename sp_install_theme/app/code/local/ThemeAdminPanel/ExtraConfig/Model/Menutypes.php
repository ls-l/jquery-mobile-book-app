<?php class ThemeAdminPanel_ExtraConfig_Model_Menutypes
{
    public function toOptionArray()
    {
        return array(
            array('value'=>1, 'label'=>Mage::helper('ExtraConfig')->__('Perfectum menu')),
            array('value'=>2, 'label'=>Mage::helper('ExtraConfig')->__('Multilevel dropdown menu'))            
        );
    }

}?>
<?php

class Dev_Profile_Block_Profile extends Mage_Core_Block_Template
{
    public function getUserId()
    {
        $productId = (int) $this->getRequest()->getParam('id');
        return $productId;
    }
}
<?php

class Dev_Post_Block_Post extends Mage_Core_Block_Template
{
    public function getFormActionUrl()
    {
        return $this->getUrl('*/index/new');
    }
}
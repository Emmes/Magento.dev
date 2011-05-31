<?php

class Dev_Post_Model_New extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('post/new');
    }

    public function addThread($title,$email,$text)
    {
        $date = new DateTime();
        $timestamp = $date->getTimestamp();
        $lastId = Mage::getSingleton('catalog/session')->getLastVisitedCategoryId();
        $product = new Mage_Catalog_Model_Product();
	    $product->setTypeId('virtual');
        $product->setVisibility(Mage_Catalog_Model_Product_Visibility::VISIBILITY_BOTH);
	    $product->setStatus(1);
	    $product->setSku(str_replace(" " , "_" , $title)."_".$timestamp);
	    $product->setUrlKey($title."-".$timestamp);
	    $product->setTaxClassId(5);
	    $product->setWebsiteIDs(array(1)); // your website ids
	    $product->setStoreIDs(array(1));  // your store ids
	    $product->setStockData(array(
	        'is_in_stock' => 1,
	        'qty' => 99999,
	        'manage_stock' => 0,
	    ));
    	$product->setAttributeSetId(4); // the product attribute set to use
    	$product->setName($title);
    	$product->setCategoryIds(array($lastId)); // array of categories it will relate to
    	$product->setDescription($text);
    	$product->setShortDescription('Short Description');
    	$product->setPrice(9.99);
    	try
    	{
    	    $product->save();
    	}
    	catch(Exception $e)
    	{
    	    echo $e->getMessage();
    	}
    }
}
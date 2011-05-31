<?php

class Dev_Post_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     * Action predispatch
     *
     * Check customer authentication for some actions
     */
//    public function preDispatch()
//    {
//        parent::preDispatch();
//        if (!Mage::getSingleton('customer/session')->authenticate($this)) {
//            $this->setFlag('', 'no-dispatch', true);
//        }
//    }

    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function newAction()
    {
        try
        {
            $title = (string) $this->getRequest()->getPost('title');
            $email = (string) $this->getRequest()->getPost('email');
            $text = (string) $this->getRequest()->getPost('text');
            $addThread = Mage::getModel('post/new');
            $addThread->addThread($title,$email,$text);
            Mage::app()->getFrontController()->getResponse()->setRedirect('http://magento.dev');
        }
        catch (Exception $e) {
                Mage::logException($e);
                $this->_getSession()->addError($e->getMessage());
        }
    }
}

<?php

class MailUp_MailUpSync_Adminhtml_Mailup_ViewdatatransferlogController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout()->renderLayout();
    }

    public function searchAction()
    {
        $this->loadLayout()->renderLayout();
    }

    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('newsletter/mailup/mailup_viewdatatransferlog');
    }
}
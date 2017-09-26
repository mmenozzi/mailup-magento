<?php

/**
 * MailUp
 *
 * @category    Mailup
 * @package     Mailup_Sync
 */
class MailUp_MailUpSync_Adminhtml_Mailup_FieldsMappingController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout()->renderLayout();
    }

    public function saveAction()
    {
        try {
            $post = $this->getRequest()->getPost();
            unset($post["form_key"]);

            $wsImport = new Mailup_MailUpWsImport();
            $wsImport->saveFieldMapping($post);
        } catch (Exception $e) {
            $errorMessage = $this->__('Error: unable to save current filter');
            Mage::getSingleton('adminhtml/session')->addError($errorMessage);
        }

        $observer = Mage::getModel("mailup/observer");
        $observer->configCheck();

        $this->_redirect('*/*');
    }

    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('newsletter/mailup/mailup_fieldsmapping');
    }
}
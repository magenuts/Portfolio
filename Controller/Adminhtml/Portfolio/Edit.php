<?php
/**
 *
 * Copyright © 2019 Magenuts Pvt Ltd. All rights reserved.
 
 */
namespace Magenuts\Portfolio\Controller\Adminhtml\Portfolio;

class Edit extends \Magenuts\Portfolio\Controller\Adminhtml\Portfolio
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Registry $coreRegistry)
    {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
    }

    /**
     * Edit sitemap
     *
     * @return void
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('id');
        $model = $this->_objectManager->create('Magenuts\Portfolio\Model\Portfolio');

        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This item no longer exists.'));
                $this->_redirect('adminhtml/*/');
                return;
            }
        }

        // 3. Set entered data if was error when we do save
        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        // 4. Register model to use later in blocks
        $this->_coreRegistry->register('portfolio_portfolio', $model);

        // 5. Build edit form
        $this->_initAction()->_addBreadcrumb(
            $id ? __('Edit %1', $model->getName()) : __('New Item'),
            $id ? __('Edit %1', $model->getName()) : __('New Item')
        )->_addContent(
            $this->_view->getLayout()->createBlock('Magenuts\Portfolio\Block\Adminhtml\Edit')
        );
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Portfolio'));
        $this->_view->getPage()->getConfig()->getTitle()->prepend(
            $model->getId() ? $model->getName() : __('New Item')
        );
        $this->_view->renderLayout();
    }
}

<?php
/**
 * Copyright © 2019 Magenuts Pvt Ltd. All rights reserved.
 
 */
namespace Magenuts\Portfolio\Block\Adminhtml;

/**
 * Sitemap edit form container
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Editcategory extends \Magento\Backend\Block\Widget\Form\Container
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * Init container
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_objectId = 'id';
        $this->_controller = 'adminhtml';
        $this->_blockGroup = 'Magenuts_Portfolio';

        parent::_construct();

		if ($this->_isAllowedAction('Magenuts_Portfolio::save')) {
			$this->buttonList->add(
				'saveandcontinue',
				[
					'label' => __('Save and Continue Edit'),
					'class' => 'save',
					'data_attribute' => [
						'mage-init' => ['button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form']],
					]
				],
				-100
			);
		}

		if ($this->_isAllowedAction('Magenuts_Portfolio::delete')) {
            $this->buttonList->update('delete', 'label', __('Delete'));
        } else {
            $this->buttonList->remove('delete');
        }
    }

    /**
     * Get edit form container header text
     *
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('portfolio_portfolio')->getId()) {
            return __('Edit %1', $this->_coreRegistry->registry('portfolio_portfolio')->getCategoryName());
        } else {
            return __('New Category');
        }
    }
	
	/**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
	
	/**
     * @return string
     */
    public function getDeleteUrl()
    {
        return $this->getUrl('*/*/deletecategory', [$this->_objectId => $this->getRequest()->getParam($this->_objectId)]);
    }
	
	public function getBackUrl()
    {
        return $this->getUrl('*/*/category');
    }
}

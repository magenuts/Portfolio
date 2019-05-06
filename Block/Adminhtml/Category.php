<?php
/**
 * Copyright © 2019 Magenuts Pvt Ltd. All rights reserved.
 
 */
namespace Magenuts\Portfolio\Block\Adminhtml;

class Category extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Block constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_portfolio';
        $this->_blockGroup = 'Magenuts_Portfolio';
        $this->_headerText = __('Portfolio Categories');
        $this->_addButtonLabel = __('Add Category');
        parent::_construct();
    }
	
	/**
     * @return string
     */
    public function getCreateUrl()
    {
        return $this->getUrl('*/*/newcategory');
    }
}

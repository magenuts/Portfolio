<?php
/**
 * Copyright © 2019 Magenuts Pvt Ltd. All rights reserved.
 
 */
namespace Magenuts\Portfolio\Block\Adminhtml;

class Portfolio extends \Magento\Backend\Block\Widget\Grid\Container
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
        $this->_headerText = __('Portfolio');
        $this->_addButtonLabel = __('Add Item');
        parent::_construct();
    }

}

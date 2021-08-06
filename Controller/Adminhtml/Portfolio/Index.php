<?php
/**
 *
 * * @copyright Copyright (c) 2017-2021 Magenuts IT Solutions Pvt Ltd. All rights reserved.
 
 */
namespace Magenuts\Portfolio\Controller\Adminhtml\Portfolio;

use Magento\Backend\App\Action;

class Index extends \Magenuts\Portfolio\Controller\Adminhtml\Portfolio
{
    /**
     * Index action
     *
     * @return void
     */
    public function execute()
    {
        $this->_initAction();
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Portfolio'));
        $this->_view->renderLayout();
    }
}

<?php
/**
 *
 * Copyright © 2019 Magenuts Pvt Ltd. All rights reserved.
 
 */
 
namespace Magenuts\Portfolio\Controller\Category;

class View extends \Magento\Framework\App\Action\Action
{
    
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}

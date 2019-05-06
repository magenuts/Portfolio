<?php
/**
 * Copyright © 2019 Magenuts Pvt Ltd. All rights reserved.
 
 */
namespace Magenuts\Portfolio\Controller\Adminhtml\Portfolio;

class Newcategory extends \Magenuts\Portfolio\Controller\Adminhtml\Portfolio
{
    /**
     * Create new customer action
     *
     * @return \Magento\Backend\Model\View\Result\Forward
     */
    public function execute()
    {
        // the same form is used to create and edit
        $this->_forward('editcategory');
    }
}

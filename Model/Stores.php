<?php
/**
 * * @copyright Copyright (c) 2017-2021 Magenuts IT Solutions Pvt Ltd. All rights reserved.
 
 */

// @codingStandardsIgnoreFile

namespace Magenuts\Portfolio\Model;

class Stores extends \Magento\Framework\Model\AbstractModel
{
   
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Magenuts\Portfolio\Model\ResourceModel\Stores');
    }
}

<?php
/**
 * Copyright © 2019 Magenuts Pvt Ltd. All rights reserved.
 
 */
namespace Magenuts\Portfolio\Model\ResourceModel\Portfolio;

/**
 * Portfolio resource model collection
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Init resource collection
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Magenuts\Portfolio\Model\Portfolio', 'Magenuts\Portfolio\Model\ResourceModel\Portfolio');
    }
}

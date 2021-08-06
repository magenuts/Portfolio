<?php
/**
 * * @copyright Copyright (c) 2017-2021 Magenuts IT Solutions Pvt Ltd. All rights reserved.
 
 */
namespace Magenuts\Portfolio\Model\ResourceModel;

class Category extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize connection and table
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('magenuts_portfolio_category', 'category_id');
    }
	
	/**
     * Process block data before deleting
     *
     * @param \Magento\Framework\Model\AbstractModel $object
     */
    protected function _beforeDelete(\Magento\Framework\Model\AbstractModel $object)
    {
        $condition = ['category_id = ?' => (int)$object->getId()];

        $this->getConnection()->delete($this->getTable('magenuts_portfolio_category_items'), $condition);

        return parent::_beforeDelete($object);
    }
}

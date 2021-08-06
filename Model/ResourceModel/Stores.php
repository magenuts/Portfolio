<?php
/**
 * * @copyright Copyright (c) 2017-2021 Magenuts IT Solutions Pvt Ltd. All rights reserved.
 
 */
namespace Magenuts\Portfolio\Model\ResourceModel;

class Stores extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize connection and table
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('magenuts_portfolio_category_items', 'entity_id');
    }
	
	public function joinFilter($collection){
		$tableName = $this->getTable('magenuts_portfolio_category');
		$collection->getSelect()->joinLeft(array('cat'=>$tableName), 'main_table.category_id = cat.category_id', array('cat.category_name as name'));
		return $collection;
	}
}

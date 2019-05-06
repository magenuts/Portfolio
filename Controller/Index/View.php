<?php
/**
 *
 * Copyright © 2019 Magenuts Pvt Ltd. All rights reserved.
 
 */
 
namespace Magenuts\Portfolio\Controller\Index;

class View extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager;
	
	/**
     * @var \Magento\Framework\View\Page\Config
     */
    protected $pageConfig;
	
	/**
     * Store manager
     *
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;
	
    /**
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(
		\Magento\Framework\App\Action\Context $context, 
		\Magento\Framework\ObjectManagerInterface $objectManager
	)
    {
		$this->_objectManager = $objectManager;
        parent::__construct($context);
    }
	
	public function getModel(){
		return $this->_objectManager->create('Magenuts\Portfolio\Model\Portfolio');
	}
	
    public function execute()
    {
		if($id = $this->getRequest()->getParam('id')){
			$portfolio = $this->getModel()->load($id);
			if($portfolio->getId() && $portfolio->getStatus()){
				$this->_view->loadLayout();
				$this->_view->renderLayout();
			}else{
				return $this->_redirect('');
			}
		}else{
			return $this->_redirect('');
		}
    }
}

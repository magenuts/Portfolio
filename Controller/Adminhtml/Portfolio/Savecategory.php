<?php
/**
 *
 * Copyright © 2019 Magenuts Pvt Ltd. All rights reserved.
 
 */
namespace Magenuts\Portfolio\Controller\Adminhtml\Portfolio;

class Savecategory extends \Magenuts\Portfolio\Controller\Adminhtml\Portfolio
{
    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if data sent
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('id');
            $model = $this->_objectManager->create('Magenuts\Portfolio\Model\Category')->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addError(__('This category no longer exists.'));
                return $resultRedirect->setPath('*/*/category');
            }

            // init model and set data

            $model->setData($data);
			
			$identifier = $data['identifier'];
			if($identifier!=''){
				$searchCat = $this->_objectManager->create('Magenuts\Portfolio\Model\Category')
					->getCollection()
					->addFieldToFilter('identifier', $identifier);
				
				if(isset($data['category_id']) && $data['category_id']!=''){
					$searchCat->addFieldToFilter('category_id', ['neq'=>$data['category_id']]);
				}
				
				$searchPortfolio = $this->_objectManager->create('Magenuts\Portfolio\Model\Portfolio')
					->getCollection()
					->addFieldToFilter('identifier', $identifier);
				
				
				if((count($searchCat)>0) || (count($searchPortfolio)>0)){
					$model->setIdentifier('');
					$this->messageManager->addNotice(__('Identifier name "%1" already exists.', $identifier));
				}
			}

            // try to save it
            try {
                // save the data
                $model->save();
                // display success message
                $this->messageManager->addSuccess(__('You saved the category.'));
                // clear previously saved data from session
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);

                // check if 'Save and Continue'
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/editcategory', ['id' => $model->getId()]);
                }
                // go to grid
                return $resultRedirect->setPath('*/*/category');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // save data in session
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
                // redirect to edit form
                return $resultRedirect->setPath('*/*/editcategory', ['id' => $this->getRequest()->getParam('id')]);
            }
        }
        return $resultRedirect->setPath('*/*/category');
    }
}

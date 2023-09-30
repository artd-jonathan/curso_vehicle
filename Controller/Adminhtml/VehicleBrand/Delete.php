<?php
namespace Curso\Vehicle\Controller\Adminhtml\VehicleBrand;

class Delete extends \Magento\Backend\App\Action
{
    /**
     * Index action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('brand_id');
        
        if ($id == null) {
            $id = $this->getRequest()->getParam('vehicle_brand_id');
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->_objectManager->create('Curso\Vehicle\Model\VehicleBrand');
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('The Vehicle Brand has been deleted.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['brand_id' => $id]);
            }
        }
        $this->messageManager->addError(__('We can\'t find a Vehicle Brand to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}

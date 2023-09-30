<?php
namespace Curso\Vehicle\Controller\Adminhtml\VehicleModel;

class Edit extends \Magento\Backend\App\Action
{
    const PAGE_TITLE = 'Vehicle Model';

    protected $_coreRegistry;
    protected $_resultPageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->_coreRegistry = $coreRegistry;
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    protected function _initAction()
    {
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__(static::PAGE_TITLE));

        return $resultPage;
    }
    /**
     * Index action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        
        $vehicleModelId = $this->getRequest()->getParam('vehicle_model_id');
        $model = $this->_objectManager->create(\Curso\Vehicle\Model\VehicleModel::class);
        
        if ($vehicleModelId) {
            $model->load($vehicleModelId);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This Vehicle Model no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('vehicle_model', $model);
        // print_r(json_encode($this->getRequest()));
        // die();
        $resultPage = $this->_initAction();
        
        $resultPage->addBreadcrumb(
            $vehicleModelId ? __('Edit Vehicle Model') : __('New Vehicle Model'),
            $vehicleModelId ? __('Edit Vehicle Model') : __('New Vehicle Model')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Vehicle Model'));
        $resultPage->getConfig()->getTitle()
            ->prepend($model->getId() ? $model->getName() : __('New Vehicle Model'));
        return $resultPage;
    
    }
}

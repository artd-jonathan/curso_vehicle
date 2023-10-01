<?php
namespace Curso\Vehicle\Controller\Adminhtml\VehicleVehicle;

class Edit extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Curso_Vehicle::vehiclevehicle';
    const PAGE_TITLE = 'Vehicle';

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
        $vehicleVehicleId = $this->getRequest()->getParam('vehicle_vehicle_id');
        $model = $this->_objectManager->create(\Curso\Vehicle\Model\VehicleVehicle::class);
        if ($vehicleVehicleId) {
            $model->load($vehicleVehicleId);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This Vehicle no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $this->_coreRegistry->register('vehicle_vehicle', $model);

        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $vehicleVehicleId ? __('Edit Vehicle') : __('New Vehicle'),
            $vehicleVehicleId ? __('Edit Vehicle') : __('New Vehicle')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Vehicle'));
        $resultPage->getConfig()->getTitle()
            ->prepend($model->getId() ? $model->getName() : __('New Vehicle'));

        return $resultPage;
    
    }
}

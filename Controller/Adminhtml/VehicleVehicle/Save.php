<?php
namespace Curso\Vehicle\Controller\Adminhtml\VehicleVehicle;

use Magento\Backend\App\Action;
use Vehicle\VehicleVehicle\Model\VehicleVehicle;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{
    protected $_dataPersistor;
    protected $_vehicleVehicleFactory;
    protected $_vehicleVehicleRepository;

    public function __construct(
        Action\Context $context,
        DataPersistorInterface $dataPersistor,
        \Curso\Vehicle\Model\VehicleVehicleFactory $vehicleVehicleFactory = null,
        \Curso\Vehicle\Api\VehicleVehicleRepositoryInterface $vehicleVehicleRepository = null
    )
    {
        $this->_dataPersistor = $dataPersistor;
        $this->_vehicleVehicleFactory = $vehicleVehicleFactory
            ?: \Magento\Framework\App\ObjectManager::getInstance()->get(\Curso\Vehicle\Model\VehicleVehicleFactory::class);
        $this->_vehicleVehicleRepository = $vehicleVehicleRepository
            ?: \Magento\Framework\App\ObjectManager::getInstance()->get(\Curso\Vehicle\Api\VehicleVehicleRepositoryInterface::class);
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            if (empty($data['vehicle_vehicle_id'])) {
                $data['vehicle_vehicle_id'] = null;
            }

            $model = $this->_vehicleVehicleFactory->create();

            $id = $this->getRequest()->getParam('vehicle_vehicle_id');
            if ($id) {
                try {
                    $model = $this->_vehicleVehicleRepository->getById($id);
                } catch (LocalizedException $e) {
                    $this->messageManager->addErrorMessage(__('This vehicle no longer exists.'));
                    return $resultRedirect->setPath('*/*/');
                }
            }

            $model->setData($data);

            $this->_eventManager->dispatch(
                'vehicle_vehiclevehicle_prepare_save',
                ['vehiclevehicle' => $model, 'request' => $this->getRequest()]
            );

            try {
                $this->_vehicleVehicleRepository->save($model);
                $this->messageManager->addSuccessMessage(__('You saved the vehicle.'));
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['vehicle_vehicle_id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addExceptionMessage($e->getPrevious() ?:$e);
            } catch (\Exception $e) {
                print_r($e->getMessage());
                die();
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the vehicle.'));
            }

            return $resultRedirect->setPath('*/*/edit', ['vehicle_vehicle_id' => $this->getRequest()->getParam('vehicle_vehicle_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }


    
}

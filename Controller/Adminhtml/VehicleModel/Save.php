<?php
namespace Curso\Vehicle\Controller\Adminhtml\VehicleModel;

use Magento\Backend\App\Action;
use Vehicle\VehicleModel\Model\VehicleModel;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{
    protected $_dataPersistor;
    protected $_vehicleModelFactory;
    protected $_vehicleModelRepository;

    public function __construct(
        Action\Context $context,
        DataPersistorInterface $dataPersistor,
        \Curso\Vehicle\Model\VehicleModelFactory $vehicleModelFactory = null,
        \Curso\Vehicle\Api\VehicleModelRepositoryInterface $vehicleModelRepository = null
    )
    {
        $this->_dataPersistor = $dataPersistor;
        $this->_vehicleModelFactory = $vehicleModelFactory
            ?: \Magento\Framework\App\ObjectManager::getInstance()->get(\Curso\Vehicle\Model\VehicleModelFactory::class);
        $this->_vehicleModelRepository = $vehicleModelRepository
            ?: \Magento\Framework\App\ObjectManager::getInstance()->get(\Curso\Vehicle\Api\VehicleModelRepositoryInterface::class);
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            if (empty($data['vehicle_model_id'])) {
                $data['vehicle_model_id'] = null;
            }

            $model = $this->_vehicleModelFactory->create();

            $id = $this->getRequest()->getParam('vehicle_model_id');
            if ($id) {
                try {
                    $model = $this->_vehicleModelRepository->getById($id);
                } catch (LocalizedException $e) {
                    $this->messageManager->addErrorMessage(__('This model no longer exists.'));
                    return $resultRedirect->setPath('*/*/');
                }
            }

            $model->setData($data);

            $this->_eventManager->dispatch(
                'vehicle_vehiclemodel_prepare_save',
                ['vehiclemodel' => $model, 'request' => $this->getRequest()]
            );

            try {
                $this->_vehicleModelRepository->save($model);
                $this->messageManager->addSuccessMessage(__('You saved the model.'));
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['vehicle_model_id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addExceptionMessage($e->getPrevious() ?:$e);
            } catch (\Exception $e) {
                print_r($e->getMessage());
                die();
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the model.'));
            }

            return $resultRedirect->setPath('*/*/edit', ['vehicle_model_id' => $this->getRequest()->getParam('vehicle_model_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }


    
}

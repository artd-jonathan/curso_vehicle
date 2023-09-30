<?php
namespace Curso\Vehicle\Controller\Adminhtml\VehicleBrand;

use Magento\Backend\App\Action;
use Vehicle\VehicleBrand\Model\VehicleBrand;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{
    protected $_dataPersistor;
    protected $_vehicleBrandFactory;
    protected $_vehicleBrandRepository;

    public function __construct(
        Action\Context $context,
        DataPersistorInterface $dataPersistor,
        \Curso\Vehicle\Model\VehicleBrandFactory $vehicleBrandFactory = null,
        \Curso\Vehicle\Api\VehicleBrandRepositoryInterface $vehicleBrandRepository = null
    )
    {
        $this->_dataPersistor = $dataPersistor;
        $this->_vehicleBrandFactory = $vehicleBrandFactory
            ?: \Magento\Framework\App\ObjectManager::getInstance()->get(\Curso\Vehicle\Model\VehicleBrandFactory::class);
        $this->_vehicleBrandRepository = $vehicleBrandRepository
            ?: \Magento\Framework\App\ObjectManager::getInstance()->get(\Curso\Vehicle\Api\VehicleBrandRepositoryInterface::class);
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            if (empty($data['vehicle_brand_id'])) {
                $data['vehicle_brand_id'] = null;
            }

            $model = $this->_vehicleBrandFactory->create();

            $id = $this->getRequest()->getParam('vehicle_brand_id');
            if ($id) {
                try {
                    $model = $this->_vehicleBrandRepository->getById($id);
                } catch (LocalizedException $e) {
                    $this->messageManager->addErrorMessage(__('This brand no longer exists.'));
                    return $resultRedirect->setPath('*/*/');
                }
            }

            $model->setData($data);

            $this->_eventManager->dispatch(
                'vehicle_vehiclebrand_prepare_save',
                ['vehiclebrand' => $model, 'request' => $this->getRequest()]
            );

            try {
                $this->_vehicleBrandRepository->save($model);
                $this->messageManager->addSuccessMessage(__('You saved the brand.'));
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['vehicle_brand_id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addExceptionMessage($e->getPrevious() ?:$e);
            } catch (\Exception $e) {
                print_r($e->getMessage());
                die();
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the brand.'));
            }

            return $resultRedirect->setPath('*/*/edit', ['vehicle_brand_id' => $this->getRequest()->getParam('vehicle_brand_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }


    
}

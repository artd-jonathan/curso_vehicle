<?php
namespace Curso\Vehicle\Block\Adminhtml\VehicleModel\Edit;

use Magento\Backend\Block\Widget\Context;
use Curso\Vehicle\Api\VehicleModelRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class GenericButton
{
    protected $context;
    protected $vehicleModelRepository;
    
    public function __construct(
        Context $context,
        VehicleModelRepositoryInterface $vehicleModelRepository
    ) {
        $this->context = $context;
        $this->vehicleModelRepository = $vehicleModelRepository;
    }

    public function getVehicleModelId()
    {
        try {
            return $this->vehicleModelRepository->getById(
                $this->context->getRequest()->getParam('vehicle_model_id')
            )->getId();
        }
		catch (NoSuchEntityException $e) {
        
		}
        return null;
    }

    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
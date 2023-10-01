<?php
namespace Curso\Vehicle\Block\Adminhtml\VehicleModel\Edit;

use Magento\Backend\Block\Widget\Context;
use Curso\Vehicle\Api\VehicleModelRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class GenericButton
{
    protected $context;
    protected $VehicleModelRepository;
    
    public function __construct(
        Context $context,
        VehicleModelRepositoryInterface $VehicleModelRepository
    ) {
        $this->context = $context;
        $this->VehicleModelRepository = $VehicleModelRepository;
    }

    public function getVehicleModelId()
    {
        try {
            return $this->VehicleModelRepository->getById(
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
<?php
namespace Curso\Vehicle\Block\Frontend;

class Vehicle extends \Magento\Framework\View\Element\Template
{
    protected $vehicleVehicleFactory;
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Curso\Vehicle\Model\VehicleVehicleFactory $vehicleVehicleFactory,
        array $data = []
    ) {
        $this->vehicleVehicleFactory = $vehicleVehicleFactory;
        parent::__construct($context, $data);
    }
    public function getVehicleCollection()
    {
        $vehicles = $this->vehicleVehicleFactory->create();
        $vehicleCollection = $vehicles->getCollection();
        return $vehicleCollection;
    }
}

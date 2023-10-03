<?php
namespace Curso\Vehicle\Block\Frontend;

class Brand extends \Magento\Framework\View\Element\Template
{
    protected $vehicleBrandFactory;
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Curso\Vehicle\Model\VehicleBrandFactory $vehicleBrandFactory,
        array $data = []
    ) {
        $this->vehicleBrandFactory = $vehicleBrandFactory;
        parent::__construct($context, $data);
    }
    public function getVehicleBrandCollection()
    {
        $vehicles = $this->vehicleBrandFactory->create();
        $vehicleCollection = $vehicles->getCollection();
        return $vehicleCollection;
    }
}

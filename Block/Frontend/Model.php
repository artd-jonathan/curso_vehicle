<?php
namespace Curso\Vehicle\Block\Frontend;

class Model extends \Magento\Framework\View\Element\Template
{
    protected $vehicleModelFactory;
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Curso\Vehicle\Model\VehicleModelFactory $vehicleModelFactory,
        array $data = []
    ) {
        $this->vehicleModelFactory = $vehicleModelFactory;
        parent::__construct($context, $data);
    }
    public function getvehicleModelCollection()
    {
        $vehicles = $this->vehicleModelFactory->create();
        $vehicleCollection = $vehicles->getCollection();
        return $vehicleCollection;
    }
}

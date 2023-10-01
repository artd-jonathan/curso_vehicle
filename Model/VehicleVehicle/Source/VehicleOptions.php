<?php
namespace Curso\Vehicle\Model\VehicleVehicle\Source;
use Magento\Framework\Data\OptionSourceInterface;
use Curso\Vehicle\Model\VehicleVehicleFactory as CollectionFactory;

class VehicleOptions implements OptionSourceInterface
{
    protected $_vehicleVehicleFactory;

    public function __construct(\Curso\Vehicle\Model\VehicleVehicleFactory $vehicleBrandFactory)
    {
        $this->_vehicleVehicleFactory = $vehicleBrandFactory;
    }

    public function toOptionArray()
    {
        $options = [];
        $options[] = [
            'value' => '0',
            'label' => __('-- Please Select a Vehicle --'),
        ];
        $collection = $this->_vehicleVehicleFactory->create()
            ->getCollection()
            ->addFieldToSelect('*');

        foreach ($collection as $item) {
            $options[] = [
                'value' => $item['vehicle_vehicle_id'],
                'label' => $item['vehicle'],
            ];
        }
        return $options;
    }
}

<?php
namespace Curso\Vehicle\Model\VehicleModel\Source;
use Magento\Framework\Data\OptionSourceInterface;
use Curso\Vehicle\Model\VehicleModelFactory as CollectionFactory;

class ModelOptions implements OptionSourceInterface
{
    protected $_vehicleModelFactory;

    public function __construct(\Curso\Vehicle\Model\VehicleModelFactory $vehicleModelFactory)
    {
        $this->_vehicleModelFactory = $vehicleModelFactory;
    }

    public function toOptionArray()
    {
        $options = [];
        $options[] = [
            'value' => '0',
            'label' => __('-- Please Select a Vehicle Model --'),
        ];
        $collection = $this->_vehicleModelFactory->create()
            ->getCollection()
            ->addFieldToSelect('*');

        foreach ($collection as $item) {
            $options[] = [
                'value' => $item['vehicle_model_id'],
                'label' => $item['model'],
            ];
        }
        return $options;
    }
}

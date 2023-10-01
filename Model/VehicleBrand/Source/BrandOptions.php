<?php
namespace Curso\Vehicle\Model\VehicleBrand\Source;
use Magento\Framework\Data\OptionSourceInterface;
use Curso\Vehicle\Model\VehicleBrandFactory as CollectionFactory;

class BrandOptions implements OptionSourceInterface
{
    protected $_vehicleBrandFactory;

    public function __construct(\Curso\Vehicle\Model\VehicleBrandFactory $vehicleBrandFactory)
    {
        $this->_vehicleBrandFactory = $vehicleBrandFactory;
    }

    public function toOptionArray()
    {
        $options = [];
        $options[] = [
            'value' => '0',
            'label' => __('-- Please Select a Brand --'),
        ];
        $collection = $this->_vehicleBrandFactory->create()
            ->getCollection()
            ->addFieldToSelect('*');

        foreach ($collection as $item) {
            $options[] = [
                'value' => $item['vehicle_brand_id'],
                'label' => $item['brand'],
            ];
        }
        return $options;
    }
}

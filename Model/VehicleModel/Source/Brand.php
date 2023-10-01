<?php
namespace Curso\Vehicle\Model\VehicleModel\Source;
use Magento\Framework\Data\OptionSourceInterface;

class Model implements OptionSourceInterface
{

    protected $vehicleModelFactory;

    /**
     * @param EavConfig $eavConfig
     */
    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $collectionFactory,
        \Curso\Vehicle\Model\VehicleModelFactory $vehicleModelFactory
    ) {
        $this->vehicleModelFactory = $vehicleModelFactory;
    }

    public function toOptionArray()
    {
        $optionArray = [];
        $arr = $this->vehicleModelFactory->create()->addAttributeToSelect('*');
        
        foreach ($arr as $value => $label) {
                $optionArray[] = [
                    'value' => $label->getId(),
                    'label' => $label->getModel(),
                ];
        }
        return $optionArray;
    }
}
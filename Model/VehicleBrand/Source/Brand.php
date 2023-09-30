<?php
namespace Curso\Vehicle\Model\VehicleBrand\Source;
use Magento\Framework\Data\OptionSourceInterface;

class Brand implements OptionSourceInterface
{

    protected $vehicleBrandFactory;

    /**
     * @param EavConfig $eavConfig
     */
    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $collectionFactory,
        \Curso\Vehicle\Model\VehicleBrandFactory $vehicleBrandFactory
    ) {
        $this->vehicleBrandFactory = $vehicleBrandFactory;
    }

    public function toOptionArray()
    {
        $optionArray = [];
        $arr = $this->vehicleBrandFactory->create()->addAttributeToSelect('*');
        
        foreach ($arr as $value => $label) {
                $optionArray[] = [
                    'value' => $label->getId(),
                    'label' => $label->getBrand(),
                ];
        }
        return $optionArray;
    }
}
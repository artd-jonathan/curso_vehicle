<?php
namespace Curso\Vehicle\Model;

use Curso\Vehicle\Api\Data;
use Curso\Vehicle\Api\VehicleModelRepositoryInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Curso\Vehicle\Model\ResourceModel\VehicleModel as ResourceVehicleModel;
use Curso\Vehicle\Model\ResourceModel\VehicleModel\CollectionFactory as VehicleModelCollectionFactory;
use Magento\Store\Model\StoreManagerInterface;

class VehicleModelRepository implements VehicleModelRepositoryInterface
{
    protected $resource;
    protected $vehicleBrandFactory;
    protected $dataObjectHelper;
    protected $dataObjectProcessor;
    protected $dataVehicleModelFactory;
    private $storeManager;

    public function __construct(
        ResourceVehicleModel $resource,
        VehicleModelFactory $vehicleBrandFactory,
        Data\VehicleModelInterfaceFactory $dataVehicleModelFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager
    ) {
        $this->resource = $resource;
        $this->vehicleBrandFactory = $vehicleBrandFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataVehicleModelFactory = $dataVehicleModelFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
    }
    public function save(\Curso\Vehicle\Api\Data\VehicleModelInterface $vehicleBrand)
    {
        if ($vehicleBrand->getStoreId() === null) {
            $storeId = $this->storeManager->getStore()->getId();
            $vehicleBrand->setStoreId($storeId);
        }
        try {
            $this->resource->save($vehicleBrand);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the vehicle Model: %1',
                $exception->getMessage()
            ));
        }
        return $vehicleBrand;
    }
    public function getById($vehicleBrandId)
    {
        $vehicleBrand = $this->vehicleBrandFactory->create();
        $vehicleBrand->load($vehicleBrandId);
        if (!$vehicleBrand->getId()) {
            throw new NoSuchEntityException(__('Vehicle Model with id "%1" does not exist.', $vehicleBrandId));
        }
        return $vehicleBrand;
    }
    public function delete(\Curso\Vehicle\Api\Data\VehicleModelInterface $vehicleBrand)
    {
        try {
            $this->resource()->delete($vehicleBrand);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Vehicle Model: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }
    public function deleteById($vehicleBrandId)
    {
        return $this->delete($this->getById($vehicleBrandId));
    }

}

<?php
namespace Curso\Vehicle\Model;

use Curso\Vehicle\Api\Data;
use Curso\Vehicle\Api\VehicleBrandRepositoryInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Curso\Vehicle\Model\ResourceModel\VehicleBrand as ResourceVehicleBrand;
use Curso\Vehicle\Model\ResourceModel\VehicleBrand\CollectionFactory as VehicleBrandCollectionFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Api\SearchCriteriaInterface;


class VehicleBrandRepository implements VehicleBrandRepositoryInterface
{
    protected $resource;
    protected $vehicleBrandFactory;
    protected $dataObjectHelper;
    protected $dataObjectProcessor;
    protected $dataVehicleBrandFactory;
    private $storeManager;

    public function __construct(
        ResourceVehicleBrand $resource,
        VehicleBrandFactory $vehicleBrandFactory,
        Data\VehicleBrandInterfaceFactory $dataVehicleBrandFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager
    ) {
        $this->resource = $resource;
        $this->vehicleBrandFactory = $vehicleBrandFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataVehicleBrandFactory = $dataVehicleBrandFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
    }
    /**
     * Save VehicleBrand data
     *
     * @param \Curso\Vehicle\Api\Data\VehicleBrandInterface $vehicleBrand
     * @return VehicleBrand
     * @throws CouldNotSaveException
     */
    public function save(\Curso\Vehicle\Api\Data\VehicleBrandInterface $vehicleBrand)
    {
        if ($vehicleBrand->getStoreId() === null) {
            $storeId = $this->storeManager->getStore()->getId();
            $vehicleBrand->setStoreId($storeId);
        }
        try {
            $this->resource->save($vehicleBrand);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the vehicleBrand: %1',
                $exception->getMessage()
            ));
        }
        return $vehicleBrand;
    }
    /**
     * Load VehicleBrand data by given VehicleBrand Identity
     *
     * @param string $vehicleBrandId
     * @return VehicleBrand
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($vehicleBrandId)
    {
        $vehicleBrand = $this->vehicleBrandFactory->create();
        $vehicleBrand->load($vehicleBrandId);
        if (!$vehicleBrand->getId()) {
            throw new NoSuchEntityException(__('VehicleBrand with id "%1" does not exist.', $vehicleBrandId));
        }
        return $vehicleBrand;
    }
    /**
     * Delete VehicleBrand
     *
     * @param \Curso\Vehicle\Api\Data\VehicleBrandInterface $vehicleBrand
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(\Curso\Vehicle\Api\Data\VehicleBrandInterface $vehicleBrand)
    {
        try {
            $this->resource()->delete($vehicleBrand);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the VehicleBrand: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }
    /**
     * Delete VehicleBrand by given VehicleBrand Identity
     *
     * @param string $vehicleBrandId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($vehicleBrandId)
    {
        return $this->delete($this->getById($vehicleBrandId));
    }

    public function getList(SearchCriteriaInterface $criteria)
    {

        $orderCollection = $this->_orderCollectionFactory->create();
        $orderCollection->getSelect()->join(
            ['customer_table' => $orderCollection->getTable('customer_entity')],
            'main_table.customer_id = customer_table.entity_id',
            ['customer_name' => 'customer_table.firstname']
        );


    }
}

<?php
namespace Curso\Vehicle\Controller\Index;


class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Curso\Vehicle\Model\VehicleVehicleFactory $vehicleVehicleFactory
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->vehicleVehicleFactory = $vehicleVehicleFactory;
		$vehicles = $this->vehicleVehicleFactory->create();
		$vehicleCollection = $vehicles->getCollection();
		return parent::__construct($context);
	}

	public function execute()
	{
		$model = $this->_objectManager->create('Magento\Framework\App\ResourceConnection');
		$connection = $resource->getConnection();

		$tableName = $resource->getTableName('vehicle_vehicle');
		$select = $connection->select()->from(
			['main_table' => $tableName]
		);


		echo '<pre>';print_r($select);
        die();
        // return $this->_pageFactory->create();
	}
}
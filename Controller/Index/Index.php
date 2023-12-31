<?php
namespace Curso\Vehicle\Controller\Index;


class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Curso\Vehicle\Logger\Logger $logger
	)
	{
		$this->logger = $logger;
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		// try {
		// 	$resource = $this->_objectManager->create('Magento\Framework\App\ResourceConnection');
		// 	$connection = $resource->getConnection();

		// 	$tableName = $resource->getTableName('vehicle_vehicle');
			
		// 	$select = $connection->select()
		// 		->from(
		// 			['vehicle_vehicle' => $tableName],
		// 			["secondTable.model", "count(vehicle_vehicle.vehicle_model_id) as total", "sum(secondTable.vehicle_model_id)"]
		// 		)
		// 		->joinLeft(
		// 			['secondTable' => $resource->getTableName('vehicle_model')],
		// 			'vehicle_vehicle.vehicle_model_id = secondTable.vehicle_model_id',
		// 			['model']
		// 		)
		// 		->group('secondTable.model');

		// 	$result = $connection->fetchAll($select);
		// 	echo '<pre>';print_r($result);
		// } catch (Exception $e) {
		// 	print_r($e->getMessage());
		// }
		$this->logger->info("Frontend Controller Index/Index was called");
        return $this->_pageFactory->create();
	}
}
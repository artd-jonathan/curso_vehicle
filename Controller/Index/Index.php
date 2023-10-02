<?php
namespace Curso\Vehicle\Controller\Index;


class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		try {
			$resource = $this->_objectManager->create('Magento\Framework\App\ResourceConnection');
			$connection = $resource->getConnection();

			$tableName = $resource->getTableName('vehicle_vehicle');
			$select = $connection->select()
				->from(['vehicle_vehicle' => $tableName])
				->columns(['*']);

			$result = $connection->fetchAll($select);
			echo '<pre>';print_r($result);
		} catch (Exception $e) {
			print_r($e->getMessage());
		}
		
        // return $this->_pageFactory->create();
	}
}
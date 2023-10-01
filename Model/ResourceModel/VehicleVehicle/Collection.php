<?php
namespace Curso\Vehicle\Model\ResourceModel\VehicleVehicle;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'vehicle_vehicle_id';
	protected $_eventPrefix = 'vehiclevehicle_vehiclevehicle_collection';
    protected $_eventObject = 'vehiclevehicle_collection';

	/**
     * Define model & resource model
     */
	protected function _construct()
	{
		$this->_init(
			'Curso\Vehicle\Model\VehicleVehicle', 
			'Curso\Vehicle\Model\ResourceModel\VehicleVehicle'
		);
	}
	protected function _initSelect()
	{
		//Create a join between the vehicle_vehicle table, the vehicle_model and the vehicle_brand tables
		parent::_initSelect();
		$this->getSelect()->joinLeft(
			['secondTable' => $this->getTable('vehicle_model')],
			'main_table.vehicle_model_id = secondTable.vehicle_model_id',
			['model']
		)->joinLeft(
			['thirdTable' => $this->getTable('vehicle_brand')],
			'secondTable.vehicle_brand_id = thirdTable.vehicle_brand_id',
			['brand']
		)->columns('plate');
	}
}
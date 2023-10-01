<?php
namespace Curso\Vehicle\Model\ResourceModel\VehicleModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'vehicle_model_id';
	protected $_eventPrefix = 'vehiclemodel_vehiclemodel_collection';
    protected $_eventObject = 'vehiclemodel_collection';

	/**
     * Define model & resource model
     */
	protected function _construct()
	{
		$this->_init(
			'Curso\Vehicle\Model\VehicleModel', 
			'Curso\Vehicle\Model\ResourceModel\VehicleModel'
		);
	}
	protected function _initSelect()
	{
		parent::_initSelect();
		$this->getSelect()->joinLeft(
			['secondTable' => $this->getTable('vehicle_brand')],
			'main_table.vehicle_brand_id = secondTable.vehicle_brand_id',
			['brand']
		)->columns('model');
		return $this;
	}
}
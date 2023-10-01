<?php
namespace Curso\Vehicle\Api\Data;

interface VehicleVehicleInterface
{
    
    public const VEHICLE_VEHICLE_ID = 'vehicle_vehicle_id';
    public const PLATE = 'plate';
    public const VEHICLE_MODEL_ID = 'vehicle_model_id';
    
    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();
    /*
    Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get plate
     *
     * @return string|null
     */
    public function getPlate();
    /**
     * Set plate
     *
     * @param string $plate
     * @return $this
     */
    public function setPlate($plate);

    /**
     * Get vehicle model id
     *
     * @return int|null
     */
    public function getVehicleModelId();
    /**
     * Set vehicle model id
     *
     * @param int $vehicleModelId
     * @return $this
     */
    public function setVehicleModelId($vehicleModelId);
}

<?php
namespace Curso\Vehicle\Api\Data;

interface VehicleModelInterface
{
    const VEHICLE_MODEL_ID = 'vehicle_model_id';
    const BRAND_ID = 'vehicle_brand_id';
    const MODEL = 'model';

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
     * Get brand id
     *
     * @return int|null
     */
    public function getBrandId();
    /**
     * Set brand id
     *
     * @param int $brandId
     * @return $this
     */
    public function setBrandId($brandId);

    /**
     * Get model
     *
     * @return string|null
     */
    public function getModel();
    /**
     * Set model
     *
     * @param string $model
     * @return $this
     */
    public function setModel($model);

}

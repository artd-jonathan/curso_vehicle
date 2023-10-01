<?php
namespace Curso\Vehicle\Api\Data;

interface VehicleBrandInterface
{
    const VEHICLE_BRAND_ID = 'vehicle_brand_id';
    const BRAND = 'brand';
    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();
    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);
    
    /**
     * Get brand
     *
     * @return string|null
     */
    public function getBrand();
    /**
     * Set brand
     *
     * @param string $brand
     * @return $this
     */
    public function setBrand($brand);
}

<?php
namespace Curso\Vehicle\Api;

interface VehicleBrandRepositoryInterface
{
    /**
     * Function to save a brand
     * 
     * @param VehicleBrandInterface $brand
     * @return Curso\Vehicle\Api\Data\VehicleBrandInterface
     */
    public function save(\Curso\Vehicle\Api\Data\VehicleBrandInterface $brand);
    /**
     * Function to get a brand by id
     *
     * @param int $id
     * @return Curso\Vehicle\Api\Data\VehicleBrandInterface
     */
    public function getById($id);
    /**
     * Function to delete a brand
     *
     * @param \Curso\Vehicle\Api\Data\VehicleBrandInterface $brand
     * @return bool
     */
    public function delete(\Curso\Vehicle\Api\Data\VehicleBrandInterface $brand);
    /**
     * Function to delete a brand by id
     *
     * @param int $id
     * @return bool
     */
    public function deleteById($id);
    
}

<?php
namespace Curso\Vehicle\Api;

interface VehicleVehicleRepositoryInterface
{
    /**
     * Function to save a vehicle
     * 
     * @param VehicleVehicleInterface $vehicle
     * @return Curso\Vehicle\Api\Data\VehicleVehicleInterface
     */
    public function save(\Curso\Vehicle\Api\Data\VehicleVehicleInterface $vehicle);
    /**
     * Function to get a vehicle by id
     *
     * @param int $id
     * @return Curso\Vehicle\Api\Data\VehicleVehicleInterface
     */
    public function getById($id);
    /**
     * Function to delete a vehicle
     *
     * @param \Curso\Vehicle\Api\Data\VehicleVehicleInterface $vehicle
     * @return bool
     */
    public function delete(\Curso\Vehicle\Api\Data\VehicleVehicleInterface $vehicle);
    /**
     * Function to delete a vehicle by id
     *
     * @param int $id
     * @return bool
     */
    public function deleteById($id);
}

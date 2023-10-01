<?php
namespace Curso\Vehicle\Api;

interface VehicleModelRepositoryInterface
{
    /**
     * Function to save a model
     * 
     * @param VehicleModelInterface $model
     * @return Curso\Vehicle\Api\Data\VehicleModelInterface
     */
    public function save(\Curso\Vehicle\Api\Data\VehicleModelInterface $model);
    /**
     * Function to get a model by id
     *
     * @param int $id
     * @return Curso\Vehicle\Api\Data\VehicleModelInterface
     */
    public function getById($id);
    /**
     * Function to delete a model
     *
     * @param \Curso\Vehicle\Api\Data\VehicleModelInterface $model
     * @return bool
     */
    public function delete(\Curso\Vehicle\Api\Data\VehicleModelInterface $model);
    /**
     * Function to delete a model by id
     *
     * @param int $id
     * @return bool
     */
    public function deleteById($id);
}

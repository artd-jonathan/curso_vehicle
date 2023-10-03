<?php
namespace Curso\Vehicle\Test\Unit\Model;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\TestCase;

class VehicleVehicle extends TestCase
{
    /** @var ObjectManager */
    private $objectManager;

    /** @var \Curso\Vehicle\Model\ResourceModel\VehicleVehicle\CollectionFactory */
    private $collectionFactory;

    protected function setUp(): void
    {
        $this->objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->vehicleVehicleFactory = $this->createMock(\Curso\Vehicle\Model\VehicleVehicleFactory::class);
        $this->vehicleVehicleFactory->method('create')->willReturnCallback(function(){
            return $this->objectManager->getObject(\Curso\Vehicle\Model\VehicleVehicle::class); 
        });
    }
    /**
     * Test if model is an instance of \Curso\Vehicle\Model\VehicleVehicle
     *
     * @return void
     */
    public function testVehicleVehicleType()
    {
        $vehicleVehicle = $this->vehicleVehicleFactory->create();
        $this->assertInstanceOf(\Curso\Vehicle\Model\VehicleVehicle::class, $vehicleVehicle);
    }
    /**
     * Test if model is an instance of \Curso\Vehicle\Model\ResourceModel\VehicleVehicle\Collection
     *
     * @return void
     */
    public function testVehicleVehicleId()
    {
        $vehicleVehicle = $this->vehicleVehicleFactory->create();
        $vehicleVehicle->setId(1);
        $this->assertEquals(1, $vehicleVehicle->getId());
    }
    /**
     * Test if model is an instance of \Curso\Vehicle\Model\ResourceModel\VehicleVehicle\Collection
     *
     * @return void
     */
    public function testVehicleVehiclePlate(){
        $vehicleVehicle = $this->vehicleVehicleFactory->create();
        $vehicleVehicle->setPlate('ABC-1234');
        $this->assertEquals('ABC-1234', $vehicleVehicle->getPlate());
    }
    /**
     * Test if model is an instance of \Curso\Vehicle\Model\ResourceModel\VehicleVehicle\Collection
     *
     * @return void
     */
    public function testVehicleVehicleModelId(){
        $vehicleVehicle = $this->vehicleVehicleFactory->create();
        $vehicleVehicle->setVehicleModelId(1);
        $this->assertEquals(1, $vehicleVehicle->getVehicleModelId());
    }
}
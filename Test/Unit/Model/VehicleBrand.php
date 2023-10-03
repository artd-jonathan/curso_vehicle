<?php
namespace Curso\Vehicle\Test\Unit\Model;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\TestCase;

class VehicleBrand extends TestCase
{
    /** @var ObjectManager */
    private $objectManager;

    /** @var \Curso\Vehicle\Model\ResourceModel\VehicleBrand\CollectionFactory */
    private $collectionFactory;

    protected function setUp(): void
    {
        $this->objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->vehicleBrandFactory = $this->createMock(\Curso\Vehicle\Model\VehicleBrandFactory::class);
        $this->vehicleBrandFactory->method('create')->willReturnCallback(function(){
            return $this->objectManager->getObject(\Curso\Vehicle\Model\VehicleBrand::class); 
        });
    }
    /**
     * Test if model is an instance of \Curso\Vehicle\Model\VehicleBrand
     *
     * @return void
     */
    public function testModelType()
    {
        $vehicleBrand = $this->vehicleBrandFactory->create();
        $this->assertInstanceOf(\Curso\Vehicle\Model\VehicleBrand::class, $vehicleBrand);
    }
    /**
     * Test if model is an instance of \Curso\Vehicle\Model\ResourceModel\VehicleBrand\Collection
     *
     * @return void
     */
    public function testModelId()
    {
        $vehicleBrand = $this->vehicleBrandFactory->create();
        $vehicleBrand->setId(1);
        $this->assertEquals(1, $vehicleBrand->getId());
    }
    /**
     * Test if model is an instance of \Curso\Vehicle\Model\ResourceModel\VehicleBrand\Collection
     *
     * @return void
     */
    public function testModelName()
    {
        $vehicleBrand = $this->vehicleBrandFactory->create();
        $vehicleBrand->setBrand('Marca 1');
        $this->assertEquals('Marca 1', $vehicleBrand->getBrand());
    }
    
}
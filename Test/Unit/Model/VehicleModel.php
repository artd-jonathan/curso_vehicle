<?php
namespace Curso\Vehicle\Test\Unit\Model;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\TestCase;

class VehicleModel extends TestCase
{
    /** @var ObjectManager */
    private $objectManager;

    /** @var \Curso\Vehicle\Model\ResourceModel\VehicleModel\CollectionFactory */
    private $collectionFactory;

    protected function setUp(): void
    {
        $this->objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->vehicleModelFactory = $this->createMock(\Curso\Vehicle\Model\VehicleModelFactory::class);
        $this->vehicleModelFactory->method('create')->willReturnCallback(function(){
            return $this->objectManager->getObject(\Curso\Vehicle\Model\VehicleModel::class); 
        });
    }
    /**
     * Test if model is an instance of \Curso\Vehicle\Model\VehicleModel
     *
     * @return void
     */
    public function testModelType()
    {
        $vehicleModel = $this->vehicleModelFactory->create();
        $this->assertInstanceOf(\Curso\Vehicle\Model\VehicleModel::class, $vehicleModel);
    }
    /**
     * Test if model is an instance of \Curso\Vehicle\Model\ResourceModel\VehicleModel\Collection
     *
     * @return void
     */
    public function testModelId()
    {
        $vehicleModel = $this->vehicleModelFactory->create();
        $vehicleModel->setId(1);
        $this->assertEquals(1, $vehicleModel->getId());
    }
    /**
     * Test if model is an instance of \Curso\Vehicle\Model\ResourceModel\VehicleModel\Collection
     *
     * @return void
     */
    public function testModelName()
    {
        $vehicleModel = $this->vehicleModelFactory->create();
        $vehicleModel->setName('Modelo 1');
        $this->assertEquals('Modelo 1', $vehicleModel->getName());
    }
    /**
     * Test if model is an instance of \Curso\Vehicle\Model\ResourceModel\VehicleModel\Collection
     *
     * @return void
     */
    public function testModelBrandId()
    {
        $vehicleModel = $this->vehicleModelFactory->create();
        $vehicleModel->setBrandId(1);
        $this->assertEquals(1, $vehicleModel->getBrandId());
    }

}
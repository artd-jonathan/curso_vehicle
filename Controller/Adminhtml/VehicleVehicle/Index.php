<?php
namespace Curso\Vehicle\Controller\Adminhtml\VehicleVehicle;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     */
    public function __construct(
       \Magento\Backend\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory,
       \Curso\Vehicle\Model\VehicleVehicleFactory $vehicleVehicleFactory
    )
    {
        // $this->vehicleVehicleFactory = $vehicleVehicleFactory;
        // $allnews = $this->vehicleVehicleFactory->create();
		// $newsCollection = $allnews->getCollection();
		
		// echo '<pre>';print_r($newsCollection->getData());
        // die();

        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    /**
     * Index action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->_pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Vehicle'));

        return $resultPage;
    }

}

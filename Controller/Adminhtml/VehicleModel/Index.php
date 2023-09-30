<?php
namespace Curso\Vehicle\Controller\Adminhtml\VehicleModel;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    protected $_vehicleModelFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     */
    public function __construct(
       \Magento\Backend\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory,
       \Curso\Vehicle\Model\VehicleModelFactory $vehicleModelFactory
    )
    {
        
        $this->_pageFactory = $pageFactory;
        $this->_vehicleModelFactory = $vehicleModelFactory;
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
        $resultPage->getConfig()->getTitle()->prepend(__('Vehicle Model'));

        return $resultPage;
    }

}

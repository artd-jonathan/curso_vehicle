<?php
namespace Curso\Vehicle\Controller\Adminhtml\VehicleBrand;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    protected $_vehicleBrandFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     */
    public function __construct(
       \Magento\Backend\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory,
       \Curso\Vehicle\Model\VehicleBrandFactory $vehicleBrandFactory
    )
    {
        
        $this->_pageFactory = $pageFactory;
        $this->_vehicleBrandFactory = $vehicleBrandFactory;
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
        $resultPage->getConfig()->getTitle()->prepend(__('Vehicle Brand'));

        return $resultPage;
    }

}

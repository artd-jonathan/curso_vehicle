<?php
namespace Curso\Vehicle\Controller\Adminhtml\VehicleVehicle;

class NewAction extends \Magento\Backend\App\Action
{
    protected $_resultForwardFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     */
    public function __construct(
       \Magento\Backend\App\Action\Context $context,
       \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
    ){
        $this->_resultForwardFactory = $resultForwardFactory;
        return parent::__construct($context);
    }
    public function execute()
    {
        $resultForward = $this->_resultForwardFactory->create();
        return $resultForward->forward('edit');
    }

}

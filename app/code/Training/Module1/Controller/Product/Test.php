<?php


namespace Training\Module1\Controller\Product;


class Test extends \Magento\Framework\App\Action\Action
{
    protected $resultJsonFactory;

    public function __construct
    (
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
    )
    {
        $this->resultJsonFactory = $resultJsonFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->resultJsonFactory->create();
        $result->setData(['message' => 'test']);
        return $result;
    }
}

<?php
namespace Training\Module1\Observer;

use Composer\DependencyResolver\Request;
use Magento\Framework\Event\ObserverInterface;

class MyObserver implements ObserverInterface
{
    protected $logger;
    protected $url;
    public function __construct(\Psr\Log\LoggerInterface $logger, \Magento\Framework\UrlInterface $url)
    {
        $this->logger = $logger;
        $this->url = $url;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $this->logger->debug('Url: ' . $this->url->getCurrentUrl());
    }

    public function getCurrentUrl() {
        $url = \Magento\Framework\App\ObjectManager::getInstance()
            ->get('Magento\Framework\UrlInterface');
        return $url->getCurrentUrl();
    }
}

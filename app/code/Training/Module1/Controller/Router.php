<?php

namespace Training\Module1\Controller;

use Magento\Framework\App\Action\Forward;
use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\RouterInterface;

class Router implements RouterInterface
{
    /**
     * @var ActionFactory
     */
    private $actionFactory;

    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * Router constructor.
     *
     * @param ActionFactory $actionFactory
     * @param ResponseInterface $response
     */
    public function __construct(
        ActionFactory $actionFactory,
        ResponseInterface $response
    ) {
        $this->actionFactory = $actionFactory;
        $this->response = $response;
    }

    /**
     * @param RequestInterface $request
     * @return ActionInterface|null
     */
    public function match(RequestInterface $request)
    {
        $identifier = trim($request->getPathInfo(), '/');

        if (strpos($identifier, 'lesson') !== false) {
            $request->setModuleName('Training_Module1');
            $request->setControllerName('Product');
            $request->setActionName('View');
            if (strpos($identifier, 'rewrite') !== false)
            {
                $request->setParams([
                    'is_rewrite' => 'yes'
                ]);
            }

            return $this->actionFactory->create(Forward::class, ['request' => $request]);
        }

        return null;
    }
}

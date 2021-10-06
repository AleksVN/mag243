<?php

namespace Training\Render\Controller\Layout;

use Magento\Framework\App\Action\HttpGetActionInterface as HttpGetActionInterface;
use Magento\Framework\App\Action\HttpPostActionInterface as HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;

class Onecolumn implements HttpGetActionInterface, HttpPostActionInterface
{
    protected $resultFactory;

    public function __construct(
        \Magento\Framework\Controller\ResultFactory $resultFactory
    ) {
        $this->resultFactory = $resultFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        return $resultPage;
    }
}

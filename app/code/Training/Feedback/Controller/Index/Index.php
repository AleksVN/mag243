<?php

namespace Training\Feedback\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    private $pageResultFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageResultFactory
    ) {
        $this->pageResultFactory = $pageResultFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->pageResultFactory->create();

        return $result;
    }
}

<?php

namespace Voloshkov\News\Controller\Mylist;

use Magento\Authorization\Model\UserContextInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Voloshkov\News\Model\ResourceModel\NewsResource;
use Voloshkov\News\Model\NewsModelFactory;

class Edit extends Action
{
    private $resourceNews;
    private $newsFactory;
    private $userContext;

    public function __construct(
        Context $context,
        NewsResource $newsResource,
        NewsModelFactory $newsFactory,
        UserContextInterface $userContext
    ) {
        parent::__construct($context);
        $this->resourceNews = $newsResource;
        $this->newsFactory = $newsFactory;
        $this->userContext = $userContext;
    }

    public function execute()
    {
        $userType = $this->userContext->getUserType();
        if ($userType != \Magento\Authorization\Model\UserContextInterface::USER_TYPE_CUSTOMER) {
            $resultForward = $this->resultFactory->create(ResultFactory::TYPE_FORWARD);
            $resultForward->forward('noroute');

            return $resultForward;
        }
        $id = $this->getRequest()->getParam('id');

        $news = $this->newsFactory->create();
        $this->resourceNews->load($news, $id);

        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        $block = $resultPage->getLayout()->getBlock('edit.vm');
        $block->setData('news', $news);

        return $resultPage;

    }
}

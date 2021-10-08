<?php

namespace Voloshkov\News\Controller\Mylist;

use Magento\Authorization\Model\UserContextInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Voloshkov\News\Model\ResourceModel\NewsResource;
use Voloshkov\News\Model\NewsModelFactory;

class View extends Action
{

    private $resourceNews;
    private $newsFactory;
    private $userContext;

    public function __construct(
        Context $context,
        NewsResource $newsResource,
        UserContextInterface $userContext,
        NewsModelFactory $newsFactory
    ) {
        parent::__construct($context);
        $this->resourceNews = $newsResource;
        $this->newsFactory = $newsFactory;
        $this->userContext = $userContext;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        if ($id) {
            $news = $this->newsFactory->create();
            $this->resourceNews->load($news, $id);

            if ($news->getId()) {

                $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

                $block = $resultPage->getLayout()->getBlock('news.view');
                $block->setData('news', $news);

                $userType = $this->userContext->getUserType();
                $block->setData('userType', $userType);

               return $resultPage;

            }
        }

        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $this->messageManager->addErrorMessage(__('Not found'));

        return $resultRedirect->setPath("*/*/");
    }
}

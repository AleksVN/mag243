<?php

namespace Voloshkov\News\Controller\Mylist;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Voloshkov\News\Model\ResourceModel\NewsResource;
use Voloshkov\News\Model\NewsModelFactory;

class Save extends Action
{

    private $resourceNews;
    private $newsFactory;

    public function __construct(
        Context $context,
        NewsResource $newsResource,
        NewsModelFactory $newsFactory
    ) {
        parent::__construct($context);
        $this->resourceNews = $newsResource;
        $this->newsFactory = $newsFactory;
    }

    public function execute()
    {
        $title = $this->getRequest()->getParam('title');
        $description = $this->getRequest()->getParam('description');
        $content = $this->getRequest()->getParam('content');

        $news = $this->newsFactory->create();

        $id = $this->getRequest()->getParam('id');

        if (!$id) {
            $news->setData('title', $title);
            $news->setData('description', $description);
            $news->setData('content', $content);

            $this->resourceNews->save($news);
        } else {
            $news->setId($id);
            $news->setData('title', $title);
            $news->setData('description', $description);
            $news->setData('content', $content);

            $this->resourceNews->save($news);
        }

        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $this->messageManager->addSuccessMessage(__('Saved'));
        $resultRedirect->setPath("*/*/view/id/{$news->getId()}");

        return $resultRedirect;

    }
}


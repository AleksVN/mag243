<?php

namespace Voloshkov\News\Controller\Mylist;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Voloshkov\News\Model\ResourceModel\NewsCollectionFactory;

class Index extends Action
{

    private $newsCollectionFactory;

    public function __construct(
        Context $context,
        NewsCollectionFactory $newsCollectionFactory
    ) {
        parent::__construct($context);
        $this->newsCollectionFactory = $newsCollectionFactory;
    }

    public function execute()
    {
        $collectionNews = $this->newsCollectionFactory->create();
        $sortDate = $this->getRequest()->getParam('sort_date');
        $allNews = $collectionNews->sort($sortDate)->load()->getItems();

        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $block = $resultPage->getLayout()->getBlock('index');
        $block->setData('allNews', $allNews);

        return $resultPage;

    }
}

<?php

namespace Voloshkov\News\Model;

use Magento\Framework\Model\AbstractModel;
use Voloshkov\News\Model\ResourceModel\NewsResource;

class NewsModel extends AbstractModel
{
   public $_idFieldName = 'news_id';

    protected function _construct()
    {
        $this->_init(NewsResource::class);
    }
}

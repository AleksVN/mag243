<?php

namespace Voloshkov\News\Block;

class Edit extends \Magento\Framework\View\Element\Template
{

//    public function getSaveUrl()
//    {
//        return $this->_urlBuilder->getUrl(
//            'news/mylist/save',
//            []
//        );
//
//    }

    public function getEditUrl()
    {

        $news = $this->getData('news');

        return $this->_urlBuilder->getUrl(
            'news/mylist/edit',
            ['id' => $news->getId()]
        );

    }

    public function getViewUrl($id)
    {
        return $this->_urlBuilder->getUrl(
            'news/mylist/view',
            ['id' => $id]
        );

    }

}


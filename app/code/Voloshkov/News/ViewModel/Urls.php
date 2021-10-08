<?php

namespace Voloshkov\News\ViewModel;

class Urls implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /**
     * @var \Magento\Framework\UrlInterface
     */
    private $urlBuilder;

    /**
     * @param \Magento\Framework\UrlInterface $urlBuilder
     */
    public function __construct(
        \Magento\Framework\UrlInterface $urlBuilder
    ) {
        $this->urlBuilder = $urlBuilder;
    }


    public function getSaveUrl()
    {
        return $this->urlBuilder->getUrl(
            'news/mylist/save',
            []
        );

    }


}

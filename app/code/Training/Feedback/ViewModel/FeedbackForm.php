<?php

namespace Training\Feedback\ViewModel;

class FeedbackForm implements \Magento\Framework\View\Element\Block\ArgumentInterface
{

    private \Magento\Framework\UrlInterface $urlBuilder;

    public function __construct(
        \Magento\Framework\UrlInterface $urlBuilder
    )
    {
        $this->urlBuilder = $urlBuilder;
    }

    public function getActionUrl()
    {

        return $this->urlBuilder->getUrl('feedback/index/save');
    }
}

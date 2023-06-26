<?php

namespace Robin\Bai1\Controller\Hello;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class World extends \Magento\Framework\App\Action\Action
{
    protected $pageFactory;
    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }
    public function execute(){
        return $this->pageFactory->create();
    }
}

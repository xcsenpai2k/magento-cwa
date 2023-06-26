<?php

namespace MyPackage\Student\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;
use MyPackage\Student\Model\StudentFactory;

class Show implements HttpGetActionInterface
{
    public function __construct(protected StudentFactory $studentFactory, private readonly PageFactory $pageFactory)
    {
    }

    public function execute()
    {
        return $this->pageFactory->create();
    }
}

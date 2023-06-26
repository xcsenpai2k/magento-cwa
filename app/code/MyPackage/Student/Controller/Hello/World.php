<?php

namespace MyPackage\Student\Controller\Hello;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;

class World implements HttpGetActionInterface
{
    public function execute()
    {
        echo "Hello World";
        exit;
    }
}

<?php

namespace Robin\Bai2\Controller\Index;

use Magento\Backend\App\Action\Context;
use \Robin\Bai2\Model\BannerFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $bannerFactory;
    public function __construct(Context $context, BannerFactory $bannerFactory)
    {
        $this->bannerFactory = $bannerFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        // Init collection
        $collection = $this->bannerFactory->create()->getCollection();
        // SELECT * FROM banner
        // $data = $collection->getData();

        // SELECT * FROM banner WHERE id > 50
        // $data = $collection->addFieldToFilter('id', ['gt' => 50])->getData();

        // SELECT * FROM banner WHERE image LIKE '%.png'
           $data = $collection->addFieldToSelect('id')->addFieldToFilter('image', ['like' => '%.png'])->getData();

        // SELECT * FROM banner WHERE image LIKE '%.png' AND id > 50
        // $query = $collection->addFieldToFilter('image', ['like' => '%.png'])
        //     ->addFieldToFilter('id', ['gt' => 50])
        //     ->getData();

        print_r(json_encode($data));
    }
}

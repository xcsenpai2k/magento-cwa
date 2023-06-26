<?php

namespace Robin\Banner\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Banner extends AbstractDb
{
    protected function _construct()
    {
        // Table name + primary key column
        $this->_init('banner', 'id');
    }
}

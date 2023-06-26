<?php

namespace Robin\Bai2\Model\ResourceModel\Banner;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        // Model + Resource Model
        $this->_init('Robin\Banner\Model\Banner', 'Robin\Banner\Model\ResourceModel\Banner');
    }

}

<?php

namespace Robin\Banner\Model\ResourceModel\Banner;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Robin\Banner\Model\Banner', 'Robin\Banner\Model\ResourceModel\Banner');
    }

}

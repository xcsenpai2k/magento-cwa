<?php

namespace Robin\Banner\Model;

use Magento\Framework\Model\AbstractModel;

class Banner extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Robin\Banner\Model\ResourceModel\Banner');
    }
}

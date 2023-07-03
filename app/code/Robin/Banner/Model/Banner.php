<?php

namespace Robin\Banner\Model;

use Magento\Framework\Model\AbstractModel;

class Banner extends AbstractModel
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    
    protected function _construct()
    {
        $this->_init('Robin\Banner\Model\ResourceModel\Banner');
    }
}

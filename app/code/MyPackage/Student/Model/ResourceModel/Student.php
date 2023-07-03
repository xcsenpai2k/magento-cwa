<?php

namespace MyPackage\Student\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Student extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'students_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('students', 'entity_id');
        $this->_useIsObjectNew = true;
    }

}

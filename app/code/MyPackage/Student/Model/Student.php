<?php

namespace MyPackage\Student\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use MyPackage\Student\Model\ResourceModel\Student as ResourceModel;

class Student extends AbstractModel implements IdentityInterface
{
    public const STUDENT_MODEL_CACHE_TAG = 'student';

    /**
     * @var string
     */
    protected $_eventPrefix = 'students_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    public function getIdentities()
    {
        return [self::STUDENT_MODEL_CACHE_TAG, self::STUDENT_MODEL_CACHE_TAG . '_' .$this->getEntityId()];
    }
}

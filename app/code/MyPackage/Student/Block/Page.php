<?php

namespace MyPackage\Student\Block;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use MyPackage\Student\Model\ResourceModel\Student;
use MyPackage\Student\Model\ResourceModel\Student\CollectionFactory as StudentCollectionFactory;
use MyPackage\Student\Model\StudentFactory;

class Page extends Template implements IdentityInterface
{
    public function __construct(
        Context                            $context,
        private StudentCollectionFactory   $studentCollectionFactory,
        private StudentFactory             $studentFactory,
        private Student                    $studentResource,
        array                              $data = []
    )
    {
        parent::__construct($context, $data);
    }

    public function getStudentCollection()
    {
        $page = $this->getRequest()->getParam('p') ?: 1;
        $pageSize = ($this->getRequest()->getParam('limit')) ?: 5;

        $sortField = $this->getRequest()->getParam('sort');
        $sortOrder = $this->getRequest()->getParam('order');

        $collection = $this->studentCollectionFactory->create();
        $collection->setPageSize($pageSize);
        $collection->setCurPage($page);

        if ($sortField && $sortOrder) {
            $collection->addOrder($sortField, $sortOrder);
        }

        $entityIdFilter = $this->getRequest()->getParam('entity_id');
        if ($entityIdFilter) {
            $collection->addFieldToFilter('entity_id', ['eq' => $entityIdFilter]);
        }

        $nameFilter = $this->getRequest()->getParam('name');
        if ($nameFilter) {
            $collection->addFieldToFilter('name', ['like' => '%' . $nameFilter . '%']);
        }

        $genderFilter = $this->getRequest()->getParam('gender');
        if ($genderFilter) {
            $collection->addFieldToFilter('gender', ['eq' => $genderFilter]);
        }

        $ageFromFilter = $this->getRequest()->getParam('age_from');
        $ageToFilter = $this->getRequest()->getParam('age_to');
        if ($ageFromFilter && $ageToFilter) {
            $currentDate = new \DateTime();
            $currentDate->sub(new \DateInterval('P' . $ageFromFilter . 'Y'));
            $startDate = $currentDate->format('Y-m-d');

            $currentDate = new \DateTime();
            $currentDate->sub(new \DateInterval('P' . $ageToFilter . 'Y'));
            $endDate = $currentDate->format('Y-m-d');

            $collection->addFieldToFilter('dob', ['from' => $endDate, 'to' => $startDate]);
        }

        return $collection;
    }

    public function getStudent()
    {
        if($studentId = $this->getRequest()->getParam('id')){
            $student = $this->studentFactory->create();
            $this->studentResource->load($student, $studentId);
            return $student;
        }
        return null;
    }

    public function createStudent(){
        return $this->getUrl('student/index/save');
    }

    public function getFormAction()
    {
        $studentId = $this->getRequest()->getParam('id');
        return $this->getUrl('student/index/save', ['id' => $studentId]);
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }

    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if ($this->getStudentCollection()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'custom.history.pager'
            )->setAvailableLimit([5 => 5, 10 => 10, 15 => 15, 20 => 20])
                ->setShowPerPage(true)->setCollection(
                    $this->getStudentCollection()
                );
            $this->setChild('pager', $pager);
            $this->getStudentCollection()->load();
        }
        return $this;
    }

    public function getIdentities()
    {
        return [\MyPackage\Student\Model\Student::STUDENT_MODEL_CACHE_TAG];
    }
}


<?php

namespace MyPackage\Student\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\HttpDeleteActionInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;
use MyPackage\Student\Model\ResourceModel\Student;
use MyPackage\Student\Model\StudentFactory;
use Magento\Framework\App\Action\Context;

class Delete extends Action implements HttpGetActionInterface
{
    public function __construct(
        Context $context,
        private StudentFactory $studentFactory,
        private Student        $studentResource,
    ) {
        parent::__construct($context);
    }

    public function execute()
    {
        $studentId = $this->getRequest()->getParam('id');
        $student = $this->studentFactory->create();
        $this->studentResource->load($student, $studentId);

        if ($student->getId()) {
            try {
                $student->delete();
                $this->messageManager->addSuccessMessage(__('Student has been deleted successfully.'));
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__('An error occurred while deleting the student.'));
            }
        } else {
            $this->messageManager->addErrorMessage(__('Student not found.'));
        }

        $this->_redirect('student');
    }
}

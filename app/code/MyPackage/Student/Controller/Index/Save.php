<?php

namespace MyPackage\Student\Controller\Index;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use MyPackage\Student\Model\ResourceModel\Student;
use MyPackage\Student\Model\StudentFactory;
use Magento\Framework\Filesystem;
use Magento\Framework\App\Action\Context;

class Save extends Action implements HttpPostActionInterface
{
    public function __construct(
        Context                $context,
        private StudentFactory $studentFactory,
        protected PageFactory  $pageFactory,
        private Student        $studentResource,
        protected Filesystem   $filesystem
    )
    {
        parent::__construct($context);
    }

    public function execute()
    {
        $student = $this->studentFactory->create();
        if($studentId = $this->getRequest()->getParam('id')){
            $this->studentResource->load($student, $studentId);
        }

        if ($postData = $this->getRequest()->getPostValue()) {
            try {
                $student->setData($postData);
                $student->save();
                $this->messageManager->addSuccessMessage(__('Student data has been saved successfully.'));
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__('An error occurred while saving the student.'));
            }
        }
        $this->_redirect('student');
    }
}

<?php

namespace Robin\Banner\Model\Banner;

/**
 * Class DomValidationState
 * @package Magento\Cms\Model\Page
 */
class DomValidationState implements \Magento\Framework\Config\ValidationStateInterface
{
    /**
     * Retrieve validation state
     * Used in cms page post processor to force validate layout update xml
     *
     * @return boolean
     */
    public function isValidationRequired()
    {
        return true;
    }
}

<?php

namespace Robin\Banner\Model\Banner\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Robin\Banner\Model\Banner;

class Status implements OptionSourceInterface
{
    public function __construct(protected Banner $banner)
    {
    }

    /**
     * Get status options
     */
    public function toOptionArray()
    {
        $availableOptions = $this->banner->getAvailableStatuses();
        $options = [];
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}

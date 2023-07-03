<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Robin\Banner\Block\Adminhtml\Index\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Exception\NoSuchEntityException;
use Robin\Banner\Model\BannerFactory;

/**
 * Class GenericButton
 */
class GenericButton
{
    public function __construct(
        Context                        $context,
        private readonly BannerFactory $bannerFactory
    )
    {
        $this->context = $context;
    }

    /**
     * Return CMS page ID
     *
     * @return int|null
     */
    public function getBannerId()
    {
        try {
            $id = $this->context->getRequest()->getParam('id');
            $banner = $this->bannerFactory->create()->load($id);
            if ($banner->getId())
                return $id;
        } catch (NoSuchEntityException $e) {
        }
        return null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param string $route
     * @param array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}

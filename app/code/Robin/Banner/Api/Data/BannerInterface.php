<?php

namespace Robin\Banner\Api\Data;

interface BannerInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID = 'id';
    const IMAGE = 'image';
    const LINK = 'link';
    const SORT_ORDER = 'sort_order';
    const STATUS = 'status';

    /**#@-*/

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get identifier
     *
     * @return string
     */
    public function getImage();

    /**
     * Get title
     *
     * @return string|null
     */
    public function getLink();

    /**
     * Get page layout
     *
     * @return string|null
     */
    public function getSortOrder();

    /**
     * Is active
     *
     * @return bool|null
     */
    public function getStatus();


    public function setId($id);


    public function setImage($image);


    public function setLink($link);

    /**
     * Set page layout
     *
     * @param string $pageLayout
     * @return \Magento\Cms\Api\Data\PageInterface
     */
    public function setSortOrder($sortOrder);

    public function setStatus($status);
}

<?php

namespace Evolution7\SocialApi\Entity;

/**
 * @SuppressWarnings(PHPMD.ShortVariable)
 */
interface BaseInterface
{
    /**
     * Set platform
     *
     * @param $platform
     *
     * @throws \InvalidArgumentException
     */
    public function setPlatform($platform);

    /**
     * Get platform
     *
     * @return string
     */
    public function getPlatform();

    /**
     * Set entity ID
     *
     * @param string $id
     */
    public function setId($id);

    /**
     * Get entity ID
     *
     * @return string
     */
    public function getId();

    /**
     * Set entity pagination ID
     *
     * @param string $paginationId
     */
    public function setPaginationId($paginationId);

    /**
     * Get entity pagination ID
     *
     * @return string
     */
    public function getPaginationId();

    /**
     * Set entity URL
     *
     * @param string $url
     */
    public function setUrl($url);

    /**
     * Get entity URL
     *
     * @return string
     */
    public function getUrl();
}

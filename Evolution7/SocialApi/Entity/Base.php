<?php

namespace Evolution7\SocialApi\Entity;

use Evolution7\SocialApi\Config\Config;

/**
 * Base class for all entities
 */
abstract class Base
{
    private $platform;
    private $id;
    private $paginationId;

    /**
     * Set platform
     *
     * @param $platform
     *
     * @throws \InvalidArgumentException
     */
    final public function setPlatform($platform)
    {
        if (config::validatePlatform($platform)) {
            $this->platform = $platform;
        } else {
            throw new \InvalidArgumentException(
                sprintf("Platform '%s' not supported", $platform)
            );
        }
    }

    /**
     * Get platform
     *
     * @return string
     */
    final public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * Set entity ID
     *
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get entity ID
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set entity pagination ID
     *
     * @param string $paginationId
     */
    public function setPaginationId($paginationId)
    {
        $this->paginationId = $paginationId;
    }

    /**
     * Get entity pagination ID
     *
     * @return string
     */
    public function getPaginationId()
    {
        return $this->paginationId;
    }

    /**
     * Set entity URL
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get entity URL
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}

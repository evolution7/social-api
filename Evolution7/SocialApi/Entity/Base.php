<?php

namespace Evolution7\SocialApi\Entity;

use Evolution7\SocialApi\Config\Config;

/**
 * Base class for all entities
 */
abstract class Base
{
    protected $platform;
    protected $id;
    protected $paginationId;
    protected $url;

    /**
     * {@inheritdoc}
     */
    public function setPlatform($platform)
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
     * {@inheritdoc}
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * {@inheritdoc}
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setPaginationId($paginationId)
    {
        $this->paginationId = $paginationId;
    }

    /**
     * {@inheritdoc}
     */
    public function getPaginationId()
    {
        return $this->paginationId;
    }

    /**
     * {@inheritdoc}
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl()
    {
        return $this->url;
    }
}

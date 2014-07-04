<?php

namespace Evolution7\SocialApi\Entity;

class User extends Base
{
    protected $url;
    protected $handle;
    protected $name;
    protected $imageUrl;

    /**
     * Set user handle/screen name
     *
     * @param string $handle
     */
    public function setHandle($handle)
    {
        $this->handle = $handle;
    }

    /**
     * Get user handle/screen name
     *
     * @return string
     */
    public function getHandle()
    {
        return $this->handle;
    }

    /**
     * Set user name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get user name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set user profile image URL
     *
     * @param string $imageUrl
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * Get user profile image URL
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }
}

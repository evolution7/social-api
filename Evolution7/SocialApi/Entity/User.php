<?php

namespace Evolution7\SocialApi\Entity;

class User extends Base implements UserInterface
{
    protected $handle;
    protected $name;
    protected $imageUrl;

    /**
     * {@inheritdoc}
     */
    public function setHandle($handle)
    {
        $this->handle = $handle;
    }

    /**
     * {@inheritdoc}
     */
    public function getHandle()
    {
        return $this->handle;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * {@inheritdoc}
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }
}

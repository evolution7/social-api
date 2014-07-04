<?php

namespace Evolution7\SocialApi\Entity;

interface UserInterface extends BaseInterface
{
    /**
     * Set user handle/screen name
     *
     * @param string $handle
     */
    public function setHandle($handle);

    /**
     * Get user handle/screen name
     *
     * @return string
     */
    public function getHandle();

    /**
     * Set user name
     *
     * @param string $name
     */
    public function setName($name);

    /**
     * Get user name
     *
     * @return string
     */
    public function getName();

    /**
     * Set user profile image URL
     *
     * @param string $imageUrl
     */
    public function setImageUrl($imageUrl);

    /**
     * Get user profile image URL
     *
     * @return string
     */
    public function getImageUrl();
}

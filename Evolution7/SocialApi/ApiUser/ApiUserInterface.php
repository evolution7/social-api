<?php

namespace Evolution7\SocialApi\ApiUser;

use Evolution7\SocialApi\ApiResponse\ApiResponseInterface;

interface ApiUserInterface extends ApiResponseInterface
{
    /**
     * Get user ID
     *
     * @throws NotSupportedByAPIException
     *
     * @return string
     */
    public function getId();

    /**
     * Get user URL
     *
     * @throws NotSupportedByAPIException
     *
     * @return string
     */
    public function getUrl();

    /**
     * Get user handle/screen name
     *
     * @throws NotSupportedByAPIException
     *
     * @return string
     */
    public function getHandle();

    /**
     * Get user name
     *
     * @throws NotSupportedByAPIException
     *
     * @return string
     */
    public function getName();
}

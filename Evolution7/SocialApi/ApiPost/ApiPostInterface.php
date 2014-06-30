<?php

namespace Evolution7\SocialApi\ApiPost;

use Evolution7\SocialApi\ApiResponse\ApiResponseInterface;

interface ApiPostInterface extends ApiResponseInterface
{
    /**
     * Get post ID
     *
     * @throws NotSupportedByAPIException
     *
     * @return string
     */
    public function getId();

    /**
     * Get post URL
     *
     * @throws NotSupportedByAPIException
     *
     * @return string
     */
    public function getUrl();

    /**
     * Get post body
     *
     * @throws NotSupportedByAPIException
     *
     * @return string
     */
    public function getBody();

    /**
     * Get post media URL
     *
     * @throws NotSupportedByAPIException
     *
     * @return string
     */
    public function getMediaUrl();

    /**
     * Get user
     *
     * @throws NotSupportedByAPIException
     *
     * @return ApiUserInterface
     */
    public function getUser();
}

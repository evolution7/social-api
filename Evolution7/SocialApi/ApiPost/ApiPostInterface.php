<?php

namespace Evolution7\SocialApi\ApiPost;

use Evolution7\SocialApi\ApiItem\ApiItemInterface;

interface ApiPostInterface extends ApiItemInterface 
{

    /**
     * Get post ID
     *
     * @throws NotSupportedByAPIException;
     *
     * @return string
     */
    public function getId();

    /**
     * Get post URL
     *
     * @throws NotSupportedByAPIException;
     *
     * @return string
     */
    public function getUrl();

    /**
     * Get post body
     *
     * @throws NotSupportedByAPIException;
     *
     * @return string
     */
    public function getBody();

}

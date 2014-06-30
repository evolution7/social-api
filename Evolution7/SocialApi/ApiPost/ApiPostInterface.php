<?php

namespace Evolution7\SocialApi\ApiPost;

use Evolution7\SocialApi\ApiItem\ApiItemInterface;

interface ApiPostInterface extends ApiItemInterface 
{

    /**
     * Get post ID
     *
     * @throws NotImplementedException;
     * @throws NotSupportedByAPIException;
     * @return string
     */
    public function getId();

    /**
     * Get post URL
     *
     * @throws NotImplementedException;
     * @throws NotSupportedByAPIException;
     */
    public function getUrl();

    /**
     * Get post body
     *
     * @throws NotImplementedException;
     * @throws NotSupportedByAPIException;
     * @return string
     */
    public function getBody();

}

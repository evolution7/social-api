<?php

namespace Evolution7\SocialApi\ApiPost;

use Evolution7\SocialApi\ApiItem\ApiItemInterface;

interface ApiPostInterface extends ApiItemInterface 
{

    /**
     * Get post body
     *
     * @throws NotImplementedException;
     * @throws NotSupportedByAPIException;
     * @return string
     */
    public function getBody();

}

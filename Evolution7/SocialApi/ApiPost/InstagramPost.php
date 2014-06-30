<?php

namespace Evolution7\SocialApi\ApiPost;

use Evolution7\SocialApi\ApiItem\ApiItem;
use Evolution7\SocialApi\Exception\NotImplementedException;

class InstagramPost extends ApiItem implements ApiPostInterface
{

    public function getId()
    {
        throw new NotImplementedException();
    }

    public function getUrl()
    {
        throw new NotImplementedException();
    }

    public function getBody()
    {
        throw new NotImplementedException();
    }











    public function getIdentifier()
    {
        throw new NotImplementedException();
    }

    public function getUri()
    {
        throw new NotImplementedException();
    }

    public function getMediaUri()
    {
        throw new NotImplementedException();
    }

    public function comment($message)
    {
        throw new NotImplementedException();
    }

    public function getOriginalObject()
    {
        throw new NotImplementedException();
    }

    public function getOriginalJSON()
    {
        throw new NotImplementedException();
    }
    
}

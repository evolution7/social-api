<?php
namespace Evolution7\SocialApi\ApiItem;

use Evolution7\SocialApi\Exception\NotImplementedException;

class Facebook implements ApiItemInterface
{
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

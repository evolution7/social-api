<?php
namespace Evolution7\SocialApi\ApiObject;

use Evolution7\SocialApi\Exception\NotImplementedException;

class Facebook implements \Evolution7\SocialApi\Interface\ApiObjectInterface
{
    public function getIdentifier()
    {
        throws new NotImplementedException();
    }

    public function getUri()
    {
        throws new NotImplementedException();
    }

    public function getMediaUri()
    {
        throws new NotImplementedException();
    }

    public function comment($message)
    {
        throws new NotImplementedException();
    }

    public function getOriginalObject()
    {
        throws new NotImplementedException();
    }

    public function getOriginalJSON()
    {
        throws new NotImplementedException();
    }
}
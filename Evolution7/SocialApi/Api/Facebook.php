<?php
namespace Evolution7\SocialApi\Api;

use Evolution7\SocialApi\Exception\NotImplementedException;

class Facebook implements \Evolution7\SocialApi\Interface\ApiInterface
{
    public function search($searchTerm)
    {
        throws new NotImplementedException();
    }

    public function comment($objectId, $objectType, $message)
    {
        throws new NotImplementedException();
    }

    public function message($userId, $message)
    {
        throws new NotImplementedException();
    }

    public function getOriginalApi()
    {
        throws new NotImplementedException();
    }

}

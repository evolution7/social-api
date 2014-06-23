<?php
namespace Evolution7\SocialApi\Api;

use Evolution7\SocialApi\Exception\NotImplementedException;

class Facebook implements ApiInterface
{
    public function search($searchTerm)
    {
        throw new NotImplementedException();
    }

    public function comment($objectId, $objectType, $message)
    {
        throw new NotImplementedException();
    }

    public function message($userId, $message)
    {
        throw new NotImplementedException();
    }

    public function getOriginalApi()
    {
        throw new NotImplementedException();
    }

}

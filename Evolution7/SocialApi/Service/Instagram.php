<?php

namespace Evolution7\SocialApi\Service;

use Evolution7\SocialApi\Exception\NotImplementedException;

class Instagram extends Service implements ServiceInterface
{
    
    public function search($searchTerm)
    {
        throw new NotImplementedException();
    }

    public function searchForTagSince($tag, \DateTime $since)
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

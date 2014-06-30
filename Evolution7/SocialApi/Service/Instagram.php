<?php

namespace Evolution7\SocialApi\Service;

use Evolution7\SocialApi\Exception\NotImplementedException;

class Instagram extends Service implements ServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function search(QueryInterface $query)
    {
        throw new NotImplementedException();
    }
}

<?php

namespace Evolution7\SocialApi\ApiResponse;

use Evolution7\SocialApi\ApiResponse\ApiResponse;

class TwitterResponse extends ApiResponse
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getArrayValue('id_str');
    }
}

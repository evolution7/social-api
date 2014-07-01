<?php

namespace Evolution7\SocialApi\ApiResponse;

use Evolution7\SocialApi\ApiResponse\ApiResponse;

class InstagramResponse extends ApiResponse
{
    private $hasRootElement;

    protected function hasRootElement()
    {
        if (is_null($this->hasRootElement)) {
            $this->hasRootElement = !is_null($this->getArrayValue('data'));
        }
        return $this->hasRootElement;
    }
}

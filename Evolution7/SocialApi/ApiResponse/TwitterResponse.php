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

    /**
     * {@inheritdoc}
     */
    public function getCreated()
    {
        $value = $this->getArrayValue('created_at');
        return !is_null($value) ? new \DateTime($value) : null;
    }
}

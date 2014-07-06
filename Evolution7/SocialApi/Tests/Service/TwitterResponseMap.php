<?php

namespace Evolution7\SocialApi\Tests\Service;

use \Evolution7\SocialApi\Tests\ResourceLoader;

/**
 * Used to map requests to sample responses
 */
class TwitterResponseMap implements ResponseMapInterface
{
    /**
     * {@inheritdoc}
     */
    public function request($path, $method = 'GET', $body = null, array $extraHeaders = array())
    {
        // Load sample responses
        $resourceLoader = new ResourceLoader('Twitter');
        $this->sampleResponses = $resourceLoader->loadSampleResponses();

        // Return response
        if (strpos($path, 'account/verify_credentials') !== false) {
            return $this->sampleResponses['get-account-verify_credentials.json'];
        } elseif (strpos($path, 'search/tweets') !== false) {
            return $this->sampleResponses['get-search-tweets.json'];
        } elseif (strpos($path, 'statuses/show/') !== false) {
            return $this->sampleResponses['get-statuses-show-id.json'];
        } else {
            return '{}';
        }
    }
}

<?php

namespace Evolution7\SocialApi\Tests\Service;

use \Evolution7\SocialApi\Tests\ResourceLoader;

/**
 * Used to map requests to sample responses
 */
class TwitterResponseMap
{
    public function request($url, $method) {
        
        // Load sample responses
        $resourceLoader = new ResourceLoader('Twitter');
        $this->sampleResponses = $resourceLoader->loadSampleResponses();

        // Return response
        if (strpos($url, 'account/verify_credentials') !== false) {
            return $this->sampleResponses['get-account-verify_credentials.json'];
        } else if (strpos($url, 'search/tweets') !== false) {
            return $this->sampleResponses['get-search-tweets.json'];
        } else if (strpos($url, 'statuses/show/') !== false) {
            return $this->sampleResponses['get-statuses-show-id.json'];
        } else {
            return '{}';
        }

    }
}

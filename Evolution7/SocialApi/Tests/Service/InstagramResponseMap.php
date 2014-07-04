<?php

namespace Evolution7\SocialApi\Tests\Service;

use \Evolution7\SocialApi\Tests\ResourceLoader;

/**
 * Used to map requests to sample responses
 */
class InstagramResponseMap
{
    public function request($url, $method) {
        
        // Load sample responses
        $resourceLoader = new ResourceLoader('Instagram');
        $this->sampleResponses = $resourceLoader->loadSampleResponses();

        // Return response
        if (strpos($url, 'users/self') !== false) {
            return $this->sampleResponses['get-users-self.json'];
        } else if (strpos($url, 'media/search') !== false) {
            return $this->sampleResponses['get-media-search.json'];
        } else if (strpos($url, 'tags/') !== false) {
            return $this->sampleResponses['get-tags-tag_name-media-recent.json'];
        } else if (strpos($url, 'media/') !== false) {
            return $this->sampleResponses['get-media-media_id.json'];
        } else {
            return '{}';
        }

    }
}

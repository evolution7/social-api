<?php

namespace Evolution7\SocialApi\Tests\Service;

use \Evolution7\SocialApi\Tests\ResourceLoader;

/**
 * Used to map requests to sample responses
 */
class InstagramResponseMap
{
    /**
     * {@inheritdoc}
     */
    public function request($path, $method = 'GET', $body = null, array $extraHeaders = array())
    {
        // Load sample responses
        $resourceLoader = new ResourceLoader('Instagram');
        $this->sampleResponses = $resourceLoader->loadSampleResponses();

        // Return response
        if (strpos($path, 'users/self') !== false) {
            return $this->sampleResponses['get-users-self.json'];
        } elseif (strpos($path, 'media/search') !== false) {
            return $this->sampleResponses['get-media-search.json'];
        } elseif (strpos($path, 'tags/') !== false) {
            return $this->sampleResponses['get-tags-tag_name-media-recent.json'];
        } elseif (strpos($path, 'media/') !== false) {
            return $this->sampleResponses['get-media-media_id.json'];
        } else {
            return '{}';
        }
    }
}

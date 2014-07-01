<?php

namespace Evolution7\SocialApi\Service;

use Evolution7\SocialApi\Exception\NotImplementedException;
use Evolution7\SocialApi\ApiPost\InstagramPost;

class Instagram extends Service implements ServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function search(QueryInterface $query)
    {
        // Get library service
        $libService = $this->getLibService();
        // Build search value
        $hashtags = implode(' ', $query->getHashtags());
        // Build request url
        $requestUrl = 'tags/';
        $requestUrl .= urlencode($hashtags);
        $requestUrl .= '/media/recent';
        // Search api
        $responseRaw = $libService->request($requestUrl);
        $responseArray = json_decode($responseRaw, true);
        // Create return array
        $return = array();
        // Check if statuses exist
        if (array_key_exists('data', $responseArray)) {
            // Check if at least one statuses exists
            if (count($responseArray['data']) > 0) {
                // Loop statuses
                foreach ($responseArray['data'] as $media) {
                    // Create new InstagramPost object and add to return array
                    $return[] = new InstagramPost(json_encode($media));
                }
            }
        }
        return $return;
    }
}

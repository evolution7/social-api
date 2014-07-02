<?php

namespace Evolution7\SocialApi\Service;

use Evolution7\SocialApi\Exception\NotImplementedException;
use Evolution7\SocialApi\ApiUser\InstagramUser;
use Evolution7\SocialApi\ApiPost\InstagramPost;
use Evolution7\SocialApi\ApiPost\ApiPostInterface;

class Instagram extends Service implements ServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getCurrentUser()
    {
        $libService = $this->getLibService();
        $requestUrl = 'users/self';
        $responseRaw = $libService->request($requestUrl);
        return new InstagramUser($responseRaw);
    }

    /**
     * {@inheritdoc}
     */
    public function getPostById($id)
    {
        $libService = $this->getLibService();
        $requestUrl = 'media/' . $id;
        $responseRaw = $libService->request($requestUrl);
        return new InstagramPost($responseRaw);
    }

    /**
     * {@inheritdoc}
     */
    public function search(QueryInterface $query)
    {
        // Get library service
        $libService = $this->getLibService();
        // Get query data
        $qHashtag = $query->getHashtag();
        $qMedia = $query->getMedia();
        $qFromId = $query->getFromId();
        $qFromDate = $query->getFromDate();
        $qToId = $query->getToId();
        $qToDate = $query->getToDate();
        $qNumResults = $query->getNumResults();
        // Build request params
        $requestParams = array();
        if (empty($qHashtag)) {
            if (!empty($qFromDate)) {
                $requestParams['min_timestamp'] = $qFromDate->format('U');
            }
            if (!empty($qToDate)) {
                $requestParams['max_timestamp'] = $qToDate->format('U');
            }
        } else {
            if (!empty($qFromId)) {
                // Return media after this max ID
                $requestParams['max_tag_id'] = $qFromId;
            }
            if (!empty($qToId)) {
                // Return media before this min ID
                $requestParams['min_tag_id'] = $qToId;
            }
            if (!empty($qNumResults)) {
                $requestParams['count'] = $qNumResults;
            }
        }
        // Build request url
        if (empty($qHashtag)) {
            $requestUrl = 'media/search?';
        } else {
            $requestUrl = 'tags/' . urlencode($qHashtag) . '/media/recent?';
        }
        $requestUrl .= http_build_query(
            $requestParams,
            null,
            '&',
            PHP_QUERY_RFC3986
        );
        //throw new \Exception($requestUrl);
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

    /**
     * {@inheritdoc}
     */
    public function comment(ApiPostInterface $post, $comment)
    {
        throw new NotImplementedException();
    }
}

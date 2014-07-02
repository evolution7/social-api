<?php

namespace Evolution7\SocialApi\Service;

use Evolution7\SocialApi\Exception\NotImplementedException;
use Evolution7\SocialApi\ApiUser\TwitterUser;
use Evolution7\SocialApi\ApiPost\TwitterPost;
use Evolution7\SocialApi\ApiPost\ApiPostInterface;

class Twitter extends Service implements ServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getCurrentUser()
    {
        $libService = $this->getLibService();
        $requestUrl = 'account/verify_credentials.json';
        $responseRaw = $libService->request($requestUrl);
        return new TwitterUser($responseRaw);
    }

    /**
     * {@inheritdoc}
     */
    public function getPostById($id)
    {
        $libService = $this->getLibService();
        $requestUrl = 'statuses/show/' . $id . '.json';
        $responseRaw = $libService->request($requestUrl);
        return new TwitterPost($responseRaw);
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
        $qToId = $query->getToId();
        $qNumResults = $query->getNumResults();
        // Build search value
        $filters = array();
        if (!is_null($qHashtag)) {
            $filters[] = '#'.$qHashtag;
        }
        if (!is_null($qMedia)) {
            if (in_array('images', $qMedia)) {
                $filters[] = 'filter:images';
            }
            if (in_array('videos', $qMedia)) {
                $filters[] = 'filter:videos';
            }
        }
        // Build request params
        $requestParams = array('include_entities' => 'true');
        if (count($filters) > 0) {
            $requestParams['q'] = implode(' ', $filters);
        }
        if (!empty($qFromId)) {
            $requestParams['since_id'] = $qFromId;
        }
        if (!empty($qFromId)) {
            $requestParams['max_id'] = $qFromId;
        }
        if (!empty($qNumResults)) {
            $requestParams['count'] = $qNumResults;
        } else {
            $requestParams['count'] = 100;
        }
        // Build request url
        $requestUrl = 'search/tweets.json?'
            . http_build_query($requestParams, null, '&', PHP_QUERY_RFC3986);
        // Search api
        $responseRaw = $libService->request($requestUrl);
        $responseArray = json_decode($responseRaw, true);
        // Create return array
        $return = array();
        // Check if statuses exist
        if (array_key_exists('statuses', $responseArray)) {
            // Check if at least one statuses exists
            if (count($responseArray['statuses']) > 0) {
                // Loop statuses
                foreach ($responseArray['statuses'] as $status) {
                    // Create new TwitterPost object and add to return array
                    $return[] = new TwitterPost(json_encode($status));
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
        // Get post user
        $postUser = $post->getUser();
        // Check comment contains @mention
        if (strpos($comment, '@'.$postUser->getHandle()) === false) {
            // Invalid comment
            throw new Exception('Comment invalid - must @mention original post user');
        }
        // Get library service
        $libService = $this->getLibService();
        // Build request url
        $postData = array(
            'status' => $comment,
            'in_reply_to_status_id' => $post->getId()
            );
        $requestUrl = 'statuses/update.json?' . http_build_query($postData);
        // Call api
        $responseRaw = $libService->request($requestUrl, 'POST');
    }
}

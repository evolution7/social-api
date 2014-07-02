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
        // Build search value
        $filters = array();
        if (!is_null($query->getHashtag())) {
            $filters[] = '#'.$query->getHashtag();
        }
        if (!is_null($query->getMedia())) {
            if (in_array('images', $query->getMedia())) {
                $filters[] = 'filter:images';
            }
            if (in_array('videos', $query->getMedia())) {
                $filters[] = 'filter:videos';
            }
        }
        // Build request params
        $requestParams = array('include_entities' => 'true');
        if (count($filters) > 0) {
            $requestParams['q'] = implode(' ', $filters);
        }
        if (!is_null($query->getFromId())) {
            $requestParams['since_id'] = $query->getFromId();
        }
        if (!is_null($query->getToId())) {
            $requestParams['max_id'] = $query->getToId();
        }
        if (!is_null($query->getNumResults())) {
            $requestParams['count'] = $query->getNumResults();
        } else {
            $requestParams['count'] = 100;
        }
        // Build request url
        $requestUrl = 'search/tweets.json?' . http_build_query(
            $requestParams,
            null,
            '&',
            PHP_QUERY_RFC3986
        );
        // Search api
        $response = new Response($libService->request($requestUrl), 'json');
        // Parse response
        $parser = new TwitterParser($response);
        $parser->parseSearchResponse();
        return $parser->getPosts();
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

<?php

namespace Evolution7\SocialApi\Service;

use Evolution7\SocialApi\Service\QueryInterface;
use Evolution7\SocialApi\Entity\User;
use Evolution7\SocialApi\Entity\Post;
use Evolution7\SocialApi\Response\Response;
use Evolution7\SocialApi\Parser\TwitterParser;
use Evolution7\SocialApi\Exception\NotImplementedException;
use Evolution7\SocialApi\Exception\HttpUnauthorizedException;

class Twitter extends Service implements ServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getCurrentUser()
    {
        $libService = $this->getLibService();
        $requestUrl = 'account/verify_credentials.json';
        try {
            $response = new Response($libService->request($requestUrl));
        } catch (\Exception $e) {
            $this->propogateException($e);
        }
        $parser = new TwitterParser($response);
        $parser->parseAccountVerifyCredentials();
        return $parser->getFirstUser();
    }

    /**
     * {@inheritdoc}
     */
    public function getPostById($id)
    {
        $libService = $this->getLibService();
        $requestUrl = 'statuses/show/' . $id . '.json';
        try {
            $response = new Response($libService->request($requestUrl));
        } catch (\Exception $e) {
            $this->propogateException($e);
        }
        $parser = new TwitterParser($response);
        $parser->parseStatusesShow();
        return $parser->getFirstPost();
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
        if (!is_null($query->getFrom())) {
            $requestParams['since_id'] = $query->getFrom()->getId();
        }
        if (!is_null($query->getTo())) {
            $requestParams['max_id'] = $query->getTo()->getId();
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
        try {
            $response = new Response($libService->request($requestUrl), 'json');
        } catch (\Exception $e) {
            $this->propogateException($e);
        }
        // Parse response
        $parser = new TwitterParser($response);
        $parser->parseSearchTweets();
        return $parser->getPosts();
    }

    /**
     * {@inheritdoc}
     */
    public function comment(Post $post, $comment)
    {
        // Get post user
        $postUser = $post->getUser();
        // Check comment not empty
        if (empty($comment)) {
            throw new \Exception('Comment invalid - cannot be empty');
        }
        // Check comment contains @mention
        if (strpos($comment, '@'.$postUser->getHandle()) === false) {
            // Invalid comment
            throw new \Exception('Comment invalid - must @mention original post user');
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
        try {
            $response = new Response($libService->request($requestUrl, 'POST'));
        } catch (\Exception $e) {
            $this->propogateException($e);
        }
        return $response;
    }

    /**
     * Propogate Exception
     *
     * @param \Exception $exception
     */
    protected function propogateException($exception)
    {
        // Check if we should throw a custom exception
        if (strpos($exception->getMessage(), 'HTTP/1.1 401 Unauthorized') !== false) {
            throw new HttpUnauthorizedException($exception->getMessage());
        } else {
            throw new \Exception($exception->getMessage());
        }
    }
}

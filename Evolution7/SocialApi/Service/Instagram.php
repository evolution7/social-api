<?php

namespace Evolution7\SocialApi\Service;

use Evolution7\SocialApi\Service\QueryInterface;
use Evolution7\SocialApi\Entity\User;
use Evolution7\SocialApi\Entity\Post;
use Evolution7\SocialApi\Response\Response;
use Evolution7\SocialApi\Parser\InstagramParser;
use Evolution7\SocialApi\Exception\NotImplementedException;
use Evolution7\SocialApi\Exception\HttpUnauthorizedException;

class Instagram extends Service implements ServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getCurrentUser()
    {
        $libService = $this->getLibService();
        $requestUrl = 'users/self';
        try {
            $response = new Response($libService->request($requestUrl));
        } catch (\Exception $e) {
            $this->propogateException($e);
        }
        $parser = new InstagramParser($response);
        $parser->parseUsersSelf();
        return $parser->getFirstUser();
    }

    /**
     * {@inheritdoc}
     */
    public function getPostById($id)
    {
        $libService = $this->getLibService();
        $requestUrl = 'media/' . $id;
        try {
            $response = new Response($libService->request($requestUrl));
        } catch (\Exception $e) {
            $this->propogateException($e);
        }
        $parser = new InstagramParser($response);
        $parser->parseMedia();
        return $parser->getFirstPost();
    }

    /**
     * {@inheritdoc}
     */
    public function search(QueryInterface $query)
    {
        // Get library service
        $libService = $this->getLibService();
        // Build request params
        $requestParams = array();
        $qFrom = $query->getFrom();
        $qTo = $query->getTo();
        if (is_null($query->getHashtag())) {
            if (!empty($qFromDate)) {
                $requestParams['min_timestamp'] = $qFrom->getCreated();
            }
            if (!empty($qToDate)) {
                $requestParams['max_timestamp'] = $qTo->getCreated();
            }
        } else {
            if (!is_null($qFrom)) {
                // Return media before/newer than this min ID
                $paginationId = $qFrom->getPaginationId();
                $paginationId = is_null($paginationId) ? $qFrom->getId() : $paginationId;
                $requestParams['min_tag_id'] = $paginationId;
            }
            if (!is_null($qTo)) {
                // Return media after/older than this max ID
                $paginationId = $qTo->getPaginationId();
                $paginationId = is_null($paginationId) ? $qTo->getId() : $paginationId;
                $requestParams['max_tag_id'] = $qTo->getPaginationId();
            }
            if (!is_null($query->getNumResults())) {
                $requestParams['count'] = $query->getNumResults();
            }
        }
        // Build request url
        if (is_null($query->getHashtag())) {
            $requestUrl = 'media/search?';
            $parseMethod = 'parseMediaSearch';
        } else {
            $requestUrl = 'tags/' . urlencode($query->getHashtag()) . '/media/recent?';
            $parseMethod = 'parseTagsMediaRecent';
        }
        $requestUrl .= http_build_query(
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
        $parser = new InstagramParser($response);
        $parser->$parseMethod();
        $posts = $parser->getPosts();
        // Filter posts
        $filteredPosts = array();
        if (!is_null($query->getMedia())) {
            $mediaTypes = array();
            foreach ($query->getMedia() as $media) {
                switch ($media) {
                    case 'images':
                        $mediaTypes[] = 'image';
                        break;
                    case 'videos':
                        $mediaTypes[] = 'video';
                        break;
                }
            }
            foreach ($posts as $i => $post) {
                if (in_array($post->getMediaType(), $mediaTypes)) {
                    $filteredPosts[$i] = $post;
                }
            }
        } else {
            $filteredPosts = $posts;
        }
        return $filteredPosts;
    }

    /**
     * {@inheritdoc}
     */
    public function comment(Post $post, $comment)
    {
        // Get library service
        $libService = $this->getLibService();
        // Build request url/body
        $requestUrl = 'media/' . $post->getId() . '/comments';
        $requestBody = array(
            'text' => $comment,
            );
        // Call api
        try {
            $response = new Response($libService->request($requestUrl, 'POST', $requestBody));
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
        if (strpos($exception->getMessage(), 'HTTP/1.1 400 BAD REQUEST') !== false) {
            throw new HttpUnauthorizedException($exception->getMessage());
        } else {
            $exceptionClass = get_class($exception);
            throw new $exceptionClass($exception->getMessage());
        }
    }
}

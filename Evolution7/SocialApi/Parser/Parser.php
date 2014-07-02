<?php

namespace \Evolution7\SocialApi\Parser;

use \Evolution7\SocialApi\Response\ResponseInterface;

/**
 * Base class for all API parsers
 */
abstract class Parser
{
    protected $response;
    protected $users;
    protected $posts;

    /**
     * Constructor
     *
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
        $this->users = array();
        $this->posts = array();
    }

    /**
     * Get users
     *
     * @return array $users
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Get posts
     *
     * @return array $posts
     */
    public function getPosts()
    {
        return $this->posts;
    }
}

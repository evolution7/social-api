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
     * Get first user
     *
     * @return \Evolution7\SocialApi\Entity\User
     */
    public function getFirstUser()
    {
        if (count($this->users) > 0) {
            $usersKeys = array_keys($this->users);
            return $this->users[$usersKeys[0]];
        } else {
            return null;
        }
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

    /**
     * Get first post
     *
     * @return \Evolution7\SocialApi\Entity\Post
     */
    public function getFirstPost()
    {
        if (count($this->posts) > 0) {
            $postsKeys = array_keys($this->posts);
            return $this->posts[$postsKeys[0]];
        } else {
            return null;
        }
    }
}

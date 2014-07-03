<?php

namespace Evolution7\SocialApi\Parser;

use \Evolution7\SocialApi\Response\ResponseInterface;

/**
 * Base class for all API parsers
 */
abstract class Parser
{
    protected $response;
    protected $users;
    protected $posts;
    protected $paginationId;

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
        if (is_array($this->users) && count($this->users) > 0) {
            return reset($this->users);
        } else {
            return null;
        }
    }

    /**
     * Get last user
     *
     * @return \Evolution7\SocialApi\Entity\User
     */
    public function getLastUser()
    {
        if (is_array($this->users) && count($this->users) > 0) {
            return end($this->users);
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
        if (is_array($this->posts) && count($this->posts) > 0) {
            return reset($this->posts);
        } else {
            return null;
        }
    }

    /**
     * Get last post
     *
     * @return \Evolution7\SocialApi\Entity\Post
     */
    public function getLastPost()
    {
        if (is_array($this->posts) && count($this->posts) > 0) {
            return end($this->posts);
        } else {
            return null;
        }
    }

    /**
     * Get pagination id
     *
     * @return int
     */
    public function getPaginationId()
    {
        return $this->paginationId;
    }

    /**
     * Get field value or null if field does not exist
     *
     * @param string $key
     * @param array  $array
     *
     * @return mixed
     */
    protected function getArrayValue($key, $array)
    {

        // Make key an array if string given
        if (!is_array($key)) {
            $key = array($key);
        }

        // Iterate over key dimensions and check key exists
        $dimensions = count($key);
        for ($iArray = $array, $i = 0; $i < $dimensions; ++$i) {
            $iKey = $key[$i];
            if (!is_array($iArray) || !array_key_exists($iKey, $iArray)) {
                return null;
            }
            $iArray = $iArray[$iKey];
        }

        // Return
        return $iArray;

    }
}

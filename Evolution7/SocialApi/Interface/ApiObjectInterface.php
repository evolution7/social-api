<?php
namespace Evolution7\SocialApi\Interface;

interface ApiObjectInterface
{
    /**
     * Returns the unique identifier
     *
     * @throws \Evolution7\SocialApi\Exception\NotImplementedException;
     * @throws \Evolution7\SocialApi\Exception\NotSupportedByAPIException;
     * @return string
     */
    public function getIdentifier();

    /**
     *
     * @throws \Evolution7\SocialApi\Exception\NotImplementedException;
     * @throws \Evolution7\SocialApi\Exception\NotSupportedByAPIException;
     */
    public function getUri();

    /**
     *
     * @throws \Evolution7\SocialApi\Exception\NotImplementedException;
     * @throws \Evolution7\SocialApi\Exception\NotSupportedByAPIException;
     */
    public function getMediaUri();

    /**
     * Comment on the object
     *
     * @throws \Evolution7\SocialApi\Exception\NotImplementedException;
     * @throws \Evolution7\SocialApi\Exception\NotSupportedByAPIException;
     * @param string $message
     */
    public function comment($message);

    /**
     * Returns the official API object instance
     *
     * This method should be used as sparingly as possible, but sometimes
     * a functionality might be needed that is specific to a service.
     * @throws \Evolution7\SocialApi\Exception\NotImplementedException;
     * @return \Object
     */
    public function getOriginalObject();

    /**
     * Returns the original API result as a JSON object
     *
     * This method should be used as sparingly as possible, but sometimes
     * a functionality might be needed that is specific to a service.
     * @throws \Evolution7\SocialApi\Exception\NotImplementedException;
     * @return string json
     */
    public function getOriginalJSON();
}

<?php
namespace Evolution7\SocialApi\Interface;

interface ApiInterface
{
    /**
     * Search for a value through the API
     *
     * @param string $searchTerm
     * @throws \Evolution7\SocialApi\Exception\NotImplementedException;
     * @throws \Evolution7\SocialApi\Exception\NotSupportedByAPIException;
     * @return array of ApiObjectInterface instances
     */
    public function search($searchTerm);

    /**
     * Post a comment on a provided object
     *
     * @param string $objectId the unique identifier of the object
     * @param string $objectType the type of object
     * @param string $message the message that needs to be sent
     * @throws \Evolution7\SocialApi\Exception\NotImplementedException;
     * @throws \Evolution7\SocialApi\Exception\NotSupportedByAPIException;
     * @return boolean
     */
    public function comment($objectId, $objectType, $message);

    /**
     * Sends a message to a user
     *
     * @param string $userId The unique identifier of a user on the service
     * @param string $message The message that needs to be sent
     * @throws \Evolution7\SocialApi\Exception\NotImplementedException;
     * @throws \Evolution7\SocialApi\Exception\NotSupportedByAPIException;
     * @return boolean
     */
    public function message($userId, $message);

    /**
     * Returns the official API interface instance
     *
     * This method should be used as sparingly as possible, but sometimes
     * a functionality might be needed that is specific to a service.
     * @throws \Evolution7\SocialApi\Exception\NotImplementedException;
     * @return \Object
     */
    public function getOriginalApi();
}

<?php

use \Evolution7\SocialApi\Service\ServiceFactory;
use \Evolution7\SocialApi\Token\RequestToken;

require_once(dirname(dirname(dirname(dirname(__DIR__)))).'/vendor/autoload.php');

session_start();

// Example configuration
require_once('config.php');

// Get service
$service = ServiceFactory::get($config);

// Check oauth response parameters
if (array_key_exists('oauth_token', $_GET) || array_key_exists('code', $_GET)) {
    
    // Create request token instance
    $requestToken = new RequestToken(
        $_SESSION['request_token']['token'],
        $_SESSION['request_token']['secret']
    );

    // Retrieve access token from service provider API
    try {
        $accessToken = $service->getAuthAccess(
            $requestToken,
            $_GET['oauth_token'],
            $_GET['oauth_verifier'],
            $_GET['code']
        );
    } catch (\Exception $e) {
        echo '$service->getAuthAccess() Exception:<br />';
        echo $e->getMessage();
        exit();
    }

    // Persist access token
    $_SESSION['access_token'] = array(
        'token' => $accessToken->getToken(),
        'secret' => $accessToken->getSecret()
    );

    // Clear request token from session
    $_SESSION['request_token'] = null;
    
    // Authentication complete - redirect to another page
    session_write_close();
    header('Location: http://www.example.com');
    exit();

} else {
    
    // Generate request token via service provider API
    try {
        $requestToken = $service->getAuthRequest();
    } catch (\Exception $e) {
        echo '$service->getAuthRequest() Exception:<br />';
        echo $e->getMessage() . '<br />';
        echo 'Check your API key/secret in config.php';
        exit();
    }

    // Persist request token to session
    $_SESSION['request_token'] = array(
        'token' => $requestToken->getToken(),
        'secret' => $requestToken->getSecret()
    );
    
    // Redirect user to service provider URL
    session_write_close();
    header('Location: ' . $requestToken->getRedirectUrl());
    exit();

}

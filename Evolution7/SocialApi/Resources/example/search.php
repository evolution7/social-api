<?php

namespace Evolution7\SocialApi\Resources\example;

use \Evolution7\SocialApi\Service\ServiceFactory;
use \Evolution7\SocialApi\Token\AccessToken;

require_once(dirname(dirname(dirname(dirname(__DIR__)))).'/vendor/autoload.php');

session_start();

// Example configuration
require_once('config.php');

// Check if user authenticated
if (!array_key_exists('access_token', $_SESSION)) {

    // Authenticate
    header('Location: authentication.php');
    exit();

}

// Get service
$service = ServiceFactory::get($config);

// Create access token instance
$accessToken = new AccessToken(
    $_SESSION['access_token']['token'],
    $_SESSION['access_token']['secret']
);

// Build search query
$query = Query::create()
    ->filterByHashtag('#worldcup')
    ->filterImages();

// Make API request
try {
    $result = $service->search($query);
} catch (\Exception $e) {
    $result = $e->getMessage();
}

// Output result
var_dump($result);

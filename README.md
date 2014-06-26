# API classes for integrating with social networks

This project is meant to provide API access through standardised objects/classes to various social networks.

# Installation

Through Composer.
```
    "repositories": [
        {
            "type": "vcs",
            "url": "git@bitbucket.org:evolution7/social_api.git"
        }
    ]
    "require": {
        "evolution7/social-api": "dev-master"
    }
```

# Supported Social networks

## Twitter

To get Twitter integration working:

1. Create an app [here](https://apps.twitter.com/)
2. Under app **settings**, make sure:
    * The `Callback URL` field has some value
    * The checkbox for `Allow this application to be used to Sign in with Twitter` is checked
3. Generate an API key

## Instagram

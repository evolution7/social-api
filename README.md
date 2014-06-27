# Social Network API Abstraction Library

This library provide an abstracted API for accessing various social networks.

Platforms:

* Twitter
* Instagram

Functionality:

* *Social Login (pending)*
* *Post Search/Retrieval (pending)*

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

# Setup

## Twitter

To setup Twitter integration:

1. Click `Create New App` [here](https://apps.twitter.com/)
2. Make sure:
    * The `Callback URL` field has some value
3. Create the new App
4. Go to `Settings` and make sure:
    * The checkbox for `Allow this application to be used to Sign in with Twitter` is checked
    * Click `Update settings` to save changes
5. Go to `API Keys`. Generate an API key if one does not exist.
6. Update your configuration with:
    * Key = `API key`
    * Secret = `API secret`

## Instagram

To setup Instagram integration:

1. Click `Register a New Client` [here](http://instagram.com/developer/clients/manage/).
2. Make sure:
    * The `OAuth redirect_uri` field matches the **EXACT** redirect URL
3. Register the new Client
4. Update your configuration with:
    * Key = `Client ID`
    * Secret = `Client Secret`

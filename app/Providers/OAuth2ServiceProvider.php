<?php

namespace Pocket\Providers;

use Illuminate\Support\ServiceProvider;
use Pocket\OAuth2\Eloquent;
use OAuth2\Server;
use OAuth2\GrantType\UserCredentials;
use OAuth2\GrantType\RefreshToken;

class OAuth2ServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('oauth2', function ($app) {

            $storage = new Eloquent();

            $server = new Server($storage, array(
                'refresh_token_lifetime'         => 31104000
            ));

            $server->addGrantType(new UserCredentials($storage));
            $server->addGrantType(new RefreshToken($storage, array(
                'always_issue_new_refresh_token' => true,
            )));

            return $server;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['oauth2'];
    }
}

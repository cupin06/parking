<?php

namespace Pocket\Providers;

use Illuminate\Support\ServiceProvider;
use OAuth2\Storage\Pdo;
use Pocket\OAuth2\Eloquent;
use OAuth2\Server;
use OAuth2\GrantType\UserCredentials;

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


            $storage = new Eloquent(app('db')->getPdo(), ['user_table' => 'users']);

            $server = new Server($storage);

            $server->addGrantType(new UserCredentials($storage));

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

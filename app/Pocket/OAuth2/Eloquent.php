<?php

namespace Pocket\OAuth2;

use Pocket\User;

class Eloquent extends \OAuth2\Storage\Pdo
{

    /**
     * Create new instance of Eloquent wrapper for OAuth2 server
     */
    public function __construct()
    {
        parent::__construct(app('db')->getPdo(), ['user_table' => 'users']);
    }

    /**
     * Validate if the user credential matches
     *
     * @param User $user
     * @param $password
     * @return boolean
     */
    protected function checkPassword($user, $password)
    {
        return app('auth')->validate(['email' => $user['email'], 'password' => $password]);
    }

    /**
     * Get user information related to this email
     *
     * @param $email
     * @return array|bool
     */
    public function getUser($email)
    {

        $user = User::where('email', $email)->first();

        if (!$user) {
            return false;
        }

        // the default behavior is to use "email" as the user_id
        return array_merge(['user_id' => $email], $user->toArray());
    }
}
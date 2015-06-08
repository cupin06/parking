<?php

namespace Pocket\OAuth2;

use Pocket\User;

class Eloquent extends \OAuth2\Storage\Pdo
{

    public function __construct()
    {
        parent::__construct(app('db')->getPdo(), ['user_table' => 'users']);
    }

    protected function checkPassword($user, $password)
    {
        return app('auth')->validate(['email' => $user['email'], 'password' => $password]);
    }

    public function getUser($email)
    {

        $userInfo = User::where('email', $email)->first()->toArray();

        if (!$userInfo) {
            return false;
        }

        // the default behavior is to use "username" as the user_id
        return array_merge(array(
            'user_id' => $email
        ), $userInfo);
    }
}
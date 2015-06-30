<?php

namespace Pocket\Http\Controllers\Api;

use Pocket\Api\Token\TokenRepository;
use Pocket\Http\Controllers\Controller;

class TokenController extends Controller
{

    /**
     * Get Refresh Token using Access Token
     *
     * @param TokenRepository $tokenRepository
     * @param $accessToken
     * @return string
     */
    public function getRefreshToken(TokenRepository $tokenRepository, $accessToken)
    {

        return $tokenRepository->getRefreshToken($accessToken);

    }

}
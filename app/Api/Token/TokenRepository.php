<?php

namespace Pocket\Api\Token;

class TokenRepository
{

    private $accessTokenModel;

    /**
     * Default Constructor. Inject Access Token and Refresh Token Model
     *
     * @param AccessToken $accessTokenModel
     * @param RefreshToken $refreshTokenModel
     */
    public function __construct(AccessToken $accessTokenModel, RefreshToken $refreshTokenModel)
    {
        $this->accessTokenModel = $accessTokenModel;
    }

    /**
     * Get Refresh Token using Access Token
     *
     * @param $accessToken
     * @return string
     */
    public function getRefreshToken($accessToken)
    {
        $data = $this->accessTokenModel->with('refreshToken')->where('access_token', $accessToken)->get();

        foreach($data as $key => $refreshToken) {
            return json_encode(['refresh_token' => $refreshToken->refreshToken['refresh_token']]);
        }
    }
}
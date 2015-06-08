<?php

namespace Pocket\Http\Controllers\Auth;

use Pocket\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OAuth2\HttpFoundationBridge\Request as OAuthRequest;
use OAuth2\HttpFoundationBridge\Response;

class OAuth2Controller extends Controller
{

    /**
     * Generate Access Token
     *
     * @param Request $request
     * @return mixed
     */
    public function token(Request $request)
    {

        $bridgedRequest = OAuthRequest::createFromRequest($request->instance());
        $bridgedResponse = new Response();
        return app('oauth2')->handleTokenRequest($bridgedRequest, $bridgedResponse);
    }
}
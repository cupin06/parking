<?php

namespace Pocket\Http\Middleware;

use Closure;
use OAuth2\HttpFoundationBridge\Request as OAuthRequest;
use OAuth2\HttpFoundationBridge\Response as OAuthResponse;

class OAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $bridgedRequest = OAuthRequest::createFromGlobals();
        $bridgedResponse = new OAuthResponse();

        if (app('oauth2')->verifyResourceRequest($bridgedRequest, $bridgedResponse)) {

            return $next($request);

        } else {
            return \Response::json(array(
                'error' => 'Unauthorized'
            ), $bridgedResponse->getStatusCode());
        }
    }
}

<?php

namespace Pocket\Api\Token;

use Illuminate\Database\Eloquent\Model;

class AccessToken extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'oauth_access_tokens';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * Eloquent relationship. every Access Token has one Refresh Token
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function refreshToken()
    {
        return $this->hasOne('Pocket\Api\Token\RefreshToken', 'user_id', 'user_id');
    }


}
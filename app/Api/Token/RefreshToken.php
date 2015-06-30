<?php

namespace Pocket\Api\Token;

use Illuminate\Database\Eloquent\Model;

class RefreshToken extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'oauth_refresh_tokens';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * Eloquent Relationship. Every Refresh Token belongs to Access Token
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function accessToken()
    {
        return $this->belongsTo('Pocket\Api\Token\AccessToken');
    }

}
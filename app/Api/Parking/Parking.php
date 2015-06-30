<?php

namespace Pocket\Api\Parking;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'parking';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['vehicle_id', 'user_id', 'hours', 'minutes', 'latitude', 'longitude', 'price', 'payment_status', 'status', 'start_time', 'end_time'];

    /**
     * Eloquent Relationship. Each Parking belongs to vehicle
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicles() {

        return $this->belongsTo('Pocket\Api\Vehicle\Vehicle', 'vehicle_id', 'id');

    }

}
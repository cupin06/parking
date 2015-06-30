<?php

namespace Pocket\Api\Vehicle;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vehicles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'plate_no', 'manufacturer', 'model', 'color'];

    /**
     * Eloquent Relationship. Each parking have many vehicles
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parking()
    {
        return $this->hasMany('Pocket\Api\Parking\Parking', 'vehicle_id', 'vehicle_id');
    }
}
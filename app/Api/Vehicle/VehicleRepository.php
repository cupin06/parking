<?php

namespace Pocket\Api\Vehicle;

class VehicleRepository
{
    private $vehicleModel;

    /**
     * Default Constructor. Inject Vehicle Model
     *
     * @param Vehicle $vehicleModel
     */
    public function __construct(Vehicle $vehicleModel)
    {
        $this->vehicleModel = $vehicleModel;
    }

    /**
     * Get all Vehicle Information using Vehicle Model
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->vehicleModel->all();
    }
}
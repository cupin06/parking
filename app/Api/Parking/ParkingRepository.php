<?php

namespace Pocket\Api\Parking;

class ParkingRepository
{

    private $parkingModel;

    /**
     * Default Constructor. Inject Parking Model
     *
     * @param Parking $parkingModel
     */
    public function __construct(Parking $parkingModel)
    {
        $this->parkingModel = $parkingModel;
    }

    /**
     * Get all Parking Information using Parking Model
     *
     * @return mixed
     */
    public function getAll()
    {
        return $this->parkingModel->get();
    }

    /**
     * Get all Parking Information filter by parking status active
     *
     * @return mixed
     */
    public function getAllActive()
    {
        return $this->parkingModel->where('status',1)->get();
    }

    /**
     * Get all Parking Information filter by parking status inactive
     *
     * @return mixed
     */
    public function getAllInactive()
    {
        return $this->parkingModel->where('status',0)->get();
    }

    /**
     * Get all Parking Information for specific user
     *
     * @param $userID
     * @return mixed
     */
    public function getWithID($userID)
    {
        return $this->parkingModel->where('user_id', $userID)->get();
    }

    /**
     * Get all Parking Information for specific user filter by Parking Status active
     *
     * @param $userID
     * @return mixed
     */
    public function getWithIDActive($userID)
    {
        return $this->parkingModel->with('vehicles')->where('user_id', $userID)->where('status', 1)->first();
    }

    /**
     * Get all Parking Information for specific user filter by Parking status inactive
     *
     * @param $userID
     * @return mixed
     */
    public function getWithIDInactive($userID)
    {
        return $this->parkingModel->with('vehicles')->where('user_id', $userID)->where('status', 0)->get();
    }



}
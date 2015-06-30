<?php

namespace Pocket\Api\Parking;

class ParkingFactory
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
     * Create new parking information and save into database
     *
     * @param $input
     * @return static
     */
    public function create($input)
    {
        return $this->parkingModel->create([
            'user_id' => $input['user_id'],
            'vehicle_id' => $input['vehicle_id'],
            'hours' => $input['hours'],
            'minutes' => $input['minutes'],
            'latitude' => $input['latitude'],
            'longitude' => $input['longitude'],
            'price' => $input['price'],
            'payment_status' => $input['payment_status'],
            'status' => $input['status'],
            'start_time' => $input['start_time'],
            'end_time' => $input['end_time']
        ]);
    }

    /**
     * Update parking information for specific Parking using Parking ID
     *
     * @param $input
     * @param $id
     * @return mixed
     */
    public function update($input, $id)
    {
        return $this->parkingModel->where('id', $id)->update([

            'hours' => $input['hours'],
            'minutes' => $input['minutes'],
            'price' => $input['price'],
            'end_time' => $input['end_time']
        ]);
    }

    /**
     * Update parking status for specific Parking using Parking ID
     *
     * @param $input
     * @param $id
     * @return mixed
     */
    public function updateStatus($input, $id)
    {
        return $this->parkingModel->where('id', $id)->update([
            'status' => $input['status'],
        ]);
    }

    /**
     * Delete parking information from database using Parking ID
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->parkingModel->where('id', $id)->delete();
    }

}
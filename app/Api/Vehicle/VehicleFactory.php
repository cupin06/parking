<?php

namespace Pocket\Api\Vehicle;

class VehicleFactory
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
     * Store new Vehicle information into database
     *
     * @param $input
     * @return static
     */
    public function create($input)
    {
        return $this->vehicleModel->create([
            'user_id' => $input['user_id'],
            'plate_no' => $input['plate_no'],
            'manufacturer' => $input['manufacturer'],
            'model' => $input['model'],
            'color' => $input['color'],
        ]);

    }

    /**
     * Update specific Vehicle Information using Vehicle ID
     *
     * @param $input
     * @param $id
     * @return mixed
     */
    public function update($input, $id)
    {
        return $this->vehicleModel->where('id', $id)->update([
            'plate_no' => $input['plate_no'],
            'manufacturer' => $input['manufacturer'],
            'model' => $input['model'],
            'color' => $input['color'],
        ]);
    }

    /**
     * Delete specific Vehicle Information using Vehicle ID
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->vehicleModel->where('id', $id)->delete();
    }
}
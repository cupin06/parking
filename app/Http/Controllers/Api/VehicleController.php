<?php

namespace Pocket\Http\Controllers\Api;

use Illuminate\Http\Request;
use Pocket\Api\Vehicle\VehicleRepository;
use Pocket\Http\Controllers\Controller;
use Pocket\Api\Vehicle\VehicleFactory;

class VehicleController extends Controller
{
    private $vehicleFactory;

    /**
     * Default Constructor. Inject Vehicle Factory
     *
     * @param VehicleFactory $vehicleFactory
     */
    public function __construct(VehicleFactory $vehicleFactory)
    {
        $this->vehicleFactory = $vehicleFactory;
    }

    /**
     * Get all vehicle
     *
     * @param VehicleRepository $vehicleRepository
     * @return string
     */
    public function index(VehicleRepository $vehicleRepository)
    {
        return json_encode($vehicleRepository->getAll());
    }

    /**
     * Create new vehicle
     *
     * @param Request $request
     * @return string
     */
    public function create(Request $request)
    {

        $data = $this->vehicleFactory->create($request->all());

        if ($data) {

            $plateNo = $data['plate_no'];
            $manufacturer = $data['manufacturer'];
            $model = $data['model'];
            $color = $data['color'];
            $id = $data['id'];

            return json_encode(['status' => '1', 'status_message' => 'Successfully Add New Vehicle.', 'vehicle' => ['id' => $id,'plate_no' => $plateNo, 'manufacturer' => $manufacturer, 'model' => $model, 'color' => $color]]);
        }

        return json_encode(['status' => '0', 'status_message' => 'Failed To Add New Vehicle.']);
    }

    /**
     * Update vehicle information using Vehicle ID
     *
     * @param Request $request
     * @param $id
     * @return string
     */
    public function update(Request $request, $id)
    {
        $data = $this->vehicleFactory->update($request->all(), $id);

        if ($data) {
            return json_encode(['status' => $data, 'status_message' => 'Successfully Update Vehicle Details.']);
        }

        return json_encode(['status' => $data, 'status_message' => 'Failed To Update Vehicle Details']);
    }

    /**
     * Delete vehicle information using Vehicle ID
     *
     * @param $id
     * @return string
     */
    public function destroy($id)
    {
        $data = $this->vehicleFactory->delete($id);

        if ($data) {
            return json_encode(['status' => $data, 'status_message' => 'Successfully Delete Vehicle Details.']);
        }

        return json_encode(['status' => $data, 'status_message' => 'Failed To Delete Vehicle Details']);
    }

}
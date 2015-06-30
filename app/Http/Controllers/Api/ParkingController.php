<?php

namespace Pocket\Http\Controllers\Api;

use Illuminate\Http\Request;
use Pocket\Api\Parking\ParkingFactory;
use Pocket\Api\Parking\ParkingRepository;
use Pocket\Api\SMS\SMSRepository;
use Pocket\Api\Vehicle\VehicleRepository;
use Pocket\Http\Controllers\Controller;

class ParkingController extends Controller
{

    private $parkingFactory;

    private $parkingRepository;

    private $vehicleRepository;

    /**
     * Default Constructor. Inject Parking Factory and Parking Repository
     *
     * @param ParkingFactory $parkingFactory
     * @param ParkingRepository $parkingRepository
     * @param VehicleRepository $vehicleRepository
     */
    public function __construct(ParkingFactory $parkingFactory, ParkingRepository $parkingRepository, VehicleRepository $vehicleRepository)
    {
        $this->parkingFactory = $parkingFactory;
        $this->parkingRepository = $parkingRepository;
        $this->vehicleRepository = $vehicleRepository;
    }

    /**
     * Get All Parking  Information
     *
     * @return string
     */
    public function getAll()
    {
        $parkingInfo = $this->parkingRepository->getAll();

        return json_encode($parkingInfo);
    }

    /**
     * Get all Parking Information with Active Status
     *
     * @return string
     */
    public function getAllActive()
    {
        $parkingInfo = $this->parkingRepository->getAllActive();

        return json_encode($parkingInfo);
    }

    /**
     * Get all Parking Information with Inactive Status
     *
     * @return string
     */
    public function getAllInactive()
    {
        $parkingInfo = $this->parkingRepository->getAllInactive();

        return json_encode($parkingInfo);
    }

    /**
     * Get sll Parking Information for specific user using User ID
     *
     * @param $userID
     * @return string
     */
    public function getByID($userID)
    {
        $parkingInfo = $this->parkingRepository->getWithID($userID);

        return json_encode($parkingInfo);
    }

    /**
     * Get All Parking Information with Active Parking Status for specific User using User ID
     *
     * @param $userID
     * @return string
     */
    public function getByIDActive($userID)
    {
        $parkingInfo = $this->parkingRepository->getWithIDActive($userID);

        if ($parkingInfo) {
            return json_encode($parkingInfo);
        }

        return json_encode([]);
    }

    /**
     * Get All Parking Information with Inactive Parking Status for specific User using User ID
     *
     * @param $userID
     * @return string
     */
    public function getByIDInactive($userID)
    {
        $parkingInfo = $this->parkingRepository->getWithIDInactive($userID);

        if ($parkingInfo) {
            return json_encode($parkingInfo);
        }

        return json_encode([]);

    }

    /**
     * Store parking information into database
     *
     * @param Request $request
     * @param SMSRepository $SMSRepository
     * @return string
     */
    public function store(Request $request, SMSRepository $SMSRepository)
    {
        $parkingInfo = $this->parkingFactory->create($request->all());

        if ($parkingInfo) {

            $id = $parkingInfo['id'];
            $vehicleID = $parkingInfo['vehicle_id'];
            $userID = $parkingInfo['user_id'];
            $hours = $parkingInfo['hours'];
            $minutes = $parkingInfo['minutes'];
            $status = $parkingInfo['status'];
            $start_time = $parkingInfo['start_time'];
            $end_time = $parkingInfo['end_time'];
            $latitude = $parkingInfo['latitude'];
            $longitude = $parkingInfo['longitude'];
            $price = $parkingInfo['price'];

            $vehicleInfo = $this->vehicleRepository->getByID($vehicleID);

            $SMSRepository->newParkingMessage($parkingInfo, $vehicleInfo);

            return json_encode(['status' => '1', 'status_message' => 'Successfully paid parking.',
                'parking' => ['id' => $id, 'vehicle_id' => $vehicleID, 'user_id' => $userID, 'hours' => $hours, 'minutes' => $minutes, 'status' => $status, 'start_time' => $start_time, 'end_time' => $end_time, 'latitude' => $latitude, 'longitude' => $longitude, 'price' => $price]]);
        }

        return json_encode(['status' => '0', 'status_message' => 'Failed to pay parking.']);
    }

    /**
     * Update specific Parking Information using Parking ID
     *
     * @param Request $request
     * @param SMSRepository $SMSRepository
     * @param $id
     * @return string
     */
    public function update(Request $request, SMSRepository $SMSRepository, $id)
    {
        $parkingInfo = $this->parkingFactory->update($request->all(), $id);

        if ($parkingInfo) {

            $parkingInfoExtend = $this->parkingRepository->getWithParkingID($id);

            $SMSRepository->extendParkingMessage($request->all(), $parkingInfoExtend);

            return json_encode(['status' => $parkingInfo, 'status_message' => 'Successfully Extend Parking .']);
        }

        return json_encode(['status' => $parkingInfo, 'status_message' => 'Failed To Extend Parking ']);

    }

    /**
     * Update Parking Status using Parking ID
     *
     * @param Request $request
     * @param $id
     * @return string
     */
    public function updateStatus(Request $request, $id)
    {
        $parkingInfo = $this->parkingFactory->updateStatus($request->all(), $id);

        if ($parkingInfo) {
            return json_encode(['status' => $parkingInfo, 'status_message' => 'Successfully Update Parking Status.']);
        }

        return json_encode(['status' => $parkingInfo, 'status_message' => 'Failed To Update Parking Status']);

    }

    /**
     * Delete parking information from database using Parking ID
     *
     * @param $id
     * @return string
     */
    public function destroy($id)
    {

        $parkingInfo = $this->parkingFactory->delete($id);

        if ($parkingInfo) {

            return json_encode(['status' => $parkingInfo, 'status_message' => 'Successfully Delete Parking Information.']);
        }

        return json_encode(['status' => $parkingInfo, 'status_message' => 'Failed To Delete Parking Information']);

    }

}
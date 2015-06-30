<?php

namespace Pocket\Api\SMS;

use Aloha\Twilio\Twilio;
use Pocket\Api\Vehicle\VehicleRepository;

class SMSRepository
{
    private $twilio;

    /**
     * Default Constructor.
     */
    public function __construct()
    {
        $this->twilio = new Twilio(config('twilio.twilio.connections.twilio.sid'), config('twilio.twilio.connections.twilio.token'), config('twilio.twilio.connections.twilio.from'));
    }


    /**
     * SMS Message for New Parking
     *
     * @param $parkingInfo
     * @param $vehicleInfo
     */
    public function newParkingMessage($parkingInfo, $vehicleInfo)
    {
        $userID = $parkingInfo['user_id'];
        $hours = $parkingInfo['hours'];
        $minutes = $parkingInfo['minutes'];
        $start_time = $parkingInfo['start_time'];
        $end_time = $parkingInfo['end_time'];
        $price = $parkingInfo['price'];

        $vehicleNumber = $vehicleInfo['plate_no'];
        $vehicleManufacturer = $vehicleInfo['manufacturer'];
        $vehicleModel = $vehicleInfo['model'];
        $vehicleColor = $vehicleInfo['color'];

        $this->twilio->message('+60174862127', $userID . " paid RM" . $price . " for new parking" . ". Parking Start: " . $start_time . " Parking End: " . $end_time . ". Duration: " .
        $hours . " hours " . $minutes . " minutes. Vehicle: " . $vehicleManufacturer . " " . $vehicleModel . " " . $vehicleColor . " " . $vehicleNumber);
    }

    /**
     * SMS Message for Extend Parking
     *
     * @param $input
     * @param $parkingInfo
     */
    public function extendParkingMessage($input, $parkingInfo)
    {

        $extendHour = $input['extend_hours'];
        $extendMinute = $input['extend_minutes'];
        $extendPrice = $input['extend_price'];
        $userID = $parkingInfo['user_id'];
        $end_time = $parkingInfo['end_time'];
        $vehicleNumber = $parkingInfo->vehicles['plate_no'];
        $vehicleManufacturer = $parkingInfo->vehicles['manufacturer'];
        $vehicleModel = $parkingInfo->vehicles['model'];
        $vehicleColor = $parkingInfo->vehicles['color'];

        $this->twilio->message('+60174862127', $userID . " paid RM" . $extendPrice . " for extend parking. New Parking End: " . $end_time . ". Extend Parking duration is " .
            $extendHour . " hours " . $extendMinute . " minutes. " . "Vehicle: " . $vehicleManufacturer . " " . $vehicleModel . " " . $vehicleColor . " " . $vehicleNumber);
    }
}
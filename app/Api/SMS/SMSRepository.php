<?php

namespace Pocket\Api\SMS;

use Aloha\Twilio\Twilio;

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
     * Send SMS message using Nexmo API
     *
     * @param $parkingInfo
     */
    public function sendMessage($parkingInfo)
    {
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

        $this->twilio->message('+60174862127', $userID . " pay RM" . $price . " for the parking space. Parking duration start from " . $start_time . " until " . $end_time . ". The Parking duration is " .
        $hours . " hours " . $minutes . " minutes. The vehicle located at https://www.google.com/maps/@" . $latitude . "," . $longitude . ",16z");
    }
}
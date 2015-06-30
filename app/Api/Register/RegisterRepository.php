<?php
namespace Pocket\Api\Register;

use Illuminate\Support\Facades\Validator;

class RegisterRepository
{

    /**
     * Check if Email exist in database from Users table
     *
     * @param null $input
     * @return string
     */
    public function checkEmailExist($input = null)
    {
        // Must not already exist in the `email` column of `users` table
        $rules = ['email' => 'unique:users,email'];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return json_encode(["registration_status" => 0, "registration_message" => "The email has already been taken."]);
        }
    }
}
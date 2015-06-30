<?php
namespace Pocket\Api\Register;

use Pocket\User;

class RegisterFactory
{
    private $userModel;

    /**
     * Default Constructor. Load User Model
     *
     * @param User $userModel
     */
    public function __construct(User $userModel)
    {
            $this->userModel = $userModel;
    }

    /**
     * Store New User into database
     *
     * @param $input
     * @return string
     */
    public function createUser($input)
    {
        $user = $this->userModel->create([
            'name' => $input['fullname'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
        ]);

        if ($user) {
            return json_encode(["registration_status" => 1, "registration_message" => "Registration Successful"]);
        }

        return json_encode(["registration_status" => 0, "registration_message" => "Registration Failed"]);
    }
}
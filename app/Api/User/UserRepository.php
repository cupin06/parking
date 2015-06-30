<?php

namespace Pocket\Api\User;

use Pocket\User;

class UserRepository
{
    private $userModel;

    /**
     * Default Constructor. Inject User Model
     *
     * @param User $userModel
     */
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    /**
     * Get All User Information from database
     *
     * @return mixed
     */
    public function getUserInfoAll()
    {
        return $this->userModel->select(['id', 'email', 'name'])->get();
    }

    /**
     * Get User information using Email
     *
     * @param $email
     * @return mixed
     */
    public function getUserInfoWithEmail($email)
    {
        return $this->userModel->where('email', $email)->get();
    }

}
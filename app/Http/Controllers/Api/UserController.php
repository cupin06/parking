<?php

namespace Pocket\Http\Controllers\Api;

use Pocket\Api\User\UserRepository;
use Pocket\Http\Controllers\Controller;

class UserController extends Controller
{

    private $userRepository;

    /**
     * Default Constructor. Inject User Repository
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Get all user information
     *
     * @return string
     */
    public function getAll()
    {
        return json_encode($this->userRepository->getUserInfoAll());
    }

    /**
     * Get specific user information using Email Address
     *
     * @param $email
     * @return string
     */
    public function getByEmail($email)
    {
        return json_encode($this->userRepository->getUserInfoWithEmail($email));
    }

}
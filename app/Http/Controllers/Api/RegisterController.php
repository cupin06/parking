<?php
namespace Pocket\Http\Controllers\Api;

use Illuminate\Http\Request;
use Pocket\Api\Register\RegisterFactory;
use Pocket\Http\Controllers\Controller;
use Pocket\Api\Register\RegisterRepository;


class RegisterController extends Controller
{
    /**
     * Store New User into database
     *
     * @param RegisterFactory $registerFactory
     * @param RegisterRepository $registerRepository
     * @param Request $request
     * @return string
     */
    public function create(RegisterFactory $registerFactory, RegisterRepository $registerRepository, Request $request)
    {
        $emailExist = $registerRepository->checkEmailExist($request->all());

        if ($emailExist) {
            return $emailExist;
        }

        return $registerFactory->createUser($request->all());
    }
}
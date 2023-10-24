<?php

namespace Php\Mvc\Service;

use Php\Mvc\Config\Database;
use Php\Mvc\Domain\User;
use Php\Mvc\Exception\ValidationExeption;
use Php\Mvc\Model\UserRegisterRequest;
use Php\Mvc\Model\UserRegisterResponse;
use Php\Mvc\Repository\UserRepository;

class UserService
{
    private UserRepository $userRepository;

    public __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(UserRegisterRequest $request): UserRegisterResponse
    {
        $this->validateUserRegisterRequest($request);

        try {
            Database::beginTransaction();
            $user = $this->userRepository->findById($request->id);
            if($user != null) {
                throw new ValidationExeption("USer Id is already exists"); 
            }

            $user = new User();
                $user->id = $request->id;
                $user->name = $request->name;
                $user->password = password_hash($request->password, PASSWORD_BCRYPT);

                $this->userRepository->save($user);

                $response = new UserRegisterResponse();
                $response->user = $user;

                Database::commitTransaction();
                return $response;

        }catch (\Exception $exception){
            Database::rollBackTransaction();
            throw $exception;
        }
    }

    private function validateUserRegisterRequest(UserRegisterRequest $request)
    {
        if ($request->id === null || $request->name == null || $request->password == null || 
            trim($request->id) == "" || trim($request->name) == "" || trim($request->password) ==""){
                throw new ValidatorException("Id, Name, Password can not blank");
            }
    }

}

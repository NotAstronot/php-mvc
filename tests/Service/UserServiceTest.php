<?php

namespace Php\Mvc\Service;

use Php\Mvc\Config\Database;
use Php\Mvc\Exception\ValidationExeption;
use PHPUnit\Framework\TestCase;
use Php\Mvc\Repository\UserRepository;
use Php\Mvc\Model\UserRegisterRequest;

class UserServiceTest extends TestCase
{
    private UserService $userService;
    private UserRepository $userRepository;


    protected function setUp(): void
    {
        $connection = Database::getConnection();
        $this->userRepository = new UserRepository($connection);
        $this->userService = new UserService($this->userRepository);

        $this->userRepository->deleteAll();
    }

    public function testRegisterSucces()
    {
        $request = new UserRegisterRequest();
        $request->id = "Not";
        $request->name = "Astronot";
        $request->password = "rahasia";

        $response = $this->userService->register($request);

        self::assertEquals($request->id, $response->user->id);
        self::assertEquals($request->name, $response->user->name);
        self::assertNotEquals($request->password, $response->user->password);

        self::assertTrue(password_verify($request->password, $response->user->password));
    }

    public function testRegisterFailed()
    {
        $this->expectException(ValidationExeption::class);
        $request = new UserRegisterRequest();
        $request->id = "";
        $request->name = "";
        $request->password = "";

        $this->userService->register($request);
    }

    public function testRegisterDuplicate()
    {
        $user = new User();
        $user->id = "Not";
        $user->name = "Astronot";
        $user->password = "rahasia";

        $this->userRepository->save($user);

        $this->expectException(ValidationExeption::class);

        $request = new UserRegisterRequest();
        $request->id = "Not";
        $request->name = "Astronot";
        $request->password = "rahasia";

        $response = $this->userService->register($request);
    }
}

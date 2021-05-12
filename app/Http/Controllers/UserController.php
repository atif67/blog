<?php


namespace App\Http\Controllers;


use App\Http\Requests\Admin\UserCreateRequest;
use App\Http\Requests\Admin\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Interfaces\UserInterface;

class UserController extends Controller
{
    protected $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function loginView()
    {
        return $this->userInterface->loginView();
    }

    public function login(UserLoginRequest $request)
    {
        return $this->userInterface->login($request);
    }

    public function registerView()
    {
        return $this->userInterface->registerView();
    }

    public function register(UserRegisterRequest $request)
    {
        return $this->userInterface->register($request);
    }

    public function get()
    {
        return $this->userInterface->get();
    }

    public function updateProfileView()
    {
        return $this->userInterface->updateProfileView();
    }

    public function updateProfile(UserUpdateRequest $request)
    {
        return $this->userInterface->updateProfile($request);
    }

}

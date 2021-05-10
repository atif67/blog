<?php


namespace App\Http\Controllers;


use App\Http\Requests\UserUpdateRequest;
use App\Interfaces\UserInterface;

class UserController extends Controller
{
    protected $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function get()
    {
        return $this->userInterface->get();
    }

    public function profile()
    {
        return $this->userInterface->profile();
    }

    public function updateProfile(UserUpdateRequest $request)
    {
        return $this->userInterface->updateProfile($request);
    }

}

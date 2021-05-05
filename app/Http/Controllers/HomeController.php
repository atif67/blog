<?php

namespace App\Http\Controllers;

use App\Interfaces\HomeInterface;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $homeInterface;

    public function __construct(HomeInterface $homeInterface)
    {
        $this->homeInterface = $homeInterface;
    }

    public function get()
    {
        return $this->homeInterface->get();
    }

    public function postDetail($slug)
    {
        return $this->homeInterface->postDetail($slug);
    }
}

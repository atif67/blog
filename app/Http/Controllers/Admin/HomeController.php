<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function get()
    {
        if (Auth::user()->role_id == 4)
        {
            return abort(404);
        }

        return view('admin.index');
    }
}

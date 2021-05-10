<?php


namespace App\Repositories;


use App\Http\Requests\UserUpdateRequest;
use App\Interfaces\UserInterface;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserInterface
{

    public function get()
    {
        // TODO: Implement get() method.
        $posts = Post::where('user_id', Auth::id())->orderBy('id','desc')->paginate(20);
        return view('users.profile.index')->with(['posts' => $posts]);
    }

    public function profile()
    {
        // TODO: Implement profile() method.
    }

    public function updateProfile(UserUpdateRequest $request)
    {
        // TODO: Implement updateProfile() method.
    }
}

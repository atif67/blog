<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails())
        {
            session()->flash('missing_data', 'true');
            return redirect()->back();
        }
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('index');
        }
        session()->flash('status', 'false');
        return redirect()->back();
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails())
        {
            return response()->json(['status' => 'false', 'error' => $validator->getMessageBag()->toArray()]);
        }

        $validatedData = $validator->validate();

        $user = new User();
        $user->name = data_get($validatedData,'name');
        $user->email = data_get($validatedData,'email');
        $user->password = Hash::make(data_get($validatedData,'password'));
        $user->save();

        return redirect()->route('login')->with(['status' => 'ok']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function profile()
    {
        $user = User::find(Auth::id());
        return view('users.profile')->with(['user' => $user]);
    }

    public function changePassPage()
    {
        return view('users.change-password');
    }

    public function changePass(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'old_password' => 'required',
            'new_password' => 'required'
        ]);

        if ($validator->fails())
        {
            session()->flash('missing_data', 'true');
            return redirect()->back();
        }
        $oldPassword = $request->old_password;
        $user = User::find(Auth::id());

        if (Auth::attempt(['email' => $user->email,'password' => $oldPassword])) {

            $user->password = Hash::make($request->new_password);
        }else{
            session()->flash('status', 'wrong_pass');
            return redirect()->back()->withErrors(['error' => 'wrong password']);
        }
        $user->save();
        session()->flash('status', 'ok');
        return redirect()->route('profile');
    }
}

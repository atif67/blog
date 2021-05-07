<?php


namespace App\Http\Controllers;


use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{
    public function post(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|max:40'
        ]);

        if ($validator->fails())
        {
            return redirect()->back();
        }

        $subscribe = new Subscribe();
        $subscribe->email = $request->input('email');
        $subscribe->save();

        session()->flash('mail','ok');
        return redirect()->back();
    }
}

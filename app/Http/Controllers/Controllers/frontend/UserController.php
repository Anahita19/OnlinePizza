<?php

namespace App\Http\Controllers\Frontend;

use App\Address;
use App\Http\Requests\UsersRequest;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function register(UsersRequest $request)
    {

      $user = new User();
      $user->name = $request->input('name');
      $user->last_name =  $request->input('last_name');
      $user->phone = $request->input('phone');
      $user->email = $request->input('email');
      $user->password =  Hash::make($request->input('password'));
      $user->save();

        $user->roles()->attach('3');  //      3 is for customer//
      $address = new Address();
      $address->address = $request->input('address');
      $address->post_code = $request->input('post_code');
      $address->user_id =  1;
      $address->save();

      Session::flash('success', 'suuccessfuly Enrolled.please confirm your Email Address');
      return redirect('/login');
    }

    public function profile()
    {
      $user = Auth::user();
      return view('frontend.profile.index', compact(['user']));
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->get();
        return view('admin.users.index', compact('users'));
//        $users=User::all();
//        return view('admin.users.create',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('admin.users.create', compact(['roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {

        $user = new User();
        if($file = $request->file('avatar')){
            $name = time() . $file->getClientOriginalName() ;
            $file->move('images', $name);
            $photo = new Photo();
            $photo->name = $file->getClientOriginalName();
            $photo->path = $name;
            $photo->user_id = Auth::id();
            $photo->save();

            $user->photo_id = $photo->id;

        }

        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->national_code = $request->input('national_code');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->status = $request->input('status');

        $user->save();

        $user->roles()->attach($request->input('roles'));
        Session::flash('add_user', 'کاربر جدید با موفقیت اضافه شد');
        return redirect('administrator/users');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findorfail($id);
        $roles = Role::pluck('name', 'id');
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $user=User::findorfail($id);
        if($file = $request->file('avatar')){
            $name = time() . $file->getClientOriginalName() ;
            $file->move('images', $name);
            $photo = new Photo();
            $photo->name = $file->getClientOriginalName();
            $photo->path = $name;
            $photo->user_id = Auth::id();
            $photo->save();

            $user->photo_id = $photo->id;

        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->status = $request->input('status');

        $user->save();

        $user->roles()->sync($request->input('roles'));
        Session::flash('update_user', 'کاربر با موفقیت ویرایش شد');
        return redirect('administrator/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $photo = Photo::findOrFail($user->photo_id);
        unlink(public_path() . $user->photo->path);
        $photo->delete();
        $user->delete();
        Session::flash('delete_user', 'کاربر با موفقیت حذف شد');

        return redirect('administrator/users');
    }
}

@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-11"></div>
            <div class="" >

                <div class="text-left">
                    <a class="btn btn-app bg-green-gradient" href="{{route('users.create')}}" >
                    <i class="fa fa-plus"></i> new
                    </a>
                </div>



            </div>

        </div>
    </div>
    <div class="container">
        @if(Session::has('add_user'))
            <div class="alert alert-success">
                <div>{{session('add_user')}}</div>
            </div>
        @endif
        @if(Session::has('delete_user'))
            <div class="alert alert-danger">
                <div>{{session('delete_user')}}</div>
            </div>
        @endif
        @if(Session::has('update_user'))
            <div class="alert alert-info">
                <div>{{session('update_user')}}</div>
            </div>
        @endif
        <h2 class="text-center">list of users</h2>

        <div class="row">

            <div class="col-md-9">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th  class="text-center" style="width: 1px">id</th>

                        <th class="text-center" style="width: 5px">name</th>
                        <th  class="text-center"style="width: 5px">Role</th>
                        <th class="text-center">email</th>
                        <th class="text-center">status</th>
{{--                        <th>تاریخ ایجاد</th>--}}
{{--                        <th class="text-center" style="width: 40px">modify</th>--}}

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="text-center">{{$user->id}}</td>

                            <td class="text-center">{{$user->name}}</td>
                            <td class="text-center">
                                <ul style="list-style: none;">
                                    @foreach($user->roles as $role)
                                        <li>{{$role->name}}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="text-center"> {{$user->email}}  </td>


                            @if($user->status==0)
                                <td class="text-center"><span class="  badge bg-red  tag-pill tag-danger text-center">Inactive</span></td>

                            @else($user->status==1)
                                <td class="text-center"><span class=" badge bg-green tag-pill tag-success text-center">َActive</span></td>

                            @endif
{{--                            <td>{{\Hekmatinasser\Verta\Verta::instance($user->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))}}</td>--}}


{{--                            <td>--}}
{{--                                {!! Form::open(['method' => 'GET', 'action'=> ['Admin\AdminUserController@edit', $user->id]]) !!}--}}
{{--                                <div class="form-group">--}}
{{--                                    {!! Form::submit('ویرایش', ['class'=>'btn btn-block btn-primary ']) !!}--}}

{{--                                    {!! Form::close() !!}--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                {!! Form::open(['method' => 'DELETE', 'action'=> ['Admin\AdminUserController@destroy', $user->id]]) !!}--}}
{{--                                <div class="form-group">--}}
{{--                                    {!! Form::submit('حذف', ['class'=>'btn btn-block btn-danger']) !!}--}}

{{--                                    {!! Form::close() !!}--}}

{{--                                </div>--}}
{{--                            </td>--}}
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>


@endsection

@extends('admin.layouts.master')
@section('content')

    <div class="container">
        <h2 class="text-center">ویرایش کاربر</h2>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 ">
                @include('partials.form-errors')

                {!! Form::model($user, ['method' => 'PATCH', 'action'=> ['Admin\AdminUserController@update', $user->id], 'files'=>true]) !!}
                <div class="form-group">

                    {!! Form::label('name', 'نام و نام خانوادگی:') !!}
                    {!! Form::text('name', null,['class'=>'form-control ']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'ایمیل:') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('avatar', 'تصویر:') !!}
                    {!! Form::file('avatar', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('roles', 'نقش:') !!}
                    {!! Form::select('roles[]', $roles, null,['multiple'=>'multiple', 'class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('status', 'وضعیت') !!}
                    {!! Form::select('status',[1=>'فعال',0=>'غیر فعال'] ,$user->status , ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'رمز:') !!}
                    {!! Form::password('password', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">

             {!! Form::submit('بروزرسانی', ['class' => 'form-control btn btn-block btn-success btn-flat']) !!}
                </div>
                {!! Form::close() !!}

            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

@endsection

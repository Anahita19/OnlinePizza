@extends('frontend.layout.master')
@if(Session::has('success'))
    <div class="alert alert-success">
        <div>{{session('success')}}</div>
    </div>
@endif
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials.form-errors')
            <div class="col-md-8" ><br/><br/><br/><br/>
                <div class="col-md-9 ftco-animate">
                    <form method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="row">


                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email"  value="" name="email" id="input-email" id="input-email"   class="form-control" placeholder="Your Email">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="password" value="" name="password"  class="form-control" id="input-password" placeholder="Your password">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <input type="submit" value="login" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>

                {{--            <div class="card">--}}
                {{--                <div class="card-header">{{ __('Register') }}</div>--}}

                {{--                <div class="card-body">--}}
                {{--                    <form method="POST" action="{{ route('register') }}">--}}
                {{--                        @csrf--}}

                {{--                        <div class="form-group row">--}}
                {{--                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

                {{--                            <div class="col-md-6">--}}
                {{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

                {{--                                @error('name')--}}
                {{--                                    <span class="invalid-feedback" role="alert">--}}
                {{--                                        <strong>{{ $message }}</strong>--}}
                {{--                                    </span>--}}
                {{--                                @enderror--}}
                {{--                            </div>--}}
                {{--                        </div>--}}

                {{--                        <div class="form-group row">--}}
                {{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                {{--                            <div class="col-md-6">--}}
                {{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

                {{--                                @error('email')--}}
                {{--                                    <span class="invalid-feedback" role="alert">--}}
                {{--                                        <strong>{{ $message }}</strong>--}}
                {{--                                    </span>--}}
                {{--                                @enderror--}}
                {{--                            </div>--}}
                {{--                        </div>--}}

                {{--                        <div class="form-group row">--}}
                {{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                {{--                            <div class="col-md-6">--}}
                {{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

                {{--                                @error('password')--}}
                {{--                                    <span class="invalid-feedback" role="alert">--}}
                {{--                                        <strong>{{ $message }}</strong>--}}
                {{--                                    </span>--}}
                {{--                                @enderror--}}
                {{--                            </div>--}}
                {{--                        </div>--}}

                {{--                        <div class="form-group row">--}}
                {{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

                {{--                            <div class="col-md-6">--}}
                {{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
                {{--                            </div>--}}
                {{--                        </div>--}}

                {{--                        <div class="form-group row mb-0">--}}
                {{--                            <div class="col-md-6 offset-md-4">--}}
                {{--                                <button type="submit" class="btn btn-primary">--}}
                {{--                                    {{ __('Register') }}--}}
                {{--                                </button>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </form>--}}
                {{--                </div>--}}
                {{--            </div>--}}
            </div>
        </div>
    </div>
</div>
@endsection

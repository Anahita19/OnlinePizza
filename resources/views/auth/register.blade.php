@extends('frontend.layout.master')

@section('content')
    <br/><br/><br/><br/>
<div class="container" >

    <div class="row justify-content-center" >
        <div class="col-md-3" >
            @include('partials.form-errors')
        </div>
        <div class="col-md-8" >
            <div class="col-md-6 ftco-animate">
                <form  class="contact-form" method="post" action="{{ route('user.register') }}" >
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group cke_required" >
                                <input type="text" value="" name="name" id="input-firstname"  class="form-control" placeholder="Your Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" value="" name="last_name"  id="input-lastname" class="form-control" placeholder="Your last Name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="email"  value="" name="email" id="input-email"   class="form-control" placeholder="Your Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" value="phone" name="phone"  id="input-telephone"  class="form-control" placeholder="Your phone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text"  value="" name="post_code"  id="input-postcode" class="form-control" placeholder="Your post code">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" value="" name="address"  id="input-address-1"  class="form-control" placeholder="Your Address">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="password" value="" name="password"  class="form-control" placeholder="Your password">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <input type="submit" value="Enroll" class="btn btn-primary py-3 px-5">
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
@endsection

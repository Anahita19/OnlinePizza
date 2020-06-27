@extends('frontend.layout.master')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">
            <div>{{session('success')}}</div>
        </div>
    @endif

    <div class="container">

        <div class="row">
            <div id="content" class="col-sm-3 ">

                <br/> <br/> <br/> <br/> <br/>
            </div>


            <div id="content" class="col-sm-6 ">

                <div class="alert alert-success">
                    <p>{{$user->name . ' ' . $user->last_name}}  welcome to your profile</p>

                </div>
                <div class="bg-navy">
                    <table>
                        <tbody>
                        <tr>
                            <td>
                                name:
                            </td>
                            <td>
                                {{$user->name}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                last name:
                            </td>
                            <td>
                                {{$user->last_name}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Phone:
                            </td>
                            <td>
                                {{$user->phone}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                email:
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                        </tr>

                        </tbody>
                    </table>
                  <h2>history of order</h2>
                    <a href="{{route('profile.orders')}}">history of orders</a>

                </div>
            </div>
        </div>
    </div>

@endsection

@extends('frontend.main_master')

@section('contend')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
            <img src="{{ (!empty(Auth::user()->profile_photo_path))? url('upload/user_images/'.Auth::user()->profile_photo_path):url('upload/no_image.jpg') }}" alt="" class="card-img-top" height="100%" width="100%" style="border-radius: 50%">
            <br>    <br>
            <ul class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile update</a>
                    <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
        </div>
            <div class="col-md-2">
                
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hi..</span> <strong>{{ Auth::user()->name }}</strong> Welcome to EShop Market</h3>
                </div>

            </div>
           
        </div>
    </div>
</div>


@endsection
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
                    <h3 class="text-center"><span class="text-danger">Change Password</span></h3>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.password.update') }}">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="current_password">Currnet Password <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" name="current_password" id="current_password" >
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password">New Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input" name="password" id="password">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input" name="password_confirmation" id="password_confirmation">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-warning"  type="submit">Update</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
           
        </div>
    </div>
</div>


@endsection
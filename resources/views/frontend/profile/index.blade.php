@extends('frontend.main_master')

@section('contend')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
            <img src="{{ (!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" alt="" class="card-img-top" height="100%" width="100%" style="border-radius: 50%">
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
                    <h3 class="text-center"><span class="text-danger">Hi..</span> <strong>{{ Auth::user()->name }}</strong> Update Your Profile</h3>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="name">Name <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" name="name" id="name" value="{{ $user->name }}" >
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="email">Email <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input" name="email" id="email" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="phone">Phone <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" name="phone" id="phone" value="{{ $user->phone }}">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="file">User  Image <span>*</span></label>
                                <input type="file" class="form-control unicase-form-control text-input" name="file" id="file" >
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
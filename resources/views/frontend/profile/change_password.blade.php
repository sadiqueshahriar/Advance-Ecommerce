@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"><br>
                    <img class="card-image-top" style="border-radius: 50%;"
                        src="{{ !empty($user->profile_photo_path) ? url('upload/user_images/' . $user->profile_photo_path) : url('upload/no_image.jpg') }}"
                        height="100%" width="100%" alt="">
                    <ul class="list-group list-group-flush">
                        <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>

                    </ul>
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Change Password</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update.password') }}" method="POST">

                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="current_password">Current Password <span>*</span></label>
                                <input type="password" id="current_password" name="oldpassword"
                                    class="form-control unicase-form-control text-input">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password">New Password <span>*</span></label>
                                <input type="password" id="password" name="password"
                                    class="form-control unicase-form-control text-input">

                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password_confirmation">Confirm Password
                                    <span>*</span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control unicase-form-control text-input">

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

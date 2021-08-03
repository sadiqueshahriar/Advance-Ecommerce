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
                        <h3 class="text-center"><span
                                class="text-danger">Hi....</span><strong>{{ Auth::user()->name }}</strong> Update Your
                            Profile</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.profile.store') }}" method="POST" enctype="multipart/form-data
                                ">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                <input type="text" id="name" name="name" value="{{ $user->name }}"
                                    class="form-control unicase-form-control text-input">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email <span>*</span></label>
                                <input type="email" id="email" name="email" value="{{ $user->email }}"
                                    class="form-control unicase-form-control text-input">

                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone <span>*</span></label>
                                <input type="text" id="phone" name="phone" value="{{ $user->phone }}"
                                    class="form-control unicase-form-control text-input">

                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Photo <span>*</span></label>
                                <input type="file" id="profile_photo_path" name="profile_photo_path"
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

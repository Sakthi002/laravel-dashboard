@extends('admin.admin_master')

@section('admin')

    <div class="container">

        <div class="row">

            <div class="col-sm-12">

                <div class="card card-default">

                    <div class="card-header card-header-border-bottom">

                        <h2>Change Profile</h2>
                    </div>

                    <div class="card-body">

                        <form class="horizontal-form" action="{{ route('admin.update.profile') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" value="{{ $user['profile_photo_path'] }}" name="old_pro_image">

                            <div class="form-group row">

                                <div class="col-12 col-md-3">

                                    <label for="">Name</label>
                                </div>

                                <div class="col-12 col-md-9">

                                    <input type="text" name="name" id="name" class="form-control" value="{{ $user['name'] }}">

                                    @error('name')
                                    <span class="mt-2 d-block text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-12 col-md-3">

                                    <label for="">Email</label>
                                </div>

                                <div class="col-12 col-md-9">

                                    <input type="email" name="email" id="email" class="form-control" value="{{ $user['email'] }}">

                                    @error('email')
                                    <span class="mt-2 d-block text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-12 col-md-3">

                                    <label for="">Image</label>
                                </div>

                                <div class="col-12 col-md-9">

                                    <input type="file" class="form-control" name="profile_pic"
                                           value="{{ $user->profile_photo_path }}">
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-12 col-md-3">

                                </div>

                                <div class="col-12 col-md-9">

                                    <img src="{{ $user->profile_photo_url }}" alt="img" style="height: 100px;width: 100px;">
                                </div>
                            </div>


                            <div class="form-footer pt-5 border-top">

                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

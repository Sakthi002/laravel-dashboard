@extends('admin.admin_master')

@section('admin')

    <div class="container">

        <div class="row">

            <div class="col-sm-12">

                <div class="card card-default">

                    <div class="card-header card-header-border-bottom">

                        <h2>Change Password</h2>
                    </div>

                    <div class="card-body">

                        <form class="horizontal-form" action="{{ route('admin.update.password') }}" method="POST">
                            @csrf
                            <div class="form-group row">

                                <div class="col-12 col-md-3">

                                    <label for="">Current Password</label>
                                </div>

                                <div class="col-12 col-md-9">

                                    <input type="password" name="oldpassword" id="current_password" class="form-control" placeholder="Current Password">

                                    @error('oldpassword')
                                    <span class="mt-2 d-block text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-12 col-md-3">

                                    <label for="">New Password</label>
                                </div>

                                <div class="col-12 col-md-9">

                                    <input type="password" name="password" id="password" class="form-control" placeholder="New Password">

                                    @error('password')
                                    <span class="mt-2 d-block text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-12 col-md-3">

                                    <label for="">Confirm Password</label>
                                </div>

                                <div class="col-12 col-md-9">

                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password">

                                    @error('password_confirmation')
                                    <span class="mt-2 d-block text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-footer pt-5 border-top">

                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

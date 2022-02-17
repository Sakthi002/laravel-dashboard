@extends('admin.admin_master')

@section('admin')

    <div class="container">

        <div class="row">

            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Create About</h2>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('store.about') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="about_title">Title</label>
                                <input type="text" class="form-control" id="about_title" name="title" placeholder="Enter Title">
                                @error('title')
                                <span class="mt-2 d-block text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="about_s_desc">Description</label>
                                <textarea class="form-control" id="about_s_desc" rows="3" name="short_desc"></textarea>
                                @error('short_desc')
                                <span class="mt-2 d-block text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="about_l_desc">Description</label>
                                <textarea class="form-control" id="about_l_desc" rows="5" name="long_desc"></textarea>
                                @error('long_desc')
                                <span class="mt-2 d-block text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                                <button type="submit" class="btn btn-primary btn-default">Submit</button>
                                <a href="{{ route('about.all') }}" class="btn btn-secondary btn-default">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

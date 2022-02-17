@extends('admin.admin_master')

@section('admin')

    <div class="container">

        <div class="row">

            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Create Slide</h2>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('store.slide') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="slide_title">Title</label>
                                <input type="text" class="form-control" id="slide_title" name="title" placeholder="Enter Title">
                                @error('title')
                                    <span class="mt-2 d-block text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slide_desc">Description</label>
                                <textarea class="form-control" id="slide_desc" rows="3" name="description"></textarea>
                                @error('description')
                                <span class="mt-2 d-block text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slide_img">Image</label>
                                <input type="file" name="image" class="form-control-file" id="slide_img">
                                @error('image')
                                <span class="mt-2 d-block text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                                <button type="submit" class="btn btn-primary btn-default">Submit</button>
                                <a href="{{ route('slider.all') }}" class="btn btn-secondary btn-default">
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

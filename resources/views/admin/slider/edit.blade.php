@extends('admin.admin_master')

@section('admin')

    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Edit Slide</h2>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('/slider/update/'.$slide->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $slide->image }}" name="old_slide_image">
                            <div class="form-group">
                                <label for="slide_title">Title</label>
                                <input type="text" class="form-control" id="slide_title" name="title" placeholder="Enter Title"
                                    value="{{ $slide->title }}">
                                @error('title')
                                <span class="mt-2 d-block text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slide_desc">Description</label>
                                <textarea class="form-control" id="slide_desc" rows="3" name="description">{{$slide->description}}</textarea>
                                @error('description')
                                <span class="mt-2 d-block text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slide_img">Image</label>
                                <input type="file" name="image" class="form-control-file" id="slide_img"
                                       value="{{ $slide->image }}">
                                @error('image')
                                <span class="mt-2 d-block text-danger">{{$message}}</span>
                                @enderror

                                <div class="mt-3">

                                    <img src="{{ asset($slide->image) }}" alt="img" style="height: 200px;width: 400px;">
                                </div>
                            </div>
                            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                                <button type="submit" class="btn btn-primary btn-default">Update</button>
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

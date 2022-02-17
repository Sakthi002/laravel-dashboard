@extends('admin.admin_master')

@section('admin')

    <div class="container">

        <div class="row">

            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Edit Service</h2>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('/service/update/'.$service->id) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="about_title">Title</label>
                                <input type="text" class="form-control" id="about_title" name="title" placeholder="Enter Title"
                                    value="{{ $service->title }}">
                                @error('title')
                                <span class="mt-2 d-block text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="service_desc">Icon</label>
                                <select class="form-control" name="icon">
                                    <option value="">--- Select Icon ---</option>
                                    <option value="bxl-dribbble" {{ $service->icon == 'bxl-dribbble' ? 'selected' : ''}}>Dribble</option>
                                    <option value="bx-file" {{ $service->icon == 'bx-file' ? 'selected' : ''}}>File</option>
                                    <option value="bx-tachometer" {{ $service->icon == 'bx-tachometer' ? 'selected' : ''}}>Tachometer</option>
                                    <option value="bx-layer" {{ $service->icon == 'bx-layer' ? 'selected' : ''}}>Layer</option>
                                    <option value="bx-slideshow" {{ $service->icon == 'bx-slideshow' ? 'selected' : ''}}>Slideshow</option>
                                    <option value="bx-arch" {{ $service->icon == 'bx-arch' ? 'selected' : ''}}>Arch</option>
                                </select>
                                @error('icon')
                                <span class="mt-2 d-block text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="service_desc">Description</label>
                                <textarea class="form-control" id="service_desc" rows="3" name="description">{{ $service->description }}</textarea>
                                @error('description')
                                <span class="mt-2 d-block text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                                <button type="submit" class="btn btn-primary btn-default">Update</button>
                                <a href="{{ route('services.all') }}" class="btn btn-secondary btn-default">
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

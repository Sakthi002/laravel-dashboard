@extends('admin.admin_master')

@section('admin')

    <div class="container">

        <div class="row">

            <div class="col-sm-12">

                <div class="card">

                    <div class="card-header">

                        Edit Brand
                    </div>

                    <div class="card-body">

                        <form action="{{ url('brand/update/'.$brand->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" value="{{ $brand->brand_image }}" name="old_image">

                            <div class="mb-3">

                                <label for="name" class="form-label">Name</label>

                                <input type="text" class="form-control" id="name" placeholder="Enter Name..." name="brand_name"
                                    value="{{ $brand->brand_name }}">

                                @error('brand_name')

                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">

                                <label for="b_image" class="form-label">Image</label>

                                <input type="file" class="form-control" id="b_image" name="brand_image"
                                    value="{{ $brand->brand_image }}">

                                @error('brand_image')

                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">

                                <img src="{{ asset($brand->brand_image) }}" alt="img" style="height: 200px;width: 400px;">
                            </div>

                            <button type="submit" class="btn btn-primary">Update Brand</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

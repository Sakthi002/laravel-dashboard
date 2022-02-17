@extends('admin.admin_master')

@section('admin')

    <div class="container">

        <div class="row">

            <div class="col-sm-8">

                <div class="card">

                    <div class="card-header">
                        All Brands
                    </div>

                    <div class="card-body">

                        <table class="table">

                            <thead>

                            <tr>

                                <th scope="col">SL No</th>

                                <th scope="col">Name</th>

                                <th scope="col">Image</th>

                                <th scope="col">Created At</th>

                                <th scope="col">Actions</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($brands as $brand)
                                <tr>

                                    <th scope="row">{{  $brands->firstItem()+$loop->index }}</th>

                                    <td>{{ $brand->brand_name }}</td>

                                    <td><img src="{{ asset($brand->brand_image) }}" alt="img" width="40" height="40"></td>

                                    <td>
                                        @if($brand->created_at)
                                            {{ $brand->created_at }}
                                        @else
                                            --
                                        @endif
                                    </td>

                                    <td>

                                        <a href="{{ url('brand/edit/'.$brand->id) }}" class="btn btn-primary">Edit</a>

                                        <a href="{{ url('brand/delete/'.$brand->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $brands->links("pagination::bootstrap-4") }}
                    </div>
                </div>
            </div>

            <div class="col-sm-4">

                <div class="card">

                    <div class="card-header">

                        Add Brand
                    </div>

                    <div class="card-body">

                        <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">

                                <label for="name" class="form-label">Name</label>

                                <input type="text" class="form-control" id="name" placeholder="Enter Name..." name="brand_name">

                                @error('brand_name')

                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">

                                <label for="b_image" class="form-label">Image</label>

                                <input type="file" class="form-control" id="b_image" name="brand_image">

                                @error('brand_image')

                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add Brand</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

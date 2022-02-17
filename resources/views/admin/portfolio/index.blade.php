@extends('admin.admin_master')

@section('admin')

    <div class="container">

        <div class="row">

            <div class="col-sm-8">

                <div class="row">

                    @foreach($images as $image)

                        <div class="col-sm-6 mb-3">

                            <img src="{{ asset($image->image) }}" alt="">
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-sm-4">

                <div class="card">

                    <div class="card-header">

                        Add Images
                    </div>

                    <div class="card-body">

                        <form action="{{ route('store.images') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">

                                <label for="m_image" class="form-label">Image</label>

                                <input type="file" class="form-control" id="m_image" name="images[]" multiple>

                                @error('images')

                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add Images</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

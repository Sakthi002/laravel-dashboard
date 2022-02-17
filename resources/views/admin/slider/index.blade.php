@extends('admin.admin_master')

@section('admin')

    <div class="container">

        <div class="row">

            <div class="col-sm-12">

                <div class="card">

                    <div class="card-header">
                        All Slides

                        <a href="{{ route('slider.add') }}" class="btn btn-primary float-right"> Add Slide</a>
                    </div>

                    <div class="card-body">

                        <table class="table">

                            <thead>

                            <tr>

                                <th scope="col">SL No</th>

                                <th scope="col">Title</th>

                                <th scope="col">Description</th>

                                <th scope="col">Image</th>

                                <th scope="col">Created At</th>

                                <th scope="col">Actions</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($sliders as $slider)
                                <tr>

                                    <th scope="row">{{  $sliders->firstItem()+$loop->index }}</th>

                                    <td width="20%">{{ $slider->title }}</td>

                                    <td width="30%">{{ $slider->description }}</td>

                                    <td><img src="{{ asset($slider->image) }}" alt="img" width="40" height="40"></td>

                                    <td>
                                        @if($slider->created_at)
                                            {{ $slider->created_at }}
                                        @else
                                            --
                                        @endif
                                    </td>

                                    <td>

                                        <a href="{{ url('slider/edit/'.$slider->id) }}" class="btn btn-primary">Edit</a>

                                        <a href="{{ url('slider/delete/'.$slider->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $sliders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('admin.admin_master')

@section('admin')

    <div class="container">

        <div class="row">

            <div class="col-sm-12">

                <div class="card">

                    <div class="card-header">
                        All About Data

                        <a href="{{ route('about.create') }}" class="btn btn-primary float-right"> Add About</a>
                    </div>

                    <div class="card-body">

                        <table class="table">

                            <thead>

                            <tr>

                                <th scope="col">SL No</th>

                                <th scope="col">Title</th>

                                <th scope="col">Short Desc</th>

                                <th scope="col">Long Desc</th>

                                <th scope="col">Created At</th>

                                <th scope="col">Actions</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($about_list as $about)
                                <tr>

                                    <th scope="row">{{  $about_list->firstItem()+$loop->index }}</th>

                                    <td width="15%">{{ $about->title }}</td>

                                    <td width="20%">{{ $about->short_desc }}</td>

                                    <td width="20%">{{ $about->long_desc }}</td>

                                    <td>
                                        @if($about->created_at)
                                            {{ $about->created_at }}
                                        @else
                                            --
                                        @endif
                                    </td>

                                    <td>

                                        <a href="{{ url('about/edit/'.$about->id) }}" class="btn btn-primary">Edit</a>

                                        <a href="{{ url('about/delete/'.$about->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $about_list->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

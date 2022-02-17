@extends('admin.admin_master')

@section('admin')

    <div class="container">

        <div class="row">

            <div class="col-sm-12">

                <div class="card">

                    <div class="card-header">
                        All Services

                        <a href="{{ route('service.create') }}" class="btn btn-primary float-right"> Add Service</a>
                    </div>

                    <div class="card-body">

                        <table class="table">

                            <thead>

                            <tr>

                                <th scope="col">SL No</th>

                                <th scope="col">Title</th>

                                <th scope="col">Description</th>

                                <th scope="col">Icon</th>

                                <th scope="col">Created At</th>

                                <th scope="col">Actions</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($services as $service)
                                <tr>

                                    <th scope="row">{{  $services->firstItem()+$loop->index }}</th>

                                    <td width="15%">{{ $service->title }}</td>

                                    <td width="20%">{{ $service->description }}</td>

                                    <td width="10%">{{ $service->icon }}</td>

                                    <td>
                                        @if($service->created_at)
                                            {{ $service->created_at }}
                                        @else
                                            --
                                        @endif
                                    </td>

                                    <td>

                                        <a href="{{ url('service/edit/'.$service->id) }}" class="btn btn-primary">Edit</a>

                                        <a href="{{ url('service/delete/'.$service->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $services->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

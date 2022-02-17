@extends('admin.admin_master')

@section('admin')

    <div class="container">

        <div class="row">

            <div class="col-sm-12">

                <div class="card">

                    <div class="card-header">
                        All About Data

                        <a href="{{ route('contact.admin.create') }}" class="btn btn-primary float-right"> Add Contact</a>
                    </div>

                    <div class="card-body">

                        <table class="table">

                            <thead>

                            <tr>

                                <th scope="col">SL No</th>

                                <th scope="col">Email</th>

                                <th scope="col">Phone</th>

                                <th scope="col">Address</th>

                                <th scope="col">Created At</th>

                                <th scope="col">Actions</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($contacts as $contact)
                                <tr>

                                    <th scope="row">{{  $contacts->firstItem()+$loop->index }}</th>

                                    <td>{{ $contact->email }}</td>

                                    <td>{{ $contact->phone }}</td>

                                    <td width="20%">{{ $contact->address }}</td>

                                    <td>
                                        @if($contact->created_at)
                                            {{ $contact->created_at }}
                                        @else
                                            --
                                        @endif
                                    </td>

                                    <td>

                                        <a href="{{ url('/admin/contact/edit/'.$contact->id) }}" class="btn btn-primary">Edit</a>

                                        <a href="{{ url('/admin/contact/delete/'.$contact->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $contacts->links("pagination::bootstrap-4") }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

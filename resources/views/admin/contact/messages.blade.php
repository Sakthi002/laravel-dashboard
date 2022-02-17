@extends('admin.admin_master')

@section('admin')

    <div class="container">

        <div class="row">

            <div class="col-sm-12">

                <div class="card">

                    <div class="card-header">
                        All Contact Messages
                    </div>

                    <div class="card-body">

                        <table class="table">

                            <thead>

                            <tr>

                                <th scope="col">SL No</th>

                                <th scope="col">Name</th>

                                <th scope="col">Email</th>

                                <th scope="col">Subject</th>

                                <th scope="col">Message</th>

                                <th scope="col">Created At</th>

                                <th scope="col">Actions</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($messages as $message)
                                <tr>

                                    <th scope="row">{{  $messages->firstItem()+$loop->index }}</th>

                                    <td width="10%">{{ $message->name }}</td>

                                    <td width="10%">{{ $message->email }}</td>

                                    <td width="15%">{{ $message->subject }}</td>

                                    <td width="25%">{{ $message->message }}</td>

                                    <td>
                                        @if($message->created_at)
                                            {{ $message->created_at }}
                                        @else
                                            --
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ url('/admin/contact/message/delete/'.$message->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $messages->links("pagination::bootstrap-4") }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

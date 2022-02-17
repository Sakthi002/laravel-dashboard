@extends('admin.admin_master')

@section('admin')

    <div class="container">

        <div class="row">

            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Edit Contact</h2>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('/admin/contact/update/'.$contact->id) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="contact_email">Email</label>
                                <input type="email" class="form-control" id="contact_email" name="email"
                                       value="{{ $contact->email }}" placeholder="Enter Email">
                                @error('email')
                                <span class="mt-2 d-block text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="contact_phone">Phone</label>
                                <input type="text" class="form-control" id="contact_phone" name="phone"
                                       value="{{ $contact->phone }}" placeholder="Enter Phone">
                                @error('phone')
                                <span class="mt-2 d-block text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="contact_phone">Address</label>
                                <textarea class="form-control" id="contact_address" rows="3" name="address">{{ $contact->address }}</textarea>
                                @error('address')
                                <span class="mt-2 d-block text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                                <button type="submit" class="btn btn-primary btn-default">Update</button>
                                <a href="{{ route('contacts.admin') }}" class="btn btn-secondary btn-default">
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

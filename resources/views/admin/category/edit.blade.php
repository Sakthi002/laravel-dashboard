<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            Edit Category
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="container">

                @if(session('success'))

                    <div class="alert alert-success alert-dismissible fade show" role="alert">

                        <strong>Success!</strong> {{ session('success') }}

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                        </button>
                    </div>
                @endif

                <div class="row">

                    <div class="col-sm-12">

                        <div class="card">

                            <div class="card-header">

                                Edit Category
                            </div>

                            <div class="card-body">

                                <form action="{{ url('category/update/'.$category->id) }}" method="POST">
                                    @csrf
                                    <div class="mb-3">

                                        <label for="name" class="form-label">Name</label>

                                        <input type="text" class="form-control" id="name" placeholder="Enter Name..."
                                               name="category_name" value="{{ $category->category_name }}">

                                        @error('category_name')

                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Category</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

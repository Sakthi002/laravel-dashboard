<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            All Categories
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="container">

                <div class="row">

                    <div class="col-sm-8">

                        <div class="card">

                            <div class="card-header">

                                All Categories
                            </div>

                            <div class="card-body">

                                <table class="table">

                                    <thead>

                                        <tr>

                                            <th scope="col">SL No</th>

                                            <th scope="col">Name</th>

                                            <th scope="col">User</th>

                                            <th scope="col">Created At</th>

                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach($categories as $category)
                                            <tr>

                                                <th scope="row">{{  $categories->firstItem()+$loop->index }}</th>

                                                <td>{{ $category->category_name }}</td>

                                                <td>{{ $category->user->name }}</td>

                                                <td>
                                                    @if($category->created_at)
                                                    {{ $category->created_at }}
                                                    @else
                                                    --
                                                    @endif
                                                </td>

                                                <td>

                                                    <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-primary">Edit</a>

                                                    <a href="{{ url('category/trash/'.$category->id) }}" class="btn btn-warning">Trash</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{ $categories->appends(['trash' => $trashedCategories->currentPage()])->links() }}
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">

                        <div class="card">

                            <div class="card-header">

                                Add Category
                            </div>

                            <div class="card-body">

                                <form action="{{ route('store.category') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">

                                        <label for="name" class="form-label">Name</label>

                                        <input type="text" class="form-control" id="name" placeholder="Enter Name..." name="category_name">

                                        @error('category_name')

                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">Add Category</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">

                    <div class="col-sm-12">

                        {{--DELETED CATEGORIES--}}
                        <div class="card">

                            <div class="card-header">

                                Trashed Categories
                            </div>

                            <div class="card-body">

                                <table class="table">

                                    <thead>

                                    <tr>

                                        <th scope="col">SL No</th>

                                        <th scope="col">Name</th>

                                        <th scope="col">User</th>

                                        <th scope="col">Created At</th>

                                        <th scope="col">Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($trashedCategories as $t_cat)
                                        <tr>

                                            <th scope="row">{{  $trashedCategories->firstItem()+$loop->index }}</th>

                                            <td>{{ $t_cat->category_name }}</td>

                                            <td>{{ $t_cat->user->name }}</td>

                                            <td>
                                                @if($t_cat->created_at)
                                                    {{ $t_cat->created_at }}
                                                @else
                                                    --
                                                @endif
                                            </td>

                                            <td>

                                                <a href="{{ url('category/restore/'.$t_cat->id) }}" class="btn btn-primary">Restore</a>

                                                <a href="{{ url('category/delete/'.$t_cat->id) }}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                {{ $trashedCategories->appends(['categories' => $categories->currentPage()])->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

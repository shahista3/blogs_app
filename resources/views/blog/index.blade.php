<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="d-flex justify-content-between mb-4">
                        <a href="{{ url('blog/create') }}" class="btn btn-warning">Add Blog</a>
                    </div>
                    @if (session('message'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{session('message')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                @endif
                    <h6 class="mt-4 text-center">Display Blog Table</h6>
                    <table class="table table-bordered table-striped mt-4">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Id</th>
                                <th scope="col" class="text-center">Title</th>
                                <th scope="col" class="text-center">Description</th>
                                <th scope="col" class="text-center">Category Name</th>
                                <th scope="col" class="text-center">Image</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data1 as $d)
                            <tr>
                                <td class="border text-center">{{ $d->id }}</td>
                                <td class="border text-center">{{ $d->title }}</td>
                                <td class="border text-center">{{ $d->description }}</td>
                                <td class="border text-center">
                                    @if ($d->category)
                                        {{ $d->category->name }}
                                    @else
                                        No Category
                                    @endif
                                </td>
                                <td class="border text-center"><img src="{{ asset('uploads/' . $d->image) }}" alt="Image" height="50px" width="70px"></td>
                                <td class="text-center">
                                    <div class="d-inline-flex">
                                        <a href="{{ route('category.edit', $d->id) }}" class="btn btn-warning me-2">Edit</a>
                                        <a href="{{ route('category.delete', $d->id) }}" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

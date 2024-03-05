<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="flex justify-between mb-4">
                        <a href="{{ url('category/create') }}" class="btn btn-warning">Add Category</a>
                    </div>
                    @if (session('msg'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{session('msg')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                @endif
                    <h6 class="mt-4 text-center">Display Category Table</h6>
                    <table class="table table-bordered table-striped mt-4">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Id</th>
                                <th scope="col" class="text-center">Category Name</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td class="text-center">{{ $d->id }}</td>
                                    <td class="text-center">{{ $d->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('category.edit', $d->id) }}" class="btn btn-warning">Edit</a>
                                        <a href="{{ route('category.delete', $d->id) }}"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

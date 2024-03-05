<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="row justify-content-center">

            <form style="width: 22rem;" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="flex flex-col text-center mb-12">
                    <h3 class="sm:text-xl text-xl font-medium title-font mb-4 text-gray-900">Add</h3>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control">
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <label for="description" class="form-label">Description</label>
                    <input type="textarea" id="description" name="description" value="{{ old('description') }}" class="form-control">
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <label for="name" class="form-label">Category</label>
                    <select id="category_id" name="category_id" class="form-control">
                        <option value="{{old('$category->name')}}" selected>Choose category</option>
                        @foreach ($data as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <label for="image" class="form-label">Upload images or any other relevant file.</label>
                    <input id="formFileLg" name="image" type="file" value="{{ old('image') }}" class="form-control">
                </div>



                <div class="p-2 w-full">
                    <button type="submit" class="btn btn-primary w-full">Add</button>
                    <a href="{{ route('blog') }}"><button type="button" class="btn btn-warning w-full">Back</button></a>
                </div>
   
    </form>
    </div>
    </div>
  


</body>

</html>

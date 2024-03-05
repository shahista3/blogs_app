
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">

        <div class="row justify-content-center">

            <form style="width: 22rem;" action="{{ route('blog.update', $data1->id) }}" method="POST"
                enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="flex flex-col text-center mb-12">
                    <h3 class="sm:text-xl text-xl font-medium title-font mb-4 text-gray-900">Update</h3>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" id="title" name="title" value="{{ $data1->title }}"
                        class="form-control">
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <label for="description" class="form-label">Description</label>
                    <input type="textarea" id="description" name="description" value="{{ $data1->description }}"
                        class="form-control">
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <label for="name" class="form-label">Category</label>
                    <select id="category_id" name="category_id" class="form-control">
                        <option value="" selected>Choose category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $data1->category_id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

               
                <div data-mdb-input-init class="form-outline mb-4">
                    <label for="image" class="form-label">Uploaded Image</label>
                    <!-- Display old image if available -->
                    @if ($data1->image)
                        <img src="{{ asset('uploads/' . $data1->image) }}" width="100px" height="100px" alt="Old Image"
                            class="mt-2">
                    @elseif(old('image'))
                        <img src="{{ old('image') }}" alt="Old Image" class="mt-2">
                    @endif

                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <label for="image" class="form-label">Upload new images or any other relevant file.</label>
                    <input id="formFileLg" name="image" type="file" class="form-control">
                </div> 

                <div class="p-2 w-full">
                    <button type="submit" class="btn btn-primary w-full">Update</button>
                    <a href="{{ route('blog') }}"><button type="submit" class="btn btn-warning w-full">Back</button></a>
                </div>
        </div>
    </div>
    </form>
    </div>
    </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

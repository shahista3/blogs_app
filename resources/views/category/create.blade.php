<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link href="{{ asset('css/c1.css') }}" rel="stylesheet" />
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
        <h3 class="mb-5">Add Category</h3>
        <div class="row justify-content-center">

            <form style="width: 22rem;" action="{{ url('/category/store') }}" method="post">
                @csrf
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="name">Category Name</label>
                    <input type="text" id="name" name="name" class="form-control"
                        value="{{ old('name') }}">
                </div>
                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Add</button>
                <a href="{{ route('category') }}"><button data-mdb-ripple-init type="button"
                        class="btn btn-warning btn-block mb-4">Back</button></a>
            </form>
        </div>
    </div>
</body>

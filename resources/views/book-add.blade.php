@extends('landing.login_register')
@section('container')
    <!-- Link for custom multiple select -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="main d-flex justify-content-around align-items-center">
        <div class="login-box">
            <h2 class="text-center">Add new book</h2>

            <form action="book-add" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label class="form-label" for="floatingInput" id="floatingInput">Code</label>
                    <input class="form-control" type="text" name="book_code" id="book_code" placeholder="Book code"
                        value="{{ old('book_code') }}" required>
                </div>
                <div>
                    <label class="form-label" for="title">Title</label>
                    <input class="form-control" type="text" name="title" id="title" placeholder="Book title"
                        value="{{ old('title') }}" required>
                </div>
                <div>
                    <label class="form-label" for="synopsis">Synopsis</label>
                    <textarea class="form-control" type="text" name="synopsis" id="synopsis" placeholder="Synopsis"
                        value="{{ old('synopsis') }}" required></textarea>
                </div>
                <div>
                    <label class="form-label" for="cover">Cover</label>
                    <input class="form-control" type="file" name="cover" id="cover">
                </div>
                <div>
                    <label class="form-label" for="title">Genre</label>
                    <select class="form-select form-select-sm select-multiple" aria-label=".form-select-sm example"
                        placeholder="Select genre" name="categories[]" multiple>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-success form-control">Save</button>
                </div>
                <div>
                    <a href="/books-admin" class="btn btn-danger form-control" role="button">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Script for custom multiple select -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-multiple').select2();
        });
    </script>
@endsection

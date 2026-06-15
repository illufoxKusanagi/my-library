@extends('landing.login_register')
@section('container')
    <!-- Link for custom multiple select -->
    <!-- Link for custom multiple select -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="main d-flex justify-content-around align-items-center w-100">
        <div class="login-box">
            <h2 class="text-center">Return book for {{ $user->slug }}</h2>
            <form action="" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="mb-3">
                    <label class="form-label" for="book_id">Select Book</label>
                    <select class="form-select form-select-sm select-control" aria-label=".form-select-sm example"
                        name="book_id">
                        <option value="" selected>Select book</option>
                        @foreach ($books as $item)
                            <option value="{{ $item->id }}">{{ $item->book_code }} - {{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success form-control">Return Book</button>
                </div>
                <div class="mb-3">
                    <a href="/dashboard" class="btn btn-danger form-control" role="button">Cancel</a>
                </div>
            </form>
            {{-- <form action="" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="title">Books</label>
                    <select class="form-select form-select-sm select-control" aria-label=".form-select-sm example"
                        placeholder="Select genre" name="book_id">
                        <option value="" selected>Select book</option>
                        @foreach ($books as $item)
                            <option value="{{ $item->id }}">{{ $item->book_code }}-{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success form-control">Save</button>
                </div>
                <div class="mb-3">
                    <a href="/dashboard" class="btn btn-danger form-control" role="button">Cancel</a>
                </div>
            </form> --}}
        </div>
    </div>

    <!-- Script for custom multiple select -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-control').select2();
        });
    </script>
@endsection

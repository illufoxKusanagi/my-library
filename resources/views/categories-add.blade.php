@extends('landing.login_register')
@section('container')
    <div class="main d-flex justify-content-around align-items-center">
        <div class="login-box">
            <h2 class="text-center">Add new category</h2>

            <form action="category-add" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-floating">
                    <input class="form-control" type="text" name="name" id="name" placeholder="Category name"
                        value="{{ old('name') }}" required>
                    <label class="form-label" for="name">Category name</label>
                </div>
                <div>
                    <button type="submit" class="btn btn-success form-control">Save</button>
                </div>
                <div>
                    <a href="/categories" class="btn btn-danger form-control" role="button">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection

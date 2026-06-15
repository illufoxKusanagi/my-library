@extends('landing.login_register')
@section('container')
    <div class="main d-flex justify-content-around align-items-center">
        <div class="login-box">
            <h2 class="text-center">Edit category</h2>
            <form action="/categories-edit/{{ $category->slug }}" method="post">
                @method('put')
                @csrf
                <div class="form-floating">
                    <input class="form-control" type="text" name="name" id="floatingInput" value="{{ $category->name }}"
                        placeholder="Category name">
                    <label class="form-label" for="floatingInput">Name</label>
                </div>
                <div>
                    <button type="submit" class="btn btn-success form-control">Save</button>
                </div>
                <div>
                    <a href="/categories" class="btn btn-danger form-control" role="button"><span
                            data-feather="arrow-left-circle"></span>Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection

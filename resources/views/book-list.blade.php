@extends('dashboard.layouts.main')
@section('container')
    <h2 class="h2">
        Book list</h2>
@endsection

@section('body-content')
    <form action="" method="get">
        <div class="row">
            <div class="col-12 col-sm-6">
                <select class="form-select" name="category" aria-label="Default select example">
                    <option selected value="">Select Category</option>
                    @foreach ($categories as $items)
                        <option value="{{ $items->id }}">{{ $items->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-sm-6">
                <div class="input-group mb-3">
                    <input type="text" name="title" class="form-control" id="title" placeholder="Search title">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </div>
            </div>
        </div>
    </form>
    <a href="book-add" class="btn btn-primary" role="button"><span data-feather="plus-square"></span>
        Add book</a>
    <a href="book-deleted" class="btn btn-info" role="button"><span data-feather="eye"></span>
        View Deleted books</a>
    <div class="mt-2 d-flex">
        <div class="row">
            @foreach ($books as $items)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="card h-100 w-100" style="width: 18rem;">
                        <div class="card-body d-flex flex-column justify-content-between align-items-center">
                            @if ($items->cover != '')
                                <img src="{{ asset('storage/cover/' . $items->cover) }}" class="rounded-1 w-100"
                                    alt="Cover" width="250px" style="border: solid 1px">
                            @else
                                <img src="{{ asset('image/templaet.jpg') }}" class="rounded-1 w-100" alt="Cover"
                                    width="250px" style="border: solid 1px">
                            @endif
                            <h4 class="card-title">{{ $items->title }}</h4>
                            <div>
                                <h6><strong>Book code : </strong>{{ $items->book_code }}
                                </h6>
                                <h6><strong>Genre :</strong>
                                    @foreach ($items->categories as $category)
                                        {{ $category->name }}
                                    @endforeach
                                </h6>
                                <p>
                                    {{ $items->synopsis }}
                                </p>
                                <p
                                    class="card-text text-end fw-bold {{ $items->status == 'available' ? 'text-success' : 'text-danger' }}">
                                    {{ $items->status }}</p>
                                <a href="/book-edit/{{ $items->slug }}"
                                    class="badge bg-warning d-flex justify-content-center" tabindex="-1"
                                    role="button"><span data-feather="edit"></span></a>
                                <form id="deleteForm{{ $items->id }}" action="book-delete/{{ $items->slug }}"
                                    method="post">
                                    @method('delete')
                                    @csrf
                                    <div class="d-grid gap-2 mt-2">
                                        <button type="submit" class="badge bg-danger border-0"
                                            onclick="return confirmDeleteBook('{{ $items->slug }} will be deleted', {{ $items->id }}, event, 'Delete book')">
                                            <span data-feather="trash"></span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

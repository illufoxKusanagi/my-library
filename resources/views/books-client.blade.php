@extends('dashboard.layouts.main-client')
@section('container')
    <h2 class="h2">Books</h2>
@endsection

@section('body-content')
    <form action="" method="get">
        <div class="row">
            <div class="col-12 col-sm-6">
                <select name="category" class="form-select" aria-label="Default select example" onchange="this.form.submit()">
                    <option value="" selected>Select Category</option>
                    @foreach ($categories as $items)
                        <option value="{{ $items->id }}" {{ request('category') == $items->id ? 'selected' : '' }}>{{ $items->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-sm-6">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="title" placeholder="Search title">
                    <button class="btn btn-outline-primary" type="button" id="button-addon2">Search</button>
                </div>
            </div>
        </div>
    </form>
    <div class="mt-2 d-flex">
        <div class="row">
            @foreach ($books as $items)
                <div class="col-lg-3 col-md-4 mb-3">
                    <div class="card h-100 w-100" style="width: 18rem;">
                        <div class="card-body d-flex flex-column justify-content-between align-items-center">
                            @if ($items->cover != '')
                                <img src="{{ asset('storage/cover/' . $items->cover) }}" class="rounded-1 w-100"
                                    alt="Cover" width="250" style="border: solid 1px">
                            @else
                                <img src="{{ asset('image/templaet.jpg') }}" class="rounded-1 w-100" alt="Cover"
                                    width="250px" style="border: solid 1px">
                            @endif
                            <h4 class="card-title">{{ $items->title }}</h4>
                            <div>
                                <h6><strong>Book code : </strong>{{ $items->book_code }}
                                </h6>
                                <h6><strong>Genre : </strong>
                                    @foreach ($items->categories as $category)
                                        {{ $category->name }}
                                    @endforeach
                                </h6>
                                <p style="font-size: 0.9em; max-height: 100px; overflow-y: auto;">
                                    {{ $items->synopsis ?? 'No synopsis available.' }}
                                </p>
                                <p
                                    class="card-text text-end fw-bold {{ $items->status == 'available' ? 'text-success' : 'text-danger' }}">
                                    {{ $items->status }}</p>
                                <a href="/request-rent/{{ $items->slug }}"
                                    class="badge bg-primary d-flex justify-content-center" tabindex="-1" role="button"
                                    {{-- onclick="return confirmItem('{{ $items->slug }} will be loaned', {{ $items->id }}, event)" --}}>
                                    <h6 class="d-inline">Loan</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

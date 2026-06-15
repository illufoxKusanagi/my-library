@extends('dashboard.layouts.main-client')
@section('container')
    <h2 class="h2">Welcome back, {{ auth()->user()->username }}</h2>
@endsection
@section('body-content')
    <h2 class="h2 d-flex justify-content-center">Book you loaned</h2><br>
    <div class="mt-2">
        <div class="row d-flex justify-content-between">
            @foreach ($rentLogs as $items)
                <div class="col-4 mb-3">
                    <div class="card mb-3" style="width: 18rem;">
                        <div class="card-body d-flex flex-column justify-content-between align-items-center h-100">
                            <h5 class="card-title">{{ $items->book->title }}</h5>
                            <div class="mt-3">
                                @if ($items->book->cover != '')
                                    <img src="{{ asset('storage/cover/' . $items->book->cover) }}" class="rounded-1 w-100"
                                        alt="Cover" style="border: solid 1px">
                                @else
                                    <img src="{{ asset('image/templaet.jpg') }}" class="rounded-1 w-100" alt="Cover"
                                        style="border: solid 1px">
                                @endif
                                <p class="mt-3"><strong>Rent date : </strong>{{ $items->rent_date }}</p>
                                <p><strong>Return date : </strong>{{ $items->return_date }}</p>
                                <p>
                                    {{ $items->book->synopsis }}
                                </p>
                                <a href="/request-return/{{ $items->book->slug }}"
                                    class="badge bg-primary d-flex justify-content-center" tabindex="-1" role="button">
                                    <h6 class="d-inline">Return book</h6>
                                </a>
                                {{-- <form id="deleteForm{{ $items->id }}" action="book-delete/{{ $items->slug }}"
                                method="post">
                                @method('delete')
                                @csrf
                                <div class="d-grid gap-2 mt-2">
                                    <button type="submit" class="badge bg-danger border-0"
                                        onclick="return confirmDeleteBook('{{ $items->slug }} will be deleted', {{ $items->id }}, event, 'Delete book')">
                                        <span data-feather="trash"></span></button>
                                </div>
                            </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

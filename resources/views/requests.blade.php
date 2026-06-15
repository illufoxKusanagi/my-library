@extends('dashboard.layouts.main')
@section('container')
    <h2 class="h2">Requests list</h2>
@endsection

@section('body-content')
    {{-- <a href="categories-add" class="btn btn-primary" role="button"><span data-feather="plus-square"></span>
        Add data</a>
    <a href="categories-deleted" class="btn btn-info" role="button"><span data-feather="eye"></span>
        View Deleted data</a> --}}
    <div class="mt-2 d-flex justify-content-between">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Book Title</th>
                    <th scope="col">Type</th>
                    <th scope="col">Request Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $items)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $items->user->username }}</td>
                        <td>{{ $items->book->title }}</td>
                        <td>{{ $items->type }}</td>
                        <td>{{ $items->request_date }}</td>
                        <td>{{ $items->status }}</td>
                        <td>
                            <a href="/rent-accept/{{ $items->id }}" class="badge bg-success" tabindex="-1"
                                role="button"><span data-feather="check-square" {{-- onclick="return confirmItem('You are about to accept this {{ $items->type }} request',{{ $items->id }}, event)" --}}></span></a>
                            <a href="/rent-reject/{{ $items->id }}" class="badge bg-danger" tabindex="-1"
                                role="button"><span data-feather="x-square" {{-- onclick="return confirmItem('You are about to reject this {{ $items->type }} request',{{ $items->id }}, event)" --}}></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

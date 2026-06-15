@extends('dashboard.layouts.main')
@section('container')
    <h2 class="h2">Welcome back, {{ auth()->user()->username }}</h2>
@endsection
@section('body-content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card-content" style="background-color: #0032a8">
                <div class="row">
                    <div class="col-6"><i class="bi bi-book-half" style="font-size: 50px"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <h4 class="card-title">Books</h4>
                        <p class="card-text">{{ $book_count }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-content" style="background-color: #0096a3">
                <div class="row">
                    <div class="col-6"><i class="bi bi-people-fill" style="font-size: 50px"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <h4 class="card-title">Users</h4>
                        <p class="card-text">{{ $user_count }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-content" style="background-color: #00a344">
                <div class="row">
                    <div class="col-6"><i class="bi bi-list-task" style="font-size: 50px"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <h4 class="card-title">Categories</h4>
                        <p class="card-text">{{ $category_count }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <div class="row d-flex justify-content-between">
            <div class="col-lg-6">
                <h1>Loan Logs</h1>
                <a href="/book-rent" class="btn btn-primary mb-4 mt-2" role="button"><span
                        data-feather="plus-square"></span>
                    Add loan data</a>
            </div>
        </div>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">User</th>
                    <th scope="col">Book Title</th>
                    <th scope="col">Rent Date</th>
                    <th scope="col">Return Date</th>
                    <th scope="col">Actual Return Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rentLogs as $items)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $items->user->username }}</td>
                        <td>{{ $items->book->title }}</td>
                        <td>{{ $items->rent_date }}</td>
                        <td>{{ $items->return_date }}</td>
                        <td>{{ $items->actual_return_date }}</td>
                        <td
                            class="{{ $items->actual_return_date
                                ? ($items->actual_return_date <= $items->return_date
                                    ? 'bg-success text-white'
                                    : 'bg-danger text-white')
                                : 'bg-warning' }}">
                            <strong>{{ $items->actual_return_date
                                ? ($items->actual_return_date <= $items->return_date
                                    ? 'returned'
                                    : 'late returned')
                                : 'not returned' }}</strong>
                        </td>
                        <td
                            class="{{ $items->actual_return_date
                                ? ($items->actual_return_date <= $items->return_date
                                    ? 'bg-success text-white'
                                    : 'bg-danger text-white')
                                : 'bg-warning' }}">
                            <a href="/rent-return/{{ $items->user->slug }}" class="btn btwn-sm btn-primary"
                                role="button"><span data-feather="plus-square"></span>Return</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

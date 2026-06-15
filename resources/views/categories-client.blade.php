@extends('dashboard.layouts.main-client')
@section('container')
    <h2 class="h2">Book Categories</h2>
@endsection

@section('body-content')
    <div class="mt-2 d-flex">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $items)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $items->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

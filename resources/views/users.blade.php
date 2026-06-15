@extends('dashboard.layouts.main')
@section('container')
    <h2 class="h2">Users list</h2>
@endsection

@section('body-content')
    <a href="/user-deleted" class="btn btn-primary" role="button"><span data-feather="eye"></span>
        View banned user</a>
    <div class="mt-2 d-flex">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $items)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $items->username }}</td>
                        <td>{{ $items->email }}</td>
                        <td>{{ $items->phone }}</td>
                        <td>{{ $items->address }}</td>
                        <td>
                            <a href="user-detail/{{ $items->slug }}" class="badge bg-info" tabindex="-1"
                                role="button"><span data-feather="info"></span>
                                <h6 class="d-inline"> Detail</h6>
                            </a>
                            <form id="deleteForm{{ $items->id }}" action="user-delete/{{ $items->slug }}" method="post"
                                class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="button" class="badge bg-danger border-0"
                                    onclick="return confirmDeleteUser('User with username ({{ $items->username }}) will be banned',{{ $items->id }}, event)">
                                    <span data-feather="trash"></span>
                                    <h6 class="d-inline"> Ban user</h6>
                                </button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

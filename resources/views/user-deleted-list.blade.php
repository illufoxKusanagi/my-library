@extends('dashboard.layouts.main')
@section('container')
    <h2 class="h2">Users list</h2>
@endsection

@section('body-content')
    <a href="/users" class="btn btn-primary align-items-center" role="button"><span data-feather="arrow-left-circle"></span>
        Back</a>
    <div class="mt-2 d-flex">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedUser as $items)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $items->username }}</td>
                        <td>{{ $items->phone }}</td>
                        <td>
                            <form id="restoreForm{{ $items->id }}" action="user-restore/{{ $items->slug }}"
                                method="post" class="d-inline">
                                @method('put')
                                @csrf
                                <button type="submit" class="badge bg-danger border-0"
                                    onclick="return confirmRestore('{{ $items->slug }} will be restored',{{ $items->id }}, event)">
                                    <h6 class="d-inline">Restore </h6><span data-feather="repeat"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

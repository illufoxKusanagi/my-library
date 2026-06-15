@extends('dashboard.layouts.main')
@section('container')
    <h2 class="h2">Book Categories</h2>
@endsection

@section('body-content')
    <a href="categories-add" class="btn btn-primary" role="button"><span data-feather="plus-square"></span>
        Add data</a>
    <a href="categories-deleted" class="btn btn-info" role="button"><span data-feather="eye"></span>
        View Deleted data</a>
    <div class="mt-2 d-flex justify-content-between">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $items)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $items->name }}</td>
                        <td>
                            <a href="categories-edit/{{ $items->slug }}" class="badge bg-warning" tabindex="-1"
                                role="button"><span data-feather="edit"></span></a>
                            <form id="deleteForm{{ $items->id }}" action="categories-delete/{{ $items->slug }}"
                                method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="button" class="badge bg-danger border-0"
                                    onclick="return confirmDelete('{{ $items->slug }} will be deleted',{{ $items->id }}, event)"><span
                                        data-feather="trash"></span></button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

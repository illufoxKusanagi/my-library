@extends('dashboard.layouts.main')
@section('container')
    <h2 class="h2">Books</h2>
@endsection

@section('body-content')
    <a href="book-add" class="btn btn-primary" role="button"><span data-feather="plus-square"></span>
        Add data</a>
    <a href="book-deleted" class="btn btn-info" role="button"><span data-feather="eye"></span>
        View Deleted data</a>
    <div class="mt-2 d-flex">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Code</th>
                    <th scope="col">Title</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Cover</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $items)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $items->book_code }}</td>
                        <td>{{ $items->title }}</td>
                        <td>
                            @foreach ($items->categories as $category)
                                {{ $category->name }},
                            @endforeach
                        </td>
                        <td>
                            <div>
                                @if ($items->cover != '')
                                    <img src="{{ asset('storage/cover/' . $items->cover) }}" class="rounded-1"
                                        alt="Cover" width="150" style="border: solid 1px">
                                @else
                                    <img src="{{ asset('image/templaet.jpg') }}" class="rounded-1" alt="Cover"
                                        width="150px" style="border: solid 1px">
                                @endif
                            </div>
                        </td>
                        <td>{{ $items->status }}</td>
                        <td>
                            <a href="/book-edit/{{ $items->slug }}" class="badge bg-warning" tabindex="-1"
                                role="button"><span data-feather="edit"></span></a>
                            <form id="deleteForm{{ $items->id }}" action="book-delete/{{ $items->slug }}" method="post"
                                class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="badge bg-danger border-0"
                                    onclick="return confirmDeleteBook('{{ $items->slug }} will be deleted', {{ $items->id }}, event, 'Delete book')">
                                    <span data-feather="trash"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

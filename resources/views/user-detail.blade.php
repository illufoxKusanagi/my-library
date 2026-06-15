@extends('dashboard.layouts.main')
@section('container')
    <h2 class="h2"> "{{ $user->slug }}" details</h2>
@endsection

@section('body-content')
    <a href="/users" class="btn btn-primary align-items-center" role="button"><span data-feather="arrow-left-circle"></span>
        Back</a>
    <div class="mt-2">
        <div class="row justify-content-between">
            <div class="col-6 mb-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                        <h4 class="card-title">Profile</h4>
                        <div class="mt-3">
                            <p><strong>Username : </strong>{{ $user->slug }}</p>
                            <p><strong>Email : </strong>{{ $user->email }}</p>
                            <p><strong>Phone : </strong>{{ $user->phone }}</p>
                            <p><strong>Address : </strong>{{ $user->address }}</p>
                            {{-- <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam
                                assumenda magnam ad voluptatibus similique quo quasi, nam illo magni perferendis
                                pariatur labore suscipit, commodi cumque veritatis! Aliquid cumque autem ab?
                            </p> --}}
                            {{-- <a href="/book-edit/{{ $items->slug }}" class="badge bg-warning d-flex justify-content-center"
                                tabindex="-1" role="button"><span data-feather="edit"></span></a>
                            <form id="deleteForm{{ $items->id }}" action="book-delete/{{ $items->slug }}"
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
            <div class="col-6 mb-3">
                @foreach ($rentLogs as $items)
                    <div class="card mb-3" style="width: 18rem;">
                        <div class="card-body d-flex flex-column justify-content-between align-items-center">
                            <h5 class="card-title">Loaned Books</h5>
                            <h5 class="card-title">{{ $items->book->title }}</h5>
                            <div class="mt-3">
                                @if ($items->book->cover != '')
                                    <img src="{{ asset('storage/cover/' . $items->book->cover) }}" class="rounded-1 w-100"
                                        alt="Cover" width="250px" style="border: solid 1px">
                                @else
                                    <img src="{{ asset('image/templaet.jpg') }}" class="rounded-1 w-100" alt="Cover"
                                        width="250px" style="border: solid 1px">
                                @endif
                                <p><strong>Rent date : </strong>{{ $items->rent_date }}</p>
                                <p><strong>Return date : </strong>{{ $items->return_date }}</p>
                                <p><strong>Address : </strong>{{ $user->address }}</p>
                                {{-- <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam
                                assumenda magnam ad voluptatibus similique quo quasi, nam illo magni perferendis
                                pariatur labore suscipit, commodi cumque veritatis! Aliquid cumque autem ab?
                            </p> --}}
                                {{-- <a href="/book-edit/{{ $items->slug }}" class="badge bg-warning d-flex justify-content-center"
                                tabindex="-1" role="button"><span data-feather="edit"></span></a>
                            <form id="deleteForm{{ $items->id }}" action="book-delete/{{ $items->slug }}"
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
                @endforeach
            </div>
        </div>
    </div>
    {{-- <div class="mt-2 d-flex">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->phone }}</td>
                    </td>
                </tr>
            </tbody>
        </table>
    </div> --}}
@endsection

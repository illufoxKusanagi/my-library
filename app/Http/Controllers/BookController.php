<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Categories;
use RealRashid\SweetAlert\Facades\Alert;

class BookController extends Controller
{
    //digunakan untuk masuk ke laman books-client, dimana user(admin) bisa melihat daftar buku
    public function index(Request $request)
    {
        $categories = Categories::all();
        if (!$request->category && !$request->title) {
            $books = Book::all();
        } else {
            $books = Book::query();
            if ($request->category) {
                $books->whereHas('categories', function ($query) use ($request) {
                    $query->where('categories.id', $request->category);
                });
            }
            if ($request->filled('title')) {
                $books->where('title', 'like', '%' . $request->title . '%');
            }
            $books = $books->get();
        }

        return view('book-list', ['books' => $books, 'categories' => $categories]);
    }
    public function list()
    {
        $books = Book::all();
        return view('books', ['books' => $books]);
    }
    //digunakan untuk masuk ke laman books-client, dimana user(client) bisa melihat daftar buku
    public function indexClient(Request $request)
    {
        $categories = Categories::all();
        if (!$request->category && !$request->title) {
            $books = Book::all();
        } else {
            $books = Book::query();
            if ($request->category) {
                $books->whereHas('categories', function ($query) use ($request) {
                    $query->where('categories.id', $request->category);
                });
            }
            if ($request->filled('title')) {
                $books->where('title', 'like', '%' . $request->title . '%');
            }
            $books = $books->get();
        }

        return view('books-client', ['books' => $books, 'categories' => $categories]);
    }
    //digunakan untuk masuk ke laman book-book
    public function add()
    {
        $categories = Categories::all();
        return view('book-add', ['title' => 'Add Book', 'categories' => $categories]);
    }
    //digunakan untuk menyimpan data buku, setelah menambahkan di laman book-add
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:100',
            'title' => 'required|max:255',
            'cover' => 'nullable|image|max:2048',
            'synopsis' => 'nullable'
        ]);

        try {
            $newBook = new Book();
            $newBook->fill($validated);

            if ($request->hasFile('cover')) {
                $extension = $request->file('cover')->getClientOriginalExtension();
                $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
                $path = $request->file('cover')->storeAs('cover', $newName); // Simpan file di direktori public/storage
                $newBook->cover = $newName;
            }

            $newBook->save();
            $newBook->categories()->sync($request->categories);

            Alert::success('Success', 'Book added successfully');
            return redirect('books-admin');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to add book');
            return back();
        }
    }

    //digunakan untuk masuk ke laman edit-book
    public function edit($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $categories = Categories::all();
        return view('book-edit', ['title' => 'Edit Book', 'book' => $book, 'categories' => $categories]);
    }
    //digunakan untuk mengupdate data buku, setelah mengeditnya di laman book-edit
    public function update(Request $request, $slug)
    {
        $book = Book::where('slug', $slug)->first();
        $validated = $request->validate([
            'book_code' => 'required|unique:books,book_code,' . $book->id . '|max:100',
            'title' => 'required|max:255',
            'cover' => 'nullable|image|max:2048',
            'synopsis' => 'nullable'
        ]);

        if ($request->hasFile('cover')) {
            $coverFile = $request->file('cover');
            $extension = $coverFile->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $path = $coverFile->storeAs('cover', $newName);
            $validated['cover'] = $newName;
        }
        $book->update($validated);

        if ($request->categories) {
            $book->categories()->sync($request->categories);
        }
        Alert::success('Success', 'Edited successfully');
        return redirect('books-admin');
    }
    //digunakan untuk menghapus data buku, setelah menekan tombol delete
    public function delete($slug)
    {
        $book = Book::where('slug', $slug)->first();
        if (!$book) {
            Alert::success('Error', 'Book not found');
            return redirect('book-list');
        }
        $book->delete();
        Alert::success('Success', $slug . ' deleted successfully');
        return redirect('book-list');
    }
    //digunakan untuk masuk ke laman book-deleted-list untuk melihat list buku yang sudah terhapus
    public function deletedBook()
    {
        $deletedBook = Book::onlyTrashed()->get();
        return view('book-deleted-list', ['deletedBook' => $deletedBook]);
    }
    //digunakan untuk restore data buku, setelah menekan tombol restore
    public function restore($slug)
    {
        $book = Book::withTrashed()->where('slug', $slug)->first();
        if ($book) {
            $book->restore();
            Alert::success('Success', 'Book restored successfully');
            return redirect('book-list');
        } else {
            Alert::error('Error', 'Book not found');
            return back();
        }
    }
}

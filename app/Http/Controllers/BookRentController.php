<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\RentLogs;
use App\Models\User;
use App\Models\RequestList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class BookRentController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', 1)->get();
        $books = Book::all();
        $rentLogs = RentLogs::with(['user', 'book'])->get();
        return view("book-rent", ["title" => "Rent Book", "books" => $books, "users" => $users, "rentLogs" => $rentLogs]);
    }
    public function store(Request $request)
    {
        $requestDate = RequestList::where('user_id', $request->user_id)->first();

        // Pastikan data requestDate ditemukan sebelum menggunakan nilainya
        if ($requestDate) {
            // Isi rent_date dengan nilai dari request_date
            $rentDate = $requestDate->request_date;

            // Tambahkan rent_date dan return_date ke data yang akan disimpan
            $requestData = $request->only(['user_id', 'book_id']);
            $requestData['rent_date'] = $rentDate;
            $requestData['return_date'] = Carbon::now()->addDay(7)->toDateString();

            // Lakukan validasi pada status buku
            $bookStatus = Book::findOrFail($request->book_id)->only('status');
            if ($bookStatus['status'] != "available") {
                Alert::error('Error', 'The book is unavailable');
                return back();
            }

            $count = RentLogs::where('user_id', $request->user_id)
                ->whereNull('actual_return_date')
                ->count();

            if ($count >= 3) {
                Alert::error('Cannot loan', 'User has reached book loan limit');
                return back();
            }

            try {
                DB::beginTransaction();

                // Membuat entri baru pada RentLogs
                RentLogs::create($requestData);

                // Ubah status buku menjadi unavailable
                $book = Book::findOrFail($request->book_id);
                $book->status = 'unavailable';
                $book->save();

                DB::commit();
                Alert::success('Success', 'New rent has been added');
                return redirect('dashboard');
            } catch (\Throwable $th) {
                DB::rollBack();
                Log::error('Error creating new rent: ' . $th->getMessage());
                Alert::error('Error', 'Failed to add new rent');
                return back();
            }
        } else {
            Alert::error('Error', 'Request data not found');
            return back();
        }
    }
    public function returnBook($slug)
    {
        $user = User::where('slug', $slug)->first();
        $books = Book::all();
        $rentLogs = RentLogs::with(['user', 'book'])->get();
        return view('rent-return', ["title" => "Return Book", "books" => $books, "user" => $user, "rentLogs" => $rentLogs]);
    }

    public function storeReturnBook(Request $request)
    {
        $user_id = $request->user_id;
        $book_id = $request->book_id;

        $rent = RentLogs::where('user_id', $user_id)->where('book_id', $book_id)->first();
        if (!$rent) {
            return back()->withError('Rent data not found');
        }

        // Ambil tanggal peminjaman dari request_date di RequestList
        $requestDate = RequestList::where('user_id', $user_id)->first();
        if (!$requestDate) {
            return back()->withError('Request data not found');
        }
        $rentDate = $requestDate->request_date;

        $rent->update(['actual_return_date' => $rentDate]);

        $book = Book::findOrFail($book_id);
        $book->status = 'available';
        $book->save();

        return redirect('dashboard')->withSuccess('Book returned successfully');
    }

    // public function storeReturnBook(Request $request)
    // {
    //     $rent = RentLogs::where('user_id', $request->user_id)->where('book_id', $request->book_id)->first();

    //     if (!$rent) {
    //         return back()->withError('Rent data not found');
    //     }

    //     $requestDate = RequestList::where('user_id', $request->user_id)->first();

    //     if (!$requestDate) {
    //         return back()->withError('Request data not found');
    //     }

    //     $rentDate = $requestDate->request_date;

    //     $rent->update(['return_date' => $rentDate]);

    //     $book = Book::findOrFail($request->book_id);
    //     $book->status = 'available';
    //     $book->save();

    //     return redirect('dashboard')->withSuccess('Book returned successfully');
    // }
}

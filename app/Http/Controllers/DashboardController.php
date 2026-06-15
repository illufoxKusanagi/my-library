<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Categories;
use App\Models\RentLogs;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    //digunakan untuk masuk ke view dashboard (admin)
    public function index(Request $request)
    {
        $bookCount = Book::count();
        $categoryCount = Categories::count();
        $userCount = User::count();
        $users = User::where('id', '!=', 1)->get();
        $books = Book::all();
        $rentLogs = RentLogs::all();
        return view('dashboard', [
            'book_count' => $bookCount, 'category_count' => $categoryCount,
            'user_count' => $userCount, "books" => $books, "users" => $users, "rentLogs" => $rentLogs
        ]);
    }
    //digunakan untuk masuk ke view dashboard (client)
    public function userView(Request $request)
    {
        $users = User::where('role_id', 2)->get();
        return view('users', ['users' => $users]);
    }
    //digunakan untuk masuk ke view user-detail, dimana detail pribadi dan buku yang dipinjam ditampilkan disini
    public function userDetailView($slug)
    {
        $user = User::where('slug', $slug)->first();
        $rentLogs = RentLogs::with(['user', 'book'])->where('user_id', $user->id)->get();
        return view('user-detail', ['user' => $user, 'rentLogs' => $rentLogs]);
    }
    //digunakan untuk menghapus data user
    public function delete($slug)
    {
        $user = User::where('slug', $slug)->first();
        if (!$user) {
            Alert::success('Error', 'User not found');
            return redirect('users');
        }
        $user->delete();
        Alert::success('Success', $slug . ' deleted successfully');
        return redirect('users');
    }
    //digunakan untuk melihat data user yang dihapus
    public function deletedUser()
    {
        $deletedUser = User::onlyTrashed()->get();
        return view('user-deleted-list', ['deletedUser' => $deletedUser]);
    }
    //digunakan untuk melakukan restore data user yang dihapus
    public function restore($slug)
    {
        $user = User::withTrashed()->where('slug', $slug)->first();
        if ($user) {
            $user->restore();
            Alert::success('Success', 'User restored successfully');
            return redirect('users');
        } else {
            Alert::error('Error', 'User not found');
            return back();
        }
    }
}

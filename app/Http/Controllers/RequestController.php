<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Categories;
use App\Models\RentLogs;
use App\Models\User;
use App\Models\RequestList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RequestController extends Controller
{
    //digunakan untuk melihat view request yang ada (admin)
    public function index()
    {
        $requests = RequestList::all();
        return view('requests', ['requests' => $requests]);
    }
    //digunakan bagi client yang melakukan request peminjaman
    public function requestRent($slug)
    {
        $book = Book::where('slug', $slug)->first();
        if (!$book || $book->status != 'available') {
            Alert::error('Error', $book->title . ' is unavailable');
            return redirect()->back();
        }
        $request = new RequestList();
        $request->user_id = auth()->user()->id;
        $request->book_id = $book->id;
        $request->request_date = now();
        $request->status = 'pending';
        $request->type = 'loan';
        $request->save();
        $book->update();
        Alert::success('Success', 'The book ' . $book->title . ' you loan will be accepted by admin');
        return redirect()->back();
    }
    //digunakan bagi client yang melakukan request pengembalian
    public function requestReturn($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $request = new RequestList();
        $request->user_id = auth()->user()->id;
        $request->book_id = $book->id;
        $request->request_date = now();
        $request->status = 'pending';
        $request->type = 'return';
        $request->save();
        $book->update();
        Alert::success('Success', 'The book ' . $book->title . ' you return will be accepted by admin');
        return redirect()->back();
    }
    //digunakan untuk melihat view request yang ada (client)
    public function requestListClient()
    {
        $userId = Auth::user()->id;
        $requestLists = RequestList::where('user_id', $userId)->get();
        return view('requests-client', ['requestLists' => $requestLists]);
    }
    //digunakan untuk mengupdate status request yang diberikan user menjadi accepted
    public function rentAccept($id)
    {
        $request = RequestList::find($id);
        $request->status = 'accepted';
        $request->save();
        return redirect()->back()->with('success', 'Request accepted successfully');
    }
    //digunakan untuk mengupdate status request yang diberikan user menjadi rejected
    public function rentReject($id)
    {
        $request = RequestList::find($id);
        $request->status = 'rejected';
        $request->save();
        return redirect()->back()->with('success', 'Request rejected successfully');
    }
}

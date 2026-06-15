<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryController extends Controller
{
    //digunakan untuk masuk ke view category (admin)
    public function index(Request $request)
    {
        $categories = Categories::all();
        return view('categories', ['categories' => $categories]);
    }
    //digunakan untuk masuk ke view category (client)
    public function indexClient(Request $request)
    {
        $categories = Categories::all();
        return view('categories-client', ['categories' => $categories]);
    }
    //digunakan untuk masuk ke view category-add
    public function add()
    {
        return view('categories-add', ["title" => "Add Category"]);
    }
    //digunakan untuk menyimpan data category yang telah ditambahkan pada view category-add
    public function store(Request $request)
    {
        $name = $request->input('name');
        $category = Categories::where('name', $name)->first();

        $validated = $request->validate([
            'name' => 'required | unique:categories|max:100',
        ]);
        if (!$validated)
            return back();
        $newCategory = Categories::create($request->all());
        Alert::success('Success', 'Category added successfully');
        return redirect('categories');
    }
    //digunakan untuk masuk ke view categories-edit
    public function edit($slug)
    {
        $category = Categories::where('slug', $slug)->first();
        return view('categories-edit', ["title" => "Add Category", "category" => $category]);
    }
    //digunakan untuk update data category yang telah diupdate pada view categories-edit
    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'name' => 'required | unique:categories|max:100',
        ]);
        $categories = Categories::where('slug', $slug)->first();
        if ($categories) {
            $categories->slug = null;
        }
        $categories->update($request->all());
        Alert::success('Success', 'Category updated');
        return redirect('categories');
    }
    //digunakan untuk delete category yang ketika user menekan tombol delete pada column tertentu
    public function delete($slug)
    {
        $category = Categories::where('slug', $slug)->first();
        if (!$category) {
            Alert::error('Error', 'Category not found');
            return redirect('categories');
        }

        $category->delete();
        Alert::success('Success', 'Category deleted successfully');
        return redirect('categories');
    }
    //digunakan untuk masuk ke view categories-deleted-list untuk menampilkan data category yang dihapus
    public function deletedCategory()
    {
        $deletedCategories = Categories::onlyTrashed()->get();
        return view('categories-deleted-list', ['deletedCategories' => $deletedCategories]);
    }
    //digunakan untuk restore category yang ketika user menekan tombol restore pada column tertentu
    public function restore($slug)
    {
        $category = Categories::withTrashed()->where('slug', $slug)->first();
        if ($category) {
            $category->restore();
            Alert::success('Success', 'Category restored successfully');
            return redirect('categories');
        } else {
            Alert::error('Error', 'Category not found');
            return back();
        }
    }
}

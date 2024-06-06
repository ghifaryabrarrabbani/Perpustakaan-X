<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('Halaman/kategori',['categories'=>$categories]);
    }

    public function add()
    {
        return view('Halaman/kategori-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|unique:kategori|max:20',
            'category' => 'required|unique:kategori|max:100',
        ]);
    
        // Anda seharusnya menggunakan model "Category" bukan "Kategori" jika nama modelnya adalah "Category"
        $category = new Category();
        $category->id = $request->input('id');
        $category->category = $request->input('category');
        $category->save();
    
        // Setelah menyimpan data, alihkan ke halaman yang sesuai (misalnya halaman kategori)
        return redirect('/kategori')->with('status', 'Category Added Successfully');
    }
    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('Halaman/kategori-edit', ['category'=> $category]);
    }

    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'id' => 'required|max:20',
            'category' => 'required|max:100',
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug =null;
        $category->update($request->all());
        return redirect('/kategori')->with('status', 'Category Updated Successfully');
    }
    public function delete($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('Halaman/kategori-delete', ['category'=>$category]);
    }
    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('kategori')->with('status', 'Category Deleted Successfully');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create() {
        // $this->authorize('isAdmin');

        $categories = Category::all();

        return view('createBook', compact('categories'));
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'Judul' => 'required|unique:books|min:5|max:255',
            'Author' => 'required|min:5|max:255',
            'PublishDate' => 'required|date',
            'Stock' => 'required|numeric|min:1',
            'Image' => 'required|mimes:jpg,png,jpeg,pdf'
        ]);

        $extension = $request->file('Image')->getClientOriginalExtension();
        $filename = $request->Judul . '_' . $request->Author . '.' . $extension;
        $request->file('Image')->storeAs('/public/Book/', $filename);

        Book::create([
            'Judul' => $request->Judul,
            'Author' => $request->Author,
            'PublishDate' => $request->PublishDate,
            'Stock' => $request->Stock,
            'Image' => $filename,
            'category_id' => $request->category
        ]);

        return redirect('/home');
    }

    public function index() {
        $books = Book::all();

        return view('welcome', compact('books'));
    }

    public function show($id) {
        $books = Book::findOrFail($id);

        return view('showBook', compact('books'));
    }

    public function edit($id) {
        $book = Book::findOrFail($id);

        return view('editBook', compact('book'));
    }

    public function update(Request $request, $id) {

        $extension = $request->file('Image')->getClientOriginalExtension();
        $filename = $request->Judul . '_' . $request->Author . '.' . $extension;
        $request->file('Image')->storeAs('/public/Book/', $filename);

        Book::findOrFail($id)->update([
            'Judul' => $request->Judul,
            'Author' => $request->Author,
            'PublishDate' => $request->PublishDate,
            'Stock' => $request->Stock,
            'Image' => $filename
        ]);

        return redirect('/home');
    }

    public function delete($id) {
        Book::destroy($id);

        return redirect('/home');
    }
}

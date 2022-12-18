<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create() {
        return view('createBook');
    }

    public function store(Request $request) {
        Book::create([
            'Judul' => $request->Judul,
            'Author' => $request->Author,
            'PublishDate' => $request->PublishDate,
            'Stock' => $request->Stock
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
}

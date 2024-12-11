<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Method untuk menampilkan halaman utama
    public function index()
    {
        return view('index', [
            'categories' => Category::all(),
            'selectedCategory' => Book::where('category_id', 1)->take(4)->get(), // Default kategori
        ]);
    }

    // Method untuk filter berdasarkan kategori
    public function category(Request $request)
    {
        // Validasi input untuk memastikan category_id adalah angka
        $validatedData = $request->validate([
            'selectedCategory' => 'required|integer|exists:categories,id',
        ]);

        // Ambil kategori yang dipilih
        $selectedCategory = $validatedData['selectedCategory'];

        return view('index', [
            'categories' => Category::all(),
            'selectedCategory' => Book::where('category_id', $selectedCategory)->take(4)->get(),
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::orderBy('id', 'asc')->get();
        return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ['Makanan Utama', 'Minuman', 'Penutup'];
        return view('menus.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:Makanan Utama,Minuman,Penutup',
            'price' => 'required|numeric|min:0',
            'cook_minutes' => 'required|integer|min:1',
            'added_at' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $validated['is_spicy'] = $request->boolean('is_spicy');

        Menu::create($validated);

        return redirect()->route('menus.index')
            ->with('success', 'Menu hidangan berhasil ditambahkan!');
    }
}

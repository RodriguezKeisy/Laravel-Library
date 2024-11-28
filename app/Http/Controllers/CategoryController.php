<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $categories = Category::all();
        $categories = Category::orderby('name', 'asc')->get();
        return view('Category/index-category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        return view('Category/add-category', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request): RedirectResponse
    {

        Category::create($request->validated());

        return redirect()->route('categories.index')->with('success', 'Categoria aggiunta con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category):View
    {
        return view('Category/edit-category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {

        $category->update($request->validated());
        return redirect()->route('categories.index')->with('success', 'Categoria aggiornata con successo!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Categoria eliminata con successo!');
    }
}

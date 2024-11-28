<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $authors = Author::all();
        $authors = Author::orderby('name', 'asc')->get();
        return view('Author/index-author', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $authors = Author::all();
        return view('Author/add-author', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorRequest $request): RedirectResponse
    {
        Author::create($request->validated());

        return redirect()->route('authors.index')->with('success', 'Autore aggiunto con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author):View
    {
        return view('Author/edit-author', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $request, Author $author):RedirectResponse
    {
        $author->update($request->validated());
        return redirect()->route('authors.index')->with('success', 'Autore modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author): RedirectResponse
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success','Autore eliminato correttamente');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $books = Book::with('author', 'category')->get();

        $books = Book::orderby('title', 'asc')->get();
        return view('index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // Recupera autori e categorie per il modulo di creazione del libro
        $authors = Author::all();
        $categories = Category::all();

        // Ritorna la vista 'books.create' passando i dati necessari
        return view('Book.add-book', compact('authors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request): RedirectResponse
    {
        // Recupera i dati validati dal form
        $bookData = $request->validated();

        // Se viene fornita un'immagine
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Verifica che l'immagine sia valida
            if ($image->isValid()) {
                // Estrai l'estensione dell'immagine
                $extension = $image->getClientOriginalExtension();

                // Percorso dove salvare l'immagine
                $destinationPath = public_path('img/books');

                // Crea la cartella se non esiste
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }

                // Genera un nome univoco per l'immagine
                $imageName = uniqid('book_', true) . '.' . $extension;
                $imagePath = $destinationPath . '/' . $imageName;

                $manager = new ImageManager(Driver::class);

                $imageManager = $manager->read($image->getRealPath());
                $image = $imageManager->cover(400, 520);
                $image->save($imagePath);

                // Aggiungi il percorso dell'immagine ai dati del libro
                $bookData['image'] = 'img/books/' . $imageName;
            } else {
                // Se l'immagine non è valida, restituisci un errore
                return redirect()->back()->withErrors(['image' => 'Invalid image file.']);
            }
        } else {
            // Se non viene fornita un'immagine, usa l'immagine predefinita
            $bookData['image'] = 'img/default-book.jpg';
        }

        // Crea il libro nel database
        Book::create($bookData);

        // Reindirizza con un messaggio di successo
        return redirect()->route('home')->with('success', 'Libro aggiunto con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book):View
    {
        return view('Book/show-book', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book): View
    {
        // Recupera tutti gli autori e categorie per i dropdown
        $authors = Author::all();
        $categories = Category::all();

        return view('Book/edit-book', compact('book', 'authors', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book): RedirectResponse
    {
        // Recupera i dati validati dal form
        $bookData = $request->validated();

        // Se viene fornita una nuova immagine
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Verifica che l'immagine sia valida
            if ($image->isValid()) {
                // Estrai l'estensione dell'immagine
                $extension = $image->getClientOriginalExtension();

                // Percorso dove salvare l'immagine
                $destinationPath = public_path('img/books');

                // Crea la cartella se non esiste
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }

                // Genera un nome univoco per l'immagine
                $imageName = uniqid('book_', true) . '.' . $extension;
                $imagePath = $destinationPath . '/' . $imageName;

                // Usa ImageManager e Driver per gestire l'immagine
                $manager = new ImageManager(Driver::class);
                $imageManager = $manager->read($image->getRealPath());
                $image = $imageManager->cover(400, 520);
                $image->save($imagePath);

                // Elimina l'immagine precedente, se esiste
                if ($book->image && file_exists(public_path($book->image))) {
                    unlink(public_path($book->image));
                }

                // Aggiorna il percorso dell'immagine
                $bookData['image'] = $imageName;
            } else {
                // Se l'immagine non è valida, restituisci un errore
                return redirect()->back()->withErrors(['image' => 'Invalid image file.']);
            }
        }

        // Aggiorna i dati del libro
        $book->update($bookData);

        // Reindirizza con un messaggio di successo
        return redirect()->route('home')->with('success', 'Libro modificato con successo!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();
        return redirect()->route('home')->with('success', 'Libro eliminato con successo!');
    }
}

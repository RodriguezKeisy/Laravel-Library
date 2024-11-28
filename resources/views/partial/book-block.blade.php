<article class="row border-bottom border-dark-subtle py-3">
    <div class="col-9">
        <a href="{{route('book.show', $book->id)}}">
            <p class="mb-0">
                <strong>{{ Str::substr($book->book, 0, 20)}}
                    {{strlen($book->book) > 20 ? '...' : ''}}</strong>
            </p><small>{{$book->updated_at->format('d/m/Y H:i:s')}}
            </small></a>
    </div>
    <div class="col-3 d-flex align-items-center justify-content-end">

        <form action="{{ route("book.delete", $book->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Sei Sicuro? Stai eliminando un libro')">
                <i class="bi bi-trash"></i></button>
        </form>
        <a href="{{route('book.edit', $book->id) }}"><i class="bi bi-pencil ms-3"></i></a>
    </div>
</article>


<article class="row border-bottom border-dark-subtle py-3">
    <div class="col-9">
        <a href="{{route('category.show', $category->id)}}">
            <p class="mb-0">
                <strong>{{ Str::substr($category->category, 0, 20)}}
                    {{strlen($category->$category) > 20 ? '...' : ''}}</strong>
            </p><small>{{$category->updated_at->format('d/m/Y H:i:s')}}
            </small></a>
    </div>
    <div class="col-3 d-flex align-items-center justify-content-end">

        <form action="{{ route("category.delete", $category->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Sei Sicuro? Stai eliminando una categoria')">
                <i class="bi bi-trash"></i></button>
        </form>
        <a href="{{route('category.edit', $category->id) }}"><i class="bi bi-pencil ms-3"></i></a>
    </div>
</article>


<input
    id="title"
    type="text"
    name="title"
    @if($title)
        value="{{ $title }}"
    @else
        placeholder="Título"
    @endif
    class="form-control"
/>
<input
    id="original_title"
    type="text"
    name="original_title"
    @if($title)
        value="{{ $title }}"
    @else
        placeholder="Título Original"
    @endif
    class="form-control"
/>
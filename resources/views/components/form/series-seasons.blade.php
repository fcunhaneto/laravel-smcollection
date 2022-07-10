<input
    id="series_seasons"
    name="series_seasons"
    @if($seasons)
        value="{{ $seasons }}"
    @endif
    type="number"
    class="form-control"
    min="1"
/>
<input
    id="movie_duration"
    type="time"
    name="movie_duration"
    @if($duration)
        value="{{ substr($duration ,0 ,5) }}"
    @endif
    class="form-control"
/>
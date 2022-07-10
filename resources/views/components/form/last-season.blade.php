<input
        id="last_season"
        name="last_season"
        @if($last)
            value="{{ $last }}"
        @else
            value="0"
        @endif
        type="number"
        class="form-control"
        min="0"
/>
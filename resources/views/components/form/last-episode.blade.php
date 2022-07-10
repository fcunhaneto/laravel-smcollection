<input
        id="last_episode"
        name="last_episode"
        @if($last)
            value="{{ $last }}"
        @else
            value="0"
        @endif
        type="number"
        class="form-control"
        min="0"
/>
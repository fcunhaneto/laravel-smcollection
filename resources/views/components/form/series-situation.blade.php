<select id="series_situation" name="series_situation" class="form-select" aria-label="status select">
    {{ $total = count($situation) }}
    @for($i=0; $i < $total; $i++)
        <option value="{{ $situation[$i] }}" @if($actual === $situation[$i]) {{ "selected" }}@endif>
            {{ $situation[$i] }}
        </option>
    @endfor
</select>
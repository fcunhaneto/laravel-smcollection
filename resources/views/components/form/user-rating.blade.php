<select id="user_rating" name="user_rating" class="form-select">
    @for($i=0; $i < 6; $i++)
        @if($i === 0)
            <option value="0" @if($rating === 0) {{ "selected" }} @endif>Classificar</option>
        @else
            <option value="{{ $i }}" @if($rating === $i) {{ "selected" }} @endif>{{ $i . ' estrelas'}}</option>
        @endif
    @endfor
</select>
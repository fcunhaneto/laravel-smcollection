<select id="user_status" name="user_status" class="form-select" aria-label="status select">
    @if(!$actual)
        <option value="">Selecione um status</option>
    @endif
    {{ $total = count($user_status) }}
    @for($i=0; $i < $total; $i++)
        <option value="{{ $user_status[$i] }}" @if($actual === $user_status[$i]) {{ "selected" }}@endif>
            {{ $user_status[$i] }}
        </option>
    @endfor
</select>
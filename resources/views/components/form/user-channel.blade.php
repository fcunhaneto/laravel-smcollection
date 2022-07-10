<select id="user_channel" name="user_channel" class="form-select">
    @if(!$actual)
        <option selected value="">Selecione um Canal</option>
    @endif
    @foreach($channels as $channel)
        <option value="{{ $channel->name }}"  @if($actual === $channel->name) {{ "selected" }} @endif>
            {{ $channel->name }}
        </option>
    @endforeach
</select>
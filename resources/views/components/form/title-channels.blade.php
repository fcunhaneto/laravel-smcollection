<div class="row">
    @foreach($channels as $channel)
        <div class="col-6 col-lg-4 col-xl-3">
            <div class="form-check">
                <input
                        id="channel-{{ $channel->id }}"
                        class="form-check-input"
                        type="checkbox"
                        name="channels[]"
                        value="{{ $channel->id}},{{ $channel->name}}"
                @if($haystack)
                    @if(in_array($channel->id, $haystack))
                        {{ 'checked' }}
                            @endif
                        @endif
                >
                <label class="form-check-label" for="channel-{{ $channel->id }}">{{ $channel->name }}</label>
            </div>
        </div>
    @endforeach
</div>
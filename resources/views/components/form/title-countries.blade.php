<div class="row">
    @foreach($countries as $country)
        <div class="col-6 col-lg-4 col-xl-3">
            <div class="form-check">
                <input
                        id="country-{{ $country->id }}"
                        class="form-check-input"
                        type="checkbox"
                        name="countries[]"
                        value="{{ $country->id }},{{ $country->name }}"
                @if($haystack)
                    @if(in_array($country->id, $haystack))
                        {{ 'checked' }}
                    @endif
                @endif
                >
                <label class="form-check-label" for="country-{{ $country->id }}">{{ $country->name }}</label>
            </div>
        </div>
    @endforeach
</div>
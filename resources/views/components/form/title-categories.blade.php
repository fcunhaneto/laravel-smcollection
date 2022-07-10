<div class="row">
    @foreach($categories as $category)
        <div class="col-6 col-lg-4 col-xl-3">
            <div class="form-check">
                <input
                        id="category-{{ $category->id }}"
                        class="form-check-input"
                        type="checkbox"
                        name="categories[]"
                        value="{{ $category->id }},{{ $category->name }}"
                @if($haystack)
                    @if(in_array($category->id, $haystack))
                        {{ 'checked' }}
                            @endif
                        @endif
                >
                <label class="form-check-label" for="category-{{ $category->id }}">{{ $category->name }}</label>
            </div>
        </div>
    @endforeach
</div>
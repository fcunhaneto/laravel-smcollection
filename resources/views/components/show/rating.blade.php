@if($rating > 0)
    @for ($j=0; $j < $rating; $j++)
        <span class="text-gold"><i class="bi bi-star-fill"></i></span>
    @endfor
    @for ($j=0; $j < (5 - $rating); $j++)
        <span class="text-gold"><i class="bi bi-star"></i></span>
    @endfor
@else
    <span><del>Sem classificação</del></span>
@endif
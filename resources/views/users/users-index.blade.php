@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <header class="pt-3">
                @if( $type === 'series' )
                    <h1>Suas Séries</h1>
                @else
                    <h1>Seus Filmes</h1>
                @endif
                <hr class="mt-0">
            </header>
            @if(!$titles->isEmpty())
                @foreach($titles as $title)
                    <article class="col-12 col-md-6 col-xl-4 mb-5">
                        <div class="d-flex bg-metal align-items-center rounded-top py-2 px-2">
                            <img src="{{ url('/posters/'. $title->poster) }}" class="rounded float-start"
                                 width="110" height="165" alt="title poster">
                            <div class="ps-3 w-100">
                                <h2>
                                    <a href="#" class="titles-link">{{ $title->title }}</a>
                                </h2>
                                <p class="titles-text mb-1 fs-09">
                                    {{ $title->year }}
                                    <span class="ms-3">
                                    @if($title->is_movie)
                                            {{ substr($title->movie_duration ,0 ,5) }}
                                        @else
                                            Temporadas: {{ $title->series_seasons }} | {{ $title->series_situation }}
                                        @endif
                                </span>
                                </p>
                                <p class="titles-text mb-1 fs-09">{{ $title->user_status }}</p>
                                @if($title->is_series && ($title->last_season > 0))
                                    <p class="titles-text mb-1 fs-09">
                                        temporada - {{ $title->last_season }} | episódio - {{ $title->last_episode }}
                                    </p>
                                @endif

                                <p class="titles-text mb-1 fs-09">
                                    <?php
                                    $channels = explode(',', $title->title_channels);
                                    ?>
                                    @foreach($channels as $channel)
                                        @if ($loop->last)
                                            {{ $channel }}
                                        @else
                                            {{ $channel }}&nbsp;|
                                        @endif

                                    @endforeach
                                </p>
                                <p class="titles-text mb-1 fs-09">
                                    <?php
                                    $categories = explode(',', $title->title_categories);
                                    ?>
                                    @foreach($categories as $category)
                                        @if ($loop->last)
                                            {{ $category }}
                                        @else
                                            {{ $category }}&nbsp;|
                                        @endif

                                    @endforeach
                                </p>
                            </div>
                        </div>
                        <div class="border border-1 border-dark rounded-bottom">
                            <div class="accordion accordion-flush" id="accordionSummary">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading-{{ $title->id }}">
                                        <button class="accordion-button collapsed media-fs" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse-{{ $title->id }}" aria-expanded="false"
                                                aria-controls="flush-collapseOne">
                                            Resumo:
                                        </button>
                                    </h2>
                                    <div id="flush-collapse-{{ $title->id }}" class="accordion-collapse collapse"
                                         aria-labelledby="flush-heading-{{ $title->id }}"
                                         data-bs-parent="#accordionSummary">
                                        <div class="accordion-body media-fs">
                                            {{ $title->summary }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mt-3 mx-4">
                                <div class="mb-3">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editModal-{{ $title->id }}">
                                        <i class="bi bi-pencil-square"></i> Editar
                                    </button>
                                    <x-modal.user-edit :title="$title" :type="$type"/>
                                </div>
                                <div class="mb-3">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#disableModal-{{ $title->id }}">
                                        <i class="bi bi-trash"></i> Desativar
                                    </button>

                                    <x-modal.disable :id="$title->id" :title="$title->title"/>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
                {{ $titles->links() }}
            @else
                <div class="col-12">
                    @if( $type === 'series' )
                        <h2 class="text-center">Você não possui nenhuma série.</h2>
                    @else
                        <h2 class="text-center">Você não possui nenhum filme.</h2>
                    @endif
                </div>
            @endif
        </div>
    </div>
@endsection


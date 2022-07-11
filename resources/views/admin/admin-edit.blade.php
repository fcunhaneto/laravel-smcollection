@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <header>
                    @if($type === 'serie' )
                        <h1 class="text-secondary">Editar a Série</h1>
                    @else
                        <h1 class="text-secondary">Editar o Filme</h1>
                    @endif
                    @if($title)
                        <h1>{{ $title->title }}</h1>
                    @endif
                    <hr>
                </header>
            </div>
            <div class="col-12 col-lg-8">
                @if($title)
                    <form method="post" action="{{ route('admin.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="text" name="type" value="{{ $type }}" hidden>
                    <input type="text" name="id" value="{{ $title->id }}" hidden>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="title" class="form-label">Título</label>
                            <x-form.title :title="$title->title" />
                            @error('title')
                            <p class="text-danger fw-bold mt-1 ms-2">O Título é obrigatório!!!</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label for="original_title" class="form-label">Título Original</label>
                        <x-form.title-original :title="$title->original_title" />
                    </div>
                    <div class="col-12 mb-3">
                        <label for="summary" class="form-label">Resumo</label>
                        <x-form.summary :summary="$title->summary" />
                    </div>
                    <div class="row">
                        <label for="year" class="col-6 col-xl-1 col-form-label mb-3">Ano</label>
                        <div class="col-6 col-xl-2 mb-3">
                            <x-form.year :year="$title->year" />
                        </div>
                        @if($type === 'serie')
                            <label for="series_seasons" class="col-6 col-xl-2 col-form-label mb-3">Temporadas</label>
                            <div class="col-6 col-xl-2 mb-3">
                                <x-form.series-seasons :seasons="$title->series_seasons" />
                            </div>
                            <label for="series_situation"
                                   class="col-6 col-xl-1 col-form-label mb-3">Situação</label>
                            <div class="col-6 col-xl-3 mb-3">
                                <x-form.series-situation :actual="$title->series_situation" />
                            </div>
                        @else
                            <label for="movie_duration" class="col-6 col-xl-1 col-form-label mb-3">Duração</label>
                            <div class="col-6 col-xl-2 mb-3">
                                <x-form.movie-duration :duration="$title->movie_duration" />
                            </div>
                        @endif
                    </div>
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <div class="accordion-header pb-3" id="flush-headingOne">
                                <button class="accordion-button collapsed pb-3 ps-0" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                    Canais
                                </button>
                            </div>
                            <div id="flush-collapseOne" class="accordion-collapse collapse  pt-2"
                                 aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <x-form.title-channels :title="$title" />
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header pb-3" id="flush-headingTwo">
                                <button class="accordion-button collapsed pb-3 ps-0" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                    Categorias
                                </button>
                            </div>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                 aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <x-form.title-categories :title="$title" />
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header pb-3" id="flush-headingThree">
                                <button class="accordion-button collapsed pb-4 ps-0" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseThree" aria-expanded="false"
                                        aria-controls="flush-collapseThree">
                                    Países
                                </button>
                            </div>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                 aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <x-form.title-countries :title="$title" />
                            </div>
                            <div class="col-12 my-3">
                                <label for="poster" class="form-label">Poster</label>
                                <x-form.poster />
                            </div>
                        </div>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4 mt-4">
                        <button type="submit" class="btn btn-primary w-100">SALVAR</button>
                    </div>
                    <div class="col-4"></div>
                </form>
                @endif
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <header>
                    @if($type === 'serie')
                        <h1>Nova Série</h1>
                    @else
                        <h1>Novo Filme</h1>
                    @endif
                    <hr>
                </header>
            </div>
            <div class="col-12 col-lg-8">
                <form method="post" action="{{ route('admin.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="type" value="{{ $type }}" hidden>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="title" class="form-label">Título</label>
                            <x-form.title />
                            @error('title')
                            <p class="text-danger fw-bold mt-1 ms-2">O Título é obrigatório!!!</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label for="original_title" class="form-label">Título Original</label>
                        <x-form.title-original />
                    </div>
                    <div class="col-12 mb-3">
                        <label for="summary" class="form-label">Resumo</label>
                        <x-form.summary />
                    </div>
                    <div class="row">
                        <label for="year" class="col-6 col-xl-1 col-form-label mb-3">Ano</label>
                        <div class="col-6 col-xl-2 mb-3">
                            <x-form.year />
                        </div>
                        @if($type === 'serie')
                            <label for="series_seasons" class="col-6 col-xl-2 col-form-label mb-3">Temporadas</label>
                            <div class="col-6 col-xl-2 mb-3">
                                <x-form.series-seasons/>
                            </div>
                            <label for="series_situation"
                                   class="col-6 col-xl-1 col-form-label mb-3">Situação</label>
                            <div class="col-6 col-xl-3 mb-3">
                                <x-form.series-situation />
                            </div>
                        @else
                            <label for="movie_duration" class="col-6 col-xl-1 col-form-label mb-3">Duração</label>
                            <div class="col-6 col-xl-2 mb-3">
                                <x-form.movie-duration />
                            </div>
                        @endif
                    </div>
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <div class="accordion-header pb-3" id="flush-headingChannels">
                                <button class="accordion-button collapsed pb-3 ps-0" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseChannels" aria-expanded="false"
                                        aria-controls="flush-collapseChannels">
                                    Canais
                                </button>
                            </div>
                            <div id="flush-collapseChannels" class="accordion-collapse collapse  pt-2"
                                 aria-labelledby="flush-headingChannels" data-bs-parent="#accordionFlushExample">
                                <x-form.title-channels />
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header pb-3" id="flush-headingCategories">
                                <button class="accordion-button collapsed pb-3 ps-0" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseCategories" aria-expanded="false"
                                        aria-controls="flush-collapseCategories">
                                    Categorias
                                </button>
                            </div>
                            <div id="flush-collapseCategories" class="accordion-collapse collapse"
                                 aria-labelledby="flush-headingCategories" data-bs-parent="#accordionFlushExample">
                                <x-form.title-categories />
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header pb-3" id="flush-headingCountries">
                                <button class="accordion-button collapsed pb-4 ps-0" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseCountries" aria-expanded="false"
                                        aria-controls="flush-collapseCountries">
                                    Países
                                </button>
                            </div>
                            <div id="flush-collapseCountries" class="accordion-collapse collapse"
                                 aria-labelledby="flush-headingCountries" data-bs-parent="#accordionFlushExample">
                                <x-form.title-countries />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 my-3">
                        <label for="poster" class="form-label">Poster</label>
                        <x-form.poster />
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4 mt-4">
                        <button type="submit" class="btn btn-primary w-100">SALVAR</button>
                    </div>
                    <div class="col-4"></div>
                </form>
            </div>
        </div>
    </div>
@endsection

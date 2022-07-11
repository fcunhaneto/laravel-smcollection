@extends('layouts.app')

@section('content')
    <div class="container">
        <header>
            @if($type === 'series')
                <h1>Adicionar Séries</h1>
            @else
                <h1>Adicionar Filmes</h1>
            @endif
            <hr>
        </header>

        <!-- Use for major than md devices -->
        <div class="d-none d-sm-none d-md-none d-lg-block">
            <table class="table align-middle table-striped table-bordered">
                <thead>
                <tr>
                    <th></th>
                    <th scope="col" class="text-center">Título</th>
                    <th scope="col" class="text-center">Título Original</th>
                    <th scope="col" class="text-center px-3">Ano</th>
                    @if($type === 'filmes')
                        <th scope="col" class="text-center">Tempo</th>
                    @endif
                    <th scope="col">Classificação</th>
                    <th scope="col" class="text-center">Canais</th>
                    <th scope="col" class="text-center">Categorias</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(!$titles->isEmpty())
                    @foreach($titles as $title)
                        <tr>
                            <td class="text-center">
                                <a href="{{ url('/posters/' . $title->poster) }}">
                                    <img src="{{ url('/posters/' . $title->poster) }}" class="rounded" width="88" height="132"
                                         alt="title poster">
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="#" class="normal-link fw-bolder">
                                    {{ $title->title }}
                                </a>
                            </td>
                            <td class="text-center text-secondary">{{ $title->original_title }}</td>
                            <td class="text-center text-secondary">{{ $title->year }}</td>
                            @if($title->movie_duration)
                                <td class="text-center text-secondary">{{ substr($title->movie_duration ,0 ,5) }}</td>
                            @endif
                            <td class="text-center">
                                <x-show.show3-c :c3="$title->title_channels" />
                            </td>
                            <td class="text-center text-secondary">
                                Rating
                            </td>
                            <td class="text-center text-secondary">
                                <x-show.show3-c :c3="$title->title_categories" />
                            </td>

                            <td>
                                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addModal-{{ $title->id }}">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                                <x-modal.user-create :title="$title" :type="$type" />
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            @if($titles->isEmpty())
                <h2>O banco de dados está vazio.</h2>
            @endif
        </div>

        <!-- Use for minor than md devices -->
        <div class="row d-block d-sm-block d-md-block d-lg-none">
            @if(!$titles->isEmpty())
                @foreach($titles as $title)
                    <div class="col-12 col-md-6 text-center">
                        <img src="{{ url('/posters/' . $title->poster) }}" class="rounded" width="88" height="132"
                             alt="title poster">
                    </div>
                    <div class="col-12 col-md-6 text-center py-3">
                        <p class="mb-0">{{ $title->title }}</p>
                        <p class="mt-1">{{ $title->year }}</p>
                    </div>
                @endforeach
            @else
                <h2>O banco de dados está vazio.</h2>
            @endif
        </div>
    </div>
@endsection
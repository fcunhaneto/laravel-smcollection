<div class="modal fade" id="editModal-{{ $title->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $title->id }}"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-metal">
                <div class="w-100">
                    <p class="text-white fw-bold mb-0">{{ $title->title }}</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x"></i>
                </button>
            </div>
            <form method="post" action="{{ route('users.store') }}">
                @csrf
                <?php
                    $titles_user = $title->users()->get();
                ?>
                <input type="text" name="id" value="{{ $title->id }}" hidden>
                <input type="text" name="type" value="{{ $type }}" hidden>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                        @foreach($titles_user as $title_user)
                            <tr class="border-bottom">
                                <td class="pe-2">
                                    <label class="form-label">Canal</label>
                                </td>
                                <td class="py-2">
                                    <x-form.user-channel :actual="'Netflix'" />
                                </td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="pe-2">
                                    <label class="form-label">Status</label>
                                </td>
                                <td class="py-2">
                                    <x-form.user-status :type="$type" :actual="$title_user->pivot->user_status" />
                                </td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="pe-2">
                                    <label class="form-label">Classificação</label>
                                </td>
                                <td class="py-2">
                                    <x-form.user-rating :rating="$title_user->pivot->user_rating" />
                                </td>
                            </tr>
                            @if(!$title->is_movie)
                                <tr>
                                    <td class="text-black fw-bold" colspan="2">
                                        Assistido até:
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                    <td class="pe-2">
                                        <label class="form-label">Temporada</label>
                                    </td>
                                    <td class="py-2">
                                        <x-form.last-season :last="$title_user->pivot->last_season" />
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                    <td class="pe-2">
                                        <label class="form-label">Episódio</label>
                                    </td>
                                    <td class="py-2">
                                        <x-form.last-episode :last="$title_user->pivot->last_episode" />
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">SALVAR</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
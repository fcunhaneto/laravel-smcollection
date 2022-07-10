<div class="modal fade" id="disableModal-{{ $id }}" tabindex="-1"
     aria-labelledby="disableModalLabel-{{ $id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"><i class="bi bi-x"></i></button>
            </div>
            <div class="modal-body">
                <p class="text-metal fs-3">Tem certeza que quer desativar o título:</p>
                <p class="text-center fw-bold text-black fs-3">{{ $title }}</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary" type="button">Sim</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
            </div>
        </div>
    </div>
</div>
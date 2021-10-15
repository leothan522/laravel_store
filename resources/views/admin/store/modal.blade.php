<div wire:ignore.self class="modal fade" id="modal-lg-create">
    <div class="modal-dialog modal-lg">
        <div class="modal-content fondo">
            <div class="modal-header">
                <h4 class="modal-title">Tienda</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div wire:loading>
                    <div class="overlay">
                        <i class="fas fa-2x fa-sync-alt"></i>
                    </div>
                </div>

                @include('admin.store.'.$view)


            </div>
            <div class="modal-footer justify-content-end">
                @if($view == 'show')
                    <button type="button" class="btn btn-default btn-sm" wire:click="images()"><i class="fas fa-image"></i> Cambiar Imagenes</button>
                    <button type="button" class="btn btn-default btn-sm" wire:click="edit()"><i class="fas fa-edit"></i> {{ __('Edit') }} Información</button>
                    @else
                    @if($view != 'create')
                        <button type="button" class="btn btn-danger btn-sm" wire:click="show()"><i class="fas fa-edit"></i> {{ __('Cancel') }}</button>
                    @endif
                @endif
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

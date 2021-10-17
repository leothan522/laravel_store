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
                    @if(leerJson(Auth::user()->permisos, 'stores.default') || Auth::user()->role == 100)
                        @if(!storeDefault($store_id))
                            <button type="button" class="btn btn-default btn-sm" wire:click="storeDefault({{ $store_id }})"><i class="fas fa-certificate"></i> Convertir en Default</button>
                        @endif
                    @endif
                    @if(leerJson(Auth::user()->permisos, 'stores.destroy') || Auth::user()->role == 100)
                        <button type="button" class="btn btn-default btn-sm" wire:click="destroy({{ $store_id }})" data-dismiss="modal"><i class="fas fa-trash-alt"></i> Borrar Tienda</button>
                    @endif
                    <button type="button" class="btn btn-default btn-sm" wire:click="images()"><i class="fas fa-image"></i> Cambiar Imagenes</button>
                    @if(leerJson(Auth::user()->permisos, 'stores.edit') || Auth::user()->role == 100)
                        <button type="button" class="btn btn-default btn-sm" wire:click="edit()"><i class="fas fa-edit"></i> {{ __('Edit') }} Información</button>
                    @endif

                @else
                    @if($view != 'create')
                        <button type="button" class="btn btn-danger btn-sm" wire:click="show({{ $store_id }})"><i class="fas fa-edit"></i> {{ __('Cancel') }}</button>
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

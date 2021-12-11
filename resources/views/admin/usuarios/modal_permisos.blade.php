<div wire:ignore.self class="modal fade" id="modal-lg-permisos">
    <div class="modal-dialog modal-lg">
        <div class="modal-content fondo">
            <div class="modal-header">
                <h4 class="modal-title">Permisos de Usuario: <strong>{{ ucwords($user_name) }}</strong></h4>
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


               <div class="row">
                   <div class="col-md-4">
                        @include('admin.usuarios.permisos.usuarios')
                   </div>
                   <div class="col-md-4">
                       @include('admin.usuarios.permisos.stores')
                   </div>
                   <div class="col-md-4">
                       @include('admin.usuarios.permisos.articulos')
                   </div>
               </div>



            </div>
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

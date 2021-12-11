<div wire:ignore.self class="modal fade" id="modal-unidades">
    <div class="modal-dialog modal-lg">
        <div class="modal-content fondo">
            <div class="modal-header">
                <h4 class="modal-title">Unidades</h4>
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


                <div class="table-responsive">
                    <table class="table table-hover bg-light">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col">Código</th>
                            <th scope="col">Descripción</th>
                            <th scope="col" style="width: 5%;">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($unidades as $unidad)
                            <th scope="row" class="text-center">{{ $i++ }}</th>
                            <td>{{ strtoupper($unidad->codigo_unidad) }}</td>
                            <td>{{ strtoupper($unidad->descripcion_unidad) }}</td>
                            <td class="justify-content-end">
                                <div class="btn-group">
                                    @if (leerJson(Auth::user()->permisos, 'unidades.edit') || Auth::user()->role == 100)
                                        <button wire:click="edit_unidad({{ $unidad->id }})" class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-info btn-sm" disabled><i class="fas fa-edit"></i></button>
                                    @endif

                                </div>
                            </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @include('admin.articulos.'.$view_unidad)
                </div>



            </div>
            <div class="modal-footer justify-content-end">
                @if($view_unidad == "edit_unidad")
                    <button type="button" wire:click="limpiar" class="btn btn-info btn-sm">{{ __('Cancel') }}</button>
                @endif
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

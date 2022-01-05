<div wire:ignore.self class="modal fade" id="modal-precios">
    <div class="modal-dialog modal-lg">
        <div class="modal-content fondo">
            <div class="modal-header">
                <h4 class="modal-title">Precios</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="store_precio">
                <div wire:loading>
                    <div class="overlay">
                        <i class="fas fa-2x fa-sync-alt"></i>
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-md-4 form-group">
                        <select class="form-control" wire:model="prueba" name="prueba">
                            @foreach($stores as $store)
                                @if(permisos_store($store->id))
                                    <option value="{{ $store->id }}">{{ ucfirst($store->nombre_tienda) }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover bg-light">
                        <thead class="thead-dark">
                        <tr>
                            {{--<th scope="col" class="text-center">#</th>--}}
                            <th scope="col">Tipo</th>
                            <th scope="col">Moneda</th>
                            <th scope="col" class="text-center">Precio</th>
                            <th scope="col" class="text-center">Estatus</th>
                            <th scope="col" style="width: 5%;">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if($precios_store)
                            @foreach($precios_store as $precio)
                                {{--<th scope="row" class="text-center">{{ $i++ }}</th>--}}
                                <td>{{ strtoupper($precio->tipo_precio) }}</td>
                                <td>{{ strtoupper($precio->moneda) }}</td>
                                <td class="text-right">{{ strtoupper($precio->precio) }}</td>
                                <td class="text-center">
                                    @if($precio->estatus)
                                        <i class="text-success fas fa-check"></i>
                                        @else
                                        <i class="text-danger fas fa-ban"></i>
                                    @endif
                                </td>
                                <td class="justify-content-end">
                                    <div class="btn-group">
                                        @if (leerJson(Auth::user()->permisos, 'precios.edit') || auth()->user()->role == 100)
                                            <button wire:click="edit_categoria({{ $precio->id }})" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-info btn-sm" disabled><i class="fas fa-edit"></i></button>
                                        @endif

                                    </div>
                                </td>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    @include('admin.articulos.'.$view_precio)
                </div>


                </form>

            </div>
            <div class="modal-footer justify-content-end">
                {{--@if($view_categoria == "edit_categoria")
                <button type="button" wire:click="limpiar" class="btn btn-info btn-sm">{{ __('Cancel') }}</button>
                @endif--}}
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

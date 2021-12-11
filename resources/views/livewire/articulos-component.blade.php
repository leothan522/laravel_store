<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="row justify-content-center">

        <div class="col-sm-3">

            <div class="card card-gray-dark"    >
                <div class="card-header">
                    <h3 class="card-title">Tablas</h3>
                    <div class="card-tools">
                        {{--<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                        </button>--}}
                        <span class="btn btn-tool"><i class="fas fa-tasks"></i></span>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <ul class="nav flex-column">
                        <button type="button" class="list-group-item list-group-item-action" wire:click="limpiar()"
                                data-toggle="modal" data-target="#modal-categorias">
                            Categorias <span class="float-right badge bg-info">{{ $categorias_count }}</span>
                        </button>
                        <button type="button" class="list-group-item list-group-item-action"
                                data-toggle="modal" data-target="#modal-unidades">
                            Unidades <span class="float-right badge bg-info">{{ $unidades_count }}</span>
                        </button>
                    </ul>

                    @include('admin.articulos.modal_categorias')
                    @include('admin.articulos.modal_unidades')

                </div>
                <!-- /.card-body -->
            </div>

        </div>

    </div>
</div>

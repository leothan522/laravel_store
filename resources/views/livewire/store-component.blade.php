<div>
    {{-- Be like water. --}}
    <div class="row justify-content-center">

        <div class="col-sm-4">
            <div class="card card-outline card-primary" style="height: inherit; width: inherit; transition: all 0.15s ease 0s;">
                <div class="card-header">
                    <h3 class="card-title">Tiendas Registradas</h3>
                    <div class="card-tools">

                        <button type="button" class="btn btn-tool"
                                @if(leerJson(Auth::user()->permisos, 'stores.create') || Auth::user()->role == 100) @else disabled @endif
                                wire:click="create()" data-toggle="modal" data-target="#modal-lg-create">
                            <i class="fas fa-plus-square"></i>
                        </button>

                        {{--<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                        </button>--}}
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    @include('admin.store.listar')
                    @include('admin.store.modal')

                </div>
                <!-- /.card-body -->
            </div>
        </div>

        <div class="col-sm-7">
            <div class="card card-gray-dark" style="height: inherit; width: inherit; transition: all 0.15s ease 0s;">
                <div class="card-header">
                    <h3 class="card-title">Horario de la Tienda</h3>
                    <div class="card-tools">
                        {{--<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                        </button>--}}
                        @if(leerJson(Auth::user()->permisos, 'stores.horario') || Auth::user()->role == 100)
                        <div class="custom-control custom-switch custom-switch-on-success float-right">
                            <input type="checkbox" wire:click="horarios({{ $horarios }})"
                            @if($horarios) checked @endif
                            class="custom-control-input" id="customSwitchHours">
                            <label class="custom-control-label" for="customSwitchHours"></label>
                        </div>
                        @endif
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    @include('admin.store.horarios')

                <!-- /.card-body -->
                </div>

        </div>

    </div>
</div>

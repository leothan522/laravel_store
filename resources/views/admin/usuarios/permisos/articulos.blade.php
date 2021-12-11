<div class="card card-gray-dark collapsed-card">
    <div class="card-header">
        <h3 class="card-title">Articulos</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
            </button>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0" wire:ignore.self>

        <ul class="list-group text-sm">
            <li class="list-group-item">
                Ver Articulos
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'articulos.index')"
                           @if(leerJson($user_permisos, 'articulos.index')) checked @endif
                           class="custom-control-input" id="customSwitch0articulos">
                    <label class="custom-control-label" for="customSwitch0articulos"></label>
                </div>
            </li>
            <li class="list-group-item">
                Crear Categorias
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'categorias.create')"
                           @if(leerJson($user_permisos, 'categorias.create')) checked @endif
                           class="custom-control-input" id="customSwitch1articulos">
                    <label class="custom-control-label" for="customSwitch1articulos"></label>
                </div>
            </li>
            <li class="list-group-item">
                Editar Categorias
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'categorias.edit')"
                           @if(leerJson($user_permisos, 'categorias.edit')) checked @endif
                           class="custom-control-input" id="customSwitch3articulos">
                    <label class="custom-control-label" for="customSwitch3articulos"></label>
                </div>
            </li>
            <li class="list-group-item">
                Eliminar Categorias
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'categorias.destroy')"
                           @if(leerJson($user_permisos, 'categorias.destroy')) checked @endif
                           class="custom-control-input" id="customSwitch4articulos">
                    <label class="custom-control-label" for="customSwitch4articulos"></label>
                </div>
            </li>

            <li class="list-group-item">
                Crear Unidades
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'unidades.create')"
                           @if(leerJson($user_permisos, 'unidades.create')) checked @endif
                           class="custom-control-input" id="customSwitch5articulos">
                    <label class="custom-control-label" for="customSwitch5articulos"></label>
                </div>
            </li>
            <li class="list-group-item">
                Editar Unidades
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'unidades.edit')"
                           @if(leerJson($user_permisos, 'unidades.edit')) checked @endif
                           class="custom-control-input" id="customSwitch6articulos">
                    <label class="custom-control-label" for="customSwitch6articulos"></label>
                </div>
            </li>
            <li class="list-group-item">
                Eliminar Unidades
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'unidades.destroy')"
                           @if(leerJson($user_permisos, 'unidades.destroy')) checked @endif
                           class="custom-control-input" id="customSwitch7articulos">
                    <label class="custom-control-label" for="customSwitch7articulos"></label>
                </div>
            </li>

        </ul>

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

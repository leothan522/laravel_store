<div class="card card-gray-dark collapsed-card">
    <div class="card-header">
        <h3 class="card-title">Stores</h3>

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
                Ver Stores
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'stores.index')"
                           @if(leerJson($user_permisos, 'stores.index')) checked @endif
                           class="custom-control-input" id="customSwitch0store">
                    <label class="custom-control-label" for="customSwitch0store"></label>
                </div>
            </li>
            {{--<li class="list-group-item">
                Crear stores
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'stores.create')"
                           @if(leerJson($user_permisos, 'stores.create')) checked @endif
                           class="custom-control-input" id="customSwitch1store">
                    <label class="custom-control-label" for="customSwitch1store"></label>
                </div>
            </li>
            <li class="list-group-item">
                Editar stores
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'stores.edit')"
                           @if(leerJson($user_permisos, 'stores.edit')) checked @endif
                           class="custom-control-input" id="customSwitch2store">
                    <label class="custom-control-label" for="customSwitch2store"></label>
                </div>
            </li>
            <li class="list-group-item">
                Reestablecer Contraseña
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'stores.update')"
                           @if(leerJson($user_permisos, 'stores.update')) checked @endif
                           class="custom-control-input" id="customSwitch3store">
                    <label class="custom-control-label" for="customSwitch3store"></label>
                </div>
            </li>
            <li class="list-group-item">
                Permisos de Usuario
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'stores.permisos')"
                           @if(leerJson($user_permisos, 'stores.permisos')) checked @endif
                           class="custom-control-input" id="customSwitch4store">
                    <label class="custom-control-label" for="customSwitch4store"></label>
                </div>
            </li>
            <li class="list-group-item">
                Descargar Excel
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'stores.excel')"
                           @if(leerJson($user_permisos, 'stores.excel')) checked @endif
                           class="custom-control-input" id="customSwitch5store">
                    <label class="custom-control-label" for="customSwitch5store"></label>
                </div>
            </li>
            <li class="list-group-item">
                Eliminar stores
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'stores.destroy')"
                           @if(leerJson($user_permisos, 'stores.destroy')) checked @endif
                           class="custom-control-input" id="customSwitch6store">
                    <label class="custom-control-label" for="customSwitch6store"></label>
                </div>
            </li>--}}
        </ul>

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

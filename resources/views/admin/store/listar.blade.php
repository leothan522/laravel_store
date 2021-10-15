<ul class="list-group text-sm">
    <li class="list-group-item fondo">
        <button type="button" class="btn btn-xs btn-link" wire:click="show()" data-toggle="modal" data-target="#modal-lg-create">
            Nombre Tienda
        </button>
        <div class="custom-control custom-switch custom-switch-on-success float-right">
            <input type="checkbox" {{--wire:click="update_permisos({{ $user_id }}, 'usuarios.index')"
                   @if(leerJson($user_permisos, 'usuarios.index')) checked @endif--}}
                   class="custom-control-input" id="customSwitch0">
            <label class="custom-control-label" for="customSwitch0"></label>
        </div>
    </li>

</ul>

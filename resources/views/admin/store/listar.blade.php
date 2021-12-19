<ul class="list-group text-sm">
    @foreach($stores as $store)
    @if(permisos_store($store->id))
        <li class="list-group-item fondo">
            <button type="button" class="btn btn-xs btn-link" wire:click="show({{ $store->id }})" data-toggle="modal" data-target="#modal-lg-create">
                 {!! storeDefault($store->id) !!} {{ ucwords($store->nombre_tienda) }}
            </button>
            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-right">
                <input type="checkbox" @if(storeEstatus($store->id)) checked @endif
                        wire:click="estatusTienda({{ $store->id }}, {{ storeEstatus($store->id) }})"
                       @if(leerJson(Auth::user()->permisos, 'stores.horario') || Auth::user()->role == 100) @else disabled @endif
                       class="custom-control-input" id="customSwitchId{{ $store->id }}">
                <label class="custom-control-label" for="customSwitchId{{ $store->id }}"></label>
            </div>
        </li>
    @endif
    @endforeach
</ul>

<div class="col-md-12 mt-3">
    <span class="float-right">
    {{ $stores->links() }}
    </span>
</div>


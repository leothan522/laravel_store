<form wire:submit.prevent="update_unidad({{ $unidad_id }})">
    <div class="table-responsive">
        <table class="table table-hover bg-light">
            <tbody>
    <tr>
        <th scope="col" class="text-center">

            @if (leerJson(Auth::user()->permisos, 'unidades.destroy') || Auth::user()->role == 100)
                <button type="button" wire:click="destroy_unidad({{ $unidad_id }})" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i>
                </button>
                @else
                <button type="button" class="btn btn-danger" disabled>
                    <i class="fas fa-trash-alt"></i>
                </button>
            @endif

        </th>
        <th scope="col">
            <input type="text" class="form-control" wire:model.debounce.10000ms="codigo_unidad"
                   name="codigo_unidad" placeholder="Código" size="1">
            @error('codigo_unidad')
            <span class="col-sm-12 text-sm text-bold text-danger">
                                        <i class="icon fas fa-exclamation-triangle"></i>
                                        {{ $message }}
                                    </span>
            @enderror
        </th>
        <th scope="col">
            <input type="text" class="form-control" wire:model.debounce.10000ms="descripcion_unidad"
                   name="descripcion_unidad" placeholder="Descripción">
            @error('descripcion_unidad')
            <span class="col-sm-12 text-sm text-bold text-danger">
                                        <i class="icon fas fa-exclamation-triangle"></i>
                                        {{ $message }}
                                    </span>
            @enderror
        </th>
        <th scope="col" style="width: 5%;">
            @if (leerJson(Auth::user()->permisos, 'unidades.edit') || Auth::user()->role == 100)
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button></th>
                @else
                <button type="button" class="btn btn-success" disabled><i class="fas fa-save"></i></button></th>
            @endif
    </tr>
            </tbody>
        </table>
    </div>
</form>

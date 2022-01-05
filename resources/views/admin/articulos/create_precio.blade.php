
    <div class="table-responsive">
        <table class="table table-hover bg-light">
            <tbody>
    <tr>
        <th scope="col" class="text-center">
            Nuevo
        </th>
        <th scope="col">
            <input type="text" class="form-control" wire:model.debounce.10000ms="tipo"
                   name="tipo_precio" placeholder="Tipo" size="1">
            @error('tipo')
            <span class="col-sm-12 text-sm text-bold text-danger">
                <i class="icon fas fa-exclamation-triangle"></i>
                {{ $message }}
            </span>
            @enderror
        </th>
        <th scope="col">
            @if(storeDivisas($prueba))
                <select class="form-control" wire:model.debounce.10000ms="moneda" name="moneda">
                    <option value="Bs.">Bs.</option>
                    <option value="$">$</option>
                </select>
            @else
                <input type="text" class="form-control" wire:model.debounce.10000ms="moneda"
                       name="moneda" placeholder="Moneda" size="1" readonly>
            @endif
            @error('moneda')
            <span class="col-sm-12 text-sm text-bold text-danger">
                <i class="icon fas fa-exclamation-triangle"></i>
                {{ $message }}
            </span>
            @enderror
        </th>
        <th scope="col" class="text-center">
            <input type="text" class="form-control" wire:model.debounce.10000ms="precio"
                   name="precio" placeholder="Precio" size="1">
            @error('precio')
            <span class="col-sm-12 text-sm text-bold text-danger">
                <i class="icon fas fa-exclamation-triangle"></i>
                {{ $message }}
            </span>
            @enderror
        </th>
        <th scope="col" style="width: 5%;">
            @if ($cont && (leerJson(Auth::user()->permisos, 'precios.create') || Auth::user()->role == 100))
                <button type="submit"  class="btn btn-success" ><i class="fas fa-save"></i></button>
                @else
                <button type="button"  class="btn btn-success" disabled><i class="fas fa-save"></i></button>
            @endif

        </th>
    </tr>
            </tbody>
        </table>
    </div>


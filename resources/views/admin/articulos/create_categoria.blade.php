<form wire:submit.prevent="store_categoria">
    <div class="table-responsive">
        <table class="table table-hover bg-light">
            <tbody>
    <tr>
        <th scope="col" class="text-center">
            Nuevo
        </th>
        <th scope="col">
            <input type="text" class="form-control" wire:model.debounce.10000ms="codigo_categoria"
                   name="codigo_categoria" placeholder="Código" size="1">
            @error('codigo_categoria')
            <span class="col-sm-12 text-sm text-bold text-danger">
                <i class="icon fas fa-exclamation-triangle"></i>
                {{ $message }}
            </span>
            @enderror
        </th>
        <th scope="col">
            <input type="text" class="form-control" wire:model.debounce.10000ms="descripcion_categoria"
                   name="descripcion_categoria" placeholder="Descripción">
            @error('descripcion_categoria')
            <span class="col-sm-12 text-sm text-bold text-danger">
                <i class="icon fas fa-exclamation-triangle"></i>
                {{ $message }}
            </span>
            @enderror
        </th>
        <th scope="col" class="text-center"></th>
        <th scope="col" style="width: 5%;">
            @if (leerJson(Auth::user()->permisos, 'categorias.create') || Auth::user()->role == 100)
                <button type="submit"  class="btn btn-success" ><i class="fas fa-save"></i></button>
                @else
                <button type="button"  class="btn btn-success" disabled><i class="fas fa-save"></i></button>
            @endif

        </th>
    </tr>
            </tbody>
        </table>
    </div>
</form>

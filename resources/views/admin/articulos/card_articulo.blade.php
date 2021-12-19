<div class="card card-outline card-primary" style="height: inherit; width: inherit; transition: all 0.15s ease 0s;">
    <div class="card-header">
        <h3 class="card-title">Articulo</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" wire:click="limpiar()"><i class="fas fa-file"></i>
            </button>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        @if($view_articulo == 'create_articulo')
        <form wire:submit.prevent="store_articulo">
            @else
        <form wire:submit.prevent="update_articulo({{ $articulo_id }})">
        @endif
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Código</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                        </div>
                        <input type="text" class="form-control" wire:model="codigo_articulo" name="codigo_articulo" placeholder="Codigo único">
                        @error('codigo_articulo')
                        <span class="col-sm-12 text-sm text-bold text-danger">
                            <i class="icon fas fa-exclamation-triangle"></i>
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="name">Descripción</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-box"></i></span>
                        </div>
                        <input type="text" class="form-control" wire:model="descripcion_articulo" name="descripcion_articulo" placeholder="Descripción del articulo">
                        @error('descripcion_articulo')
                        <span class="col-sm-12 text-sm text-bold text-danger">
                            <i class="icon fas fa-exclamation-triangle"></i>
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Categoria</label>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" wire:model="art_codigo_categoria" wire:keydown.tab="verificar_categoria()" name="art_codigo_categoria" placeholder="Código">
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" wire:model="art_descripcion_categoria" name="art_descripcion_categoria" placeholder="Categoria">
                            </div>
                        </div>
                        @error('art_codigo_categoria')
                        <span class="col-sm-12 text-sm text-bold text-danger">
                            <i class="icon fas fa-exclamation-triangle"></i>
                            {{ $message }}
                        </span>
                        @enderror
                    </div>


                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Unidad</label>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" wire:model="art_codigo_unidad" wire:keydown.tab="verificar_unidad()" name="art_codigo_unidad" placeholder="Código">
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" wire:model="art_descripcion_unidad" name="art_descripcion_unidad" placeholder="Unidad">
                            </div>
                        </div>
                        @error('art_codigo_unidad')
                        <span class="col-sm-12 text-sm text-bold text-danger">
                            <i class="icon fas fa-exclamation-triangle"></i>
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group text-right">

            @if($view_articulo == 'create_articulo')
                <input type="submit" class="btn btn-success" value="Crear Articulo">
                @else
                <button type="button" class="btn btn-danger" wire:click="destroy_articulo({{ $articulo_id }})"><i class="fas fa-trash-alt"></i></button>
                @if($estatus_articulo)
                    <button type="button" class="btn btn-info" wire:click="estatus_articulo({{ $articulo_id }})"><i class="fas fa-ban"> Inactivar</i></button>
                    @else
                    <button type="button" class="btn btn-info" wire:click="estatus_articulo({{ $articulo_id }})"><i class="fas fa-check"></i> Activar</button>
                @endif
                <input type="submit" class="btn btn-primary" value="Guardar Cambios">
            @endif

        </div>

        </form>

                <div class="col-sm-7">
                    @if($busqueda)
                        {{--<label for="name">Posibles Resultados</label>--}}
                        <ul class="nav flex-column">
                            @foreach($busqueda as $articulo)
                                <button type="button" wire:click="edit_articulo({{ $articulo->id }})" class="list-group-item list-group-item-action list-group-item-warning"
                                    {{--data-toggle="modal" data-target="#modal-categorias"--}}>
                                    {{ $articulo->codigo_articulo }}
                                    <span class="float-right">{{ $articulo->descripcion_articulo }}</span>
                                </button>
                            @endforeach
                        </ul>
                    @endif
                </div>

    </div>
    <!-- /.card-body -->
</div>

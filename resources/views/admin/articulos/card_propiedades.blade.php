<div class="card card-outline card-primary" style="height: inherit; width: inherit; transition: all 0.15s ease 0s;">
    <div class="card-header">
        <h3 class="card-title">Propiedades</h3>
        <div class="card-tools">
            {{--<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
            </button>--}}
            <span class="btn-tool"><i class="fas fa-tasks"></i></span>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <ul class="nav flex-column">
            <button type="button" class="list-group-item list-group-item-action fondo"
                    @if($view_articulo != 'create_articulo') data-toggle="modal" data-target="#modal-precios" @endif >
                Precios <span class="float-right badge bg-info">{{--{{ $categorias_count }}--}}</span>
            </button>
            <button type="button" class="list-group-item list-group-item-action fondo"
                {{--data-toggle="modal" data-target="#modal-unidades"--}}>
                Identificadores <span class="float-right badge bg-info">{{--{{ $unidades_count }}--}}</span>
            </button>
            <button type="button" class="list-group-item list-group-item-action fondo"
                {{--data-toggle="modal" data-target="#modal-unidades"--}}>
                Imágenes <span class="float-right badge bg-info">{{--{{ $unidades_count }}--}}</span>
            </button>
            <button type="button" class="list-group-item list-group-item-action fondo"
                {{--data-toggle="modal" data-target="#modal-unidades"--}}>
                Existencias <span class="float-right badge bg-info">{{--{{ $unidades_count }}--}}</span>
            </button>

        </ul>

        @include('admin.articulos.modal_precios')



    </div>
    <!-- /.card-body -->
</div>

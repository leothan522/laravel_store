<div class="row justify-content-center">
    <div class="row col-md-11">

        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                             src="{{ mostrarImagen($file_path, 'large', 'logo', 'public/store-photos/', $t_logo) }}"
                             alt="Logo Tienda">
                    </div>

                    <h3 class="profile-username text-center">{{ ucwords($nombre_tienda) }}</h3>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>RIF</b> <a class="float-right">{{ strtoupper($rif_tienda) }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Jefe de Tienda</b> <a
                                class="float-right">{{ ucwords($jefe_tienda) }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Telefonos</b> <a
                                class="float-right text-danger">{{ $telefonos_tienda }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a
                                class="float-right">{{ strtolower($email_tienda) }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Dirección</b> <a
                                class="float-right">{{ strtolower($direccion_tienda) }}</a>
                        </li>
                    </ul>


                </div>
                <!-- /.card-body -->
            </div>

        </div>

        <div class="col-md-6">

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img id="blah" class="img-thumbnail" src="{{ mostrarImagen($file_path, 'large', 'imagen', 'public/store-photos/', $t_imagen) }}" />
                    </div>
                </div>
            </div>

            <ul class="list-group text-sm">
                    <li class="list-group-item fondo">
                        Moneda Base
                        <span class="float-right text-bold">{{ $moneda_base }}</span>
                    </li>
                    <li class="list-group-item fondo">

                            Multimoneda

                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-right">
                            <input type="checkbox" @if(storeDivisas($store_id)) checked @endif
                            wire:click="storeDivisa({{ $store_id }}, {{ storeDivisas($store_id) }})"
                                   @if(leerJson(Auth::user()->permisos, 'stores.edit') || Auth::user()->role == 100) @else disabled @endif
                                   class="custom-control-input" id="customSwitchIdD{{ $store_id }}">
                            <label class="custom-control-label" for="customSwitchIdD{{ $store_id }}"></label>
                        </div>
                    </li>
            </ul>


        </div>



    </div>
</div>

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

                            Precios en Divisas
                       
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

        {{--<div class="col-md-6">

            <div class="card card-gray-dark">
                <div class="card-header">
                    <h5 class="card-title">Editar Imagenes</h5>
                    <div class="card-tools">
                        <span class="btn btn-tool"><i class="fas fa-image"></i></span>
                    </div>
                </div>
                <div class="card-body">

                    {!! Form::open(['wire:submit.prevent' => "update(1)"]) !!}
                    @if (/*$user->plataforma == 0*/true)


                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" name="imagen" class="custom-file-input" id="customFileLangLogo" onchange='cambiarLogo()' lang="es" accept="image/jpeg, image/png">
                                <label class="custom-file-label" for="customFileLang" data-browse="Elegir" id="infoLogo">Logo</label>
                                @error('nombre_tienda')
                                <span class="col-sm-12 text-sm text-bold text-danger">
                                                    <i class="icon fas fa-exclamation-triangle"></i>
                                                    {{ $message }}
                                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" name="imagen" class="custom-file-input" id="customFileLangImagen" onchange='cambiarImagen()' lang="es" accept="image/jpeg, image/png">
                                <label class="custom-file-label" for="customFileLang" data-browse="Elegir" id="infoImagen">Imagen</label>
                                @error('nombre_tienda')
                                <span class="col-sm-12 text-sm text-bold text-danger">
                                    <i class="icon fas fa-exclamation-triangle"></i>
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>


                    @endif

                    <div class="form-group text-right">
                        <input type="hidden" name="mod" value="datos">
                        @if (/*$user->role != 100 || Auth::user()->role == 100*/ true)
                            @if (/*$user->status != 0*/true)
                                <input type="submit" class="btn btn-block btn-primary"
                                       value="Guardar Cambios">
                            @else
                                <input type="button" class="btn btn-block btn-primary disabled"
                                       value="Guardar Cambios">
                            @endif
                        @endif

                    </div>

                    {!! Form::close() !!}

                </div>
            </div>

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img id="blah" class="img-thumbnail" src="{{ asset('img/img-placeholder-320x320.png') }}" />
                    </div>
                </div>
            </div>

        </div>--}}

    </div>
</div>

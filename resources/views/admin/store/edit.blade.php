<div class="row justify-content-center">
    <div class="row col-md-11">

        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                             src="{{ asset('img/img-placeholder-320x320.png') }}"
                             alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{--{{ ucwords($user_name) }}--}}.</h3>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>RIF</b> <a class="float-right">{{--{{ $user_email }}--}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Jefe de Tienda</b> <a
                                class="float-right">{{--@if($user_role){{ role($user_role) }}@else {{ role(0) }}@endif--}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Telefonos</b> <a
                                class="float-right text-danger">{{--@if($user_estatus) {!! estatusUsuario($user_estatus) !!} @else {!! estatusUsuario(0)  !!} @endif--}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a
                                class="float-right">{{--@if($user_fecha) {{ haceCuanto($user_fecha) }} @endif--}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Dirección</b> <a
                                class="float-right">{{--@if($user_fecha) {{ haceCuanto($user_fecha) }} @endif--}}</a>
                        </li>
                    </ul>


                </div>
                <!-- /.card-body -->
            </div>

        </div>

        <div class="col-md-6">
            <div class="card card-gray-dark">
                <div class="card-header">
                    <h5 class="card-title">Editar Información</h5>
                    <div class="card-tools">
                        <span class="btn btn-tool"><i class="fas fa-store"></i></span>
                    </div>
                </div>
                <div class="card-body">

                    {!! Form::open(['wire:submit.prevent' => "update(1)"]) !!}
                    @if (/*$user->plataforma == 0*/true)
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-store"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nombre_tienda" placeholder="Nombre de Tienda">
                                @error('nombre_tienda')
                                <span class="col-sm-12 text-sm text-bold text-danger">
                                                    <i class="icon fas fa-exclamation-triangle"></i>
                                                    {{ $message }}
                                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">RIF</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                </div>
                                <input type="text" class="form-control" name="rif_tienda" placeholder="RIF de Tienda">
                                @error('rif_tienda')
                                <span class="col-sm-12 text-sm text-bold text-danger">
                                                    <i class="icon fas fa-exclamation-triangle"></i>
                                                    {{ $message }}
                                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Jefe de Tienda</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="jefe_tienda" placeholder="Jefe de Tienda">
                                @error('jefe_tienda')
                                <span class="col-sm-12 text-sm text-bold text-danger">
                                                    <i class="icon fas fa-exclamation-triangle"></i>
                                                    {{ $message }}
                                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Telefonos</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control" name="telefonos_tienda" placeholder="Telefonos de Tienda">
                                @error('telefonos_tienda')
                                <span class="col-sm-12 text-sm text-bold text-danger">
                                                    <i class="icon fas fa-exclamation-triangle"></i>
                                                    {{ $message }}
                                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="text" class="form-control" name="email_tienda" placeholder="Email de Tienda">
                                @error('email_tienda')
                                <span class="col-sm-12 text-sm text-bold text-danger">
                                                    <i class="icon fas fa-exclamation-triangle"></i>
                                                    {{ $message }}
                                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Dirección</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-directions"></i></span>
                                </div>
                                <input type="text" class="form-control" name="direccion_tienda" placeholder="Direccion de Tienda">
                                @error('direccion_tienda')
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
        </div>

    </div>
</div>

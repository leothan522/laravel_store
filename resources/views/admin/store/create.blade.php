{!! Form::open(['wire:submit.prevent' => "store"]) !!}
<div class="row justify-content-center">

    <div class="row col-md-11 justify-content-center">

        <div class="col-md-6">

            <div class="card card-gray-dark">
                <div class="card-header">
                    <h5 class="card-title">Imagenes de la Tienda</h5>
                    <div class="card-tools">
                        <span class="btn btn-tool"><i class="fas fa-image"></i></span>
                    </div>
                </div>
                <div class="card-body">

                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" name="logo_tienda" wire:model="logo_tienda" class="custom-file-input" id="customFileLangLogo" onchange='cambiarLogo()' lang="es" accept="image/jpeg, image/png">
                                <label class="custom-file-label" for="customFileLang" data-browse="Elegir" id="infoLogo">Logo</label>
                                @error('logo_tienda')
                                <span class="col-sm-12 text-sm text-bold text-danger">
                                                    <i class="icon fas fa-exclamation-triangle"></i>
                                                    {{ $message }}
                                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" name="imagen_tienda" wire:model="imagen_tienda" class="custom-file-input" id="customFileLangImagen" onchange='cambiarImagen()' lang="es" accept="image/jpeg, image/png">
                                <label class="custom-file-label" for="customFileLang" data-browse="Elegir" id="infoImagen">Imagen</label>
                                @error('imagen_tienda')
                                <span class="col-sm-12 text-sm text-bold text-danger">
                                    <i class="icon fas fa-exclamation-triangle"></i>
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>

                </div>
            </div>

            @if ($logo_tienda)

                Logo Preview:

                <img src="{{ $logo_tienda->temporaryUrl() }}" class="img-fluid img-thumbnail rounded mx-auto d-block">

            @endif

            @if ($imagen_tienda)

                Imagen Preview:

                <img src="{{ $imagen_tienda->temporaryUrl() }}" class="img-fluid img-thumbnail rounded mx-auto d-block">

            @endif

            <div wire:loading wire:target="logo_tienda">Uploading...</div>

        </div>

        <div class="col-md-6">
            <div class="card card-gray-dark">
                <div class="card-header">
                    <h5 class="card-title">Información de la Tienda</h5>
                    <div class="card-tools">
                        <span class="btn btn-tool"><i class="fas fa-store"></i></span>
                    </div>
                </div>
                <div class="card-body">

                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-store"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nombre_tienda" wire:model.debounce.10000000ms="nombre_tienda" placeholder="Nombre de Tienda">
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
                                <input type="text" class="form-control" name="rif_tienda" wire:model.debounce.10000000ms="rif_tienda" placeholder="RIF de Tienda">
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
                                <input type="text" class="form-control" name="jefe_tienda" wire:model.debounce.10000000ms="jefe_tienda" placeholder="Jefe de Tienda">
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
                                <input type="text" class="form-control" name="telefonos_tienda" wire:model.debounce.10000000ms="telefonos_tienda" placeholder="Telefonos de Tienda">
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
                                <input type="text" class="form-control" name="email_tienda" wire:model.debounce.10000000ms="email_tienda" placeholder="Email de Tienda">
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
                                <input type="text" class="form-control" name="direccion_tienda" wire:model.debounce.10000000ms="direccion_tienda" placeholder="Direccion de Tienda">
                                @error('direccion_tienda')
                                <span class="col-sm-12 text-sm text-bold text-danger">
                                                    <i class="icon fas fa-exclamation-triangle"></i>
                                                    {{ $message }}
                                                </span>
                                @enderror
                            </div>
                        </div>



                    <div class="form-group text-right">
                        <input type="submit" class="btn btn-block btn-success" value="Crear Tienda">
                    </div>



                </div>
            </div>
        </div>

    </div>


</div>
{!! Form::close() !!}

{!! Form::open(['wire:submit.prevent' => "updateImagen"]) !!}
<div class="row justify-content-center">

    <div class="row col-md-11 justify-content-center">

        <div class="col-md-6">

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">

                    <h3 class="profile-username text-center">{{ ucwords($nombre_tienda) }}</h3>

                </div>
                <!-- /.card-body -->
            </div>

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


        </div>

        <div class="col-md-6">

            @if ($logo_tienda)

                Logo Preview:

                <img src="{{ $logo_tienda->temporaryUrl() }}" class="img-fluid img-thumbnail rounded mx-auto d-block">

            @endif

            @if ($imagen_tienda)

                Imagen Preview:

                <img src="{{ $imagen_tienda->temporaryUrl() }}" class="img-fluid img-thumbnail rounded mx-auto d-block">

            @endif

            <div wire:loading wire:target="logo_tienda">Uploading...</div>

            @if ($logo_tienda || $imagen_tienda)
                <div class="form-group mt-3 text-right">
                    <input type="submit" class="btn btn-block btn-primary" value="Guardar Cambios">
                </div>
            @endif

        </div>

    </div>


</div>
{!! Form::close() !!}

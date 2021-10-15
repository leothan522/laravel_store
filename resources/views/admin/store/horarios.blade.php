<div class="form-group">

    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ showActive('Mon') }}" id="custom-tabs-three-lunes-tab" data-toggle="pill"
               href="#custom-tabs-three-lunes" role="tab" aria-controls="custom-tabs-three-lunes"
               aria-selected="false">Lunes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ showActive('Tue') }}" id="custom-tabs-three-martes-tab" data-toggle="pill"
               href="#custom-tabs-three-martes" role="tab" aria-controls="custom-tabs-three-martes"
               aria-selected="false">Martes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ showActive('Web') }}" id="custom-tabs-three-miercoles-tab" data-toggle="pill"
               href="#custom-tabs-three-miercoles" role="tab" aria-controls="custom-tabs-three-miercoles"
               aria-selected="false">Miercoles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ showActive('Thu') }}" id="custom-tabs-three-jueves-tab" data-toggle="pill"
               href="#custom-tabs-three-jueves" role="tab" aria-controls="custom-tabs-three-jueves"
               aria-selected="false">Jueves</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ showActive('Fri') }}" id="custom-tabs-three-viernes-tab" data-toggle="pill"
               href="#custom-tabs-three-viernes" role="tab" aria-controls="custom-tabs-three-viernes"
               aria-selected="false">Viernes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ showActive('Sat') }}" id="custom-tabs-three-sabado-tab" data-toggle="pill"
               href="#custom-tabs-three-sabado" role="tab" aria-controls="custom-tabs-three-sabado"
               aria-selected="false">Sabado</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ showActive('Sun') }}" id="custom-tabs-three-domingo-tab" data-toggle="pill"
               href="#custom-tabs-three-domingo" role="tab" aria-controls="custom-tabs-three-domingo"
               aria-selected="false">Domingo</a>
        </li>
    </ul>
    <div class="tab-content" id="custom-tabs-three-tabContent">
        {{-- Lunes --}}
        <div class="tab-pane fade {{ showActive('Mon') }}" id="custom-tabs-three-lunes" role="tabpanel" aria-labelledby="custom-tabs-three-lunes-tab">
            <div class="row mt-3 justify-content-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Apertura</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                            <input type="time" name="lunes_open" value="{{--{{ $lunes_open }}--}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Cierre</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                            <input type="time" name="lunes_closed" value="{{--{{ $lunes_closed }}--}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Martes --}}
        <div class="tab-pane fade {{ showActive('Tue') }}" id="custom-tabs-three-martes" role="tabpanel" aria-labelledby="custom-tabs-three-martes-tab">
            <div class="row mt-3 justify-content-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Apertura</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                            <input type="time" name="martes_open" value="{{--{{ $martes_open }}--}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Cierre</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                            <input type="time" name="martes_closed" value="{{--{{ $martes_closed }}--}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Miercoles --}}
        <div class="tab-pane fade {{ showActive('Wed') }}" id="custom-tabs-three-miercoles" role="tabpanel" aria-labelledby="custom-tabs-three-miercoles-tab">
            <div class="row mt-3 justify-content-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Apertura</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                            <input type="time" name="miercoles_open" value="{{--{{ $miercoles_open }}--}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Cierre</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                            <input type="time" name="miercoles_closed" value="{{--{{ $miercoles_closed }}--}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Jueves --}}
        <div class="tab-pane fade {{ showActive('Thu') }}" id="custom-tabs-three-jueves" role="tabpanel" aria-labelledby="custom-tabs-three-jueves-tab">
            <div class="row mt-3 justify-content-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Apertura</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                            <input type="time" name="jueves_open" value="{{--{{ $jueves_open }}--}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Cierre</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                            <input type="time" name="jueves_closed" value="{{--{{ $jueves_closed }}--}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Viernes --}}
        <div class="tab-pane fade {{ showActive('Fri') }}" id="custom-tabs-three-viernes" role="tabpanel" aria-labelledby="custom-tabs-three-viernes-tab">
            <div class="row mt-3 justify-content-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Apertura</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                            <input type="time" name="viernes_open" value="{{--{{ $viernes_open }}--}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Cierre</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                            <input type="time" name="viernes_closed" value="{{--{{ $viernes_closed }}--}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Sabado --}}
        <div class="tab-pane fade {{ showActive('Sat') }}" id="custom-tabs-three-sabado" role="tabpanel" aria-labelledby="custom-tabs-three-sabado-tab">
            <div class="row mt-3 justify-content-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Apertura</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                            <input type="time" name="sabado_open" value="{{--{{ $sabado_open }}--}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Cierre</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                            <input type="time" name="sabado_closed" value="{{--{{ $sabado_closed }}--}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Domingo --}}
        <div class="tab-pane fade {{ showActive('Sun') }}" id="custom-tabs-three-domingo" role="tabpanel" aria-labelledby="custom-tabs-three-domingo-tab">
            <div class="row mt-3 justify-content-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Apertura</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                            <input type="time" name="domingo_open" value="{{--{{ $domingo_open }}--}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Cierre</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                            <input type="time" name="domingo_closed" value="{{--{{ $domingo_closed }}--}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>

<div class="alert @if(storeHours()) alert-success @else alert-danger @endif {{--alert-dismissible--}}">
    @if (storeHours())
        <h5><i class="icon fas fa-check"></i> ¡Abierto!</h5>
    @else
        <h5><i class="icon fas fa-lock"></i> ¡Cerrado!</h5>
    @endif
    {{--Dia: {{ date('D') }}.--}}Hora actual: <strong>{{ date('h:i a') }}</strong>. Status: <strong>@if(storeHours()) OPEN @else CLOSED @endif</strong>
</div>

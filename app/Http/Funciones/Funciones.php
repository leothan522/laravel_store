<?php

use App\Models\Parametro;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

function hola(){
    return "Funciones Funcionando correctamente";
}

function role($i = null){
    $status = [
        '0'     => 'Estandar',
        '1'     => 'Administrador',
        '100'   => 'Root'
    ];
    if (is_null($i)){
        unset($status["100"]);
        return $status;
    }else{
        return $status[$i];
    }
}

function estatusUsuario($i, $icon = null){
    if (is_null($icon)){
        $suspendido = "Suspendido";
        $activado = "Activo";
    }else{
        $suspendido = '<i class="fa fa-user-slash"></i>';
        $activado = '<i class="fa fa-user-check"></i>';
    }

    $status = [
        '0' => '<span class="text-danger">'.$suspendido.'</span>',
        '1' => '<span class="text-success">'.$activado.'</span>'/*,
        '2' => '<span class="text-success">Confirmado</span>'*/
    ];
    return $status[$i];
}

function iconoPlataforma($plataforma)
{
    if ($plataforma == 0) {
        return '<i class="fas fa-desktop"></i>';
    } else {
        return '<i class="fas fa-mobile"></i>';
    }
}

function haceCuanto($fecha){
    $carbon = new Carbon();
    return $carbon->parse($fecha)->diffForHumans();
}

function fecha($fecha, $format = null){
    $carbon = new Carbon();
    if ($format == null){ $format = "j/m/Y"; }
    return $carbon->parse($fecha)->format($format);
}

function cuantosDias($fecha_inicio, $fecha_final){

    if ($fecha_inicio == null){
        return 0;
    }

    $carbon = new Carbon();
    $fechaEmision = $carbon->parse($fecha_inicio);
    $fechaExpiracion = $carbon->parse($fecha_final);
    $diasDiferencia = $fechaExpiracion->diffInDays($fechaEmision);
    return $diasDiferencia;
}

function diaEspanol($fecha){
    $diaSemana = date("w",strtotime($fecha));
    $diasEspanol = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
    $dia = $diasEspanol[$diaSemana];
    return $dia;
}

function mesEspanol($numMes){
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $mes = $meses[$numMes - 1];
    return $mes;
}

//Leer JSON
function leerJson($json, $key)
{
    if ($json == null) {
        return null;
    } else {
        $json = $json;
        $json = json_decode($json, true);
        if (array_key_exists($key, $json)) {
            return $json[$key];
        } else {
            return null;
        }
    }
}

//funcion formato millares
function formatoMillares($cantidad, $decimal = 2)
{
    return number_format($cantidad, $decimal, ',', '.');
}

//Ceros a la izquierda
function cerosIzquierda($cantidad, $cantCeros = 2)
{
    if ($cantidad == 0) {
        return 0;
    }
    return str_pad($cantidad, $cantCeros, "0", STR_PAD_LEFT);
}

//calculo de porcentaje
function obtenerPorcentaje($cantidad, $total)
{
    if ($total != 0) {
        $porcentaje = ((float)$cantidad * 100) / $total; // Regla de tres
        $porcentaje = round($porcentaje, 2);  // Quitar los decimales
        return $porcentaje;
    }
    return 0;
}

//Alertas de sweetAlert2
function verSweetAlert2($mensaje, $type = 'success', $title = '¡Éxito!', $toast_icono = 'success', $html_icono = '<i class="fa fa-trash-alt"></i>', $html_color = 'error')
{
    switch ($type){
        default:
            alert($title,$mensaje, $type)->persistent(true,false);
        break;
        case "iconHtml":
            alert($title, $mensaje, $html_color)->iconHtml($html_icono)->persistent(true,false)->toHtml();
        break;
        case "toast":
            toast($mensaje, $toast_icono);
        break;
    }
    /*
        alert()->image($title,$mensaje,'Image URL','Image Width','Image Height')->persistent(true,false);
        alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.');
        alert()->info('InfoAlert','Lorem ipsum dolor sit amet.');
        alert()->warning('WarningAlert','Lorem ipsum dolor sit amet.');
        alert()->error('ErrorAlert','Lorem ipsum dolor sit amet.');
        alert()->question('QuestionAlert','Lorem ipsum dolor sit amet.');
        toast('Success Toast','success');.
        // example:
        alert()->success('Post Created', '<strong>Successfully</strong>')->toHtml();
        // example:
        alert('Title','Lorem Lorem Lorem', 'success')->addImage('https://unsplash.it/400/200');
        // example:
        alert('Title','Lorem Lorem Lorem', 'success')->width('720px');
        // example:
        alert('Title','Lorem Lorem Lorem', 'success')->padding('50px');
        */
    // example:
    //alert()->success('¡Éxito!',$mensaje)->persistent(true,false);
    // example:
    //alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.')->showConfirmButton('Confirm', '#3085d6');
    // example:
    //alert()->question('Are you sure?','You won\'t be able to revert this!')->showCancelButton('Cancel', '#aaa');
    // example:
    //toast('Post Updated','success','top-right')->showCloseButton();
    // example:
    //toast('Post Updated','success','top-right')->hideCloseButton();
    // example:
    /*alert()->question('Are you sure?','You won\'t be able to revert this!')
        ->showConfirmButton('Yes! Delete it', '#3085d6')
        ->showCancelButton('Cancel', '#aaa')->reverseButtons();*/

    // example:
    // alert()->error('Oops...', 'Something went wrong!')->footer('<a href="#">Why do I have this issue?</a>');
    // example:
    //alert()->success('Post Created', 'Successfully')->toToast();
    // example:
    //alert('Title','Lorem Lorem Lorem', 'success')->background('#2acc56');
    // example:
    //()->success('Post Created', 'Successfully')->buttonsStyling(false);
    // example:
    //alert()->success('Post Created', 'Successfully')->iconHtml('<i class="far fa-thumbs-up"></i>');
    // example:
    //alert()->question('Are you sure?','You won\'t be able to revert this!')->showCancelButton()->showConfirmButton()->focusConfirm(true);
    // example:
    //alert()->question('Are you sure?','You won\'t be able to revert this!')->showCancelButton()->showConfirmButton()->focusCancel(true);
    // example:
    //toast('Signed in successfully','success')->timerProgressBar();

}

//Dias activo en Store Hours
function showActive($dia)
{
    $hoy = date('D');
    if ($hoy == $dia) {
        return "show active";
    } else {
        return '';
    }
}

//Función comprueba una hora entre un rango
function hourIsBetween($from, $to, $input) {
    $dateFrom = DateTime::createFromFormat('!H:i', $from);
    $dateTo = DateTime::createFromFormat('!H:i', $to);
    $dateInput = DateTime::createFromFormat('!H:i', $input);
    if ($dateFrom > $dateTo) $dateTo->modify('+1 day');
    return ($dateFrom <= $dateInput && $dateInput <= $dateTo) || ($dateFrom <= $dateInput->modify('+1 day') && $dateInput <= $dateTo);
    /*En la función lo que haremos será pasarle, el desde y el hasta del rango de horas que queremos que se encuentre y el datetime con la hora que nos llega.
Comprobaremos si la segunda hora que le pasamos es inferior a la primera, con lo cual entenderemos que es para el día siguiente.
Y al final devolveremos true o false dependiendo si el valor introducido se encuentra entre lo que le hemos pasado.*/
}


//Estado de Tienda Abierto o Cerrada
function storeHours($store_id = null)
{
    $store = null;
    $status = true;

    if (is_null($store_id)){
        $store_default = Parametro::where('nombre', 'store_default')->first();
        if ($store_default){
            $store = $store_default->tabla_id;
        }else{
            return false;
        }

        $store_status = Parametro::where('nombre', 'store_status')->where('tabla_id', $store)->first();
        if ($store_status && $store_status->valor == 0){
            return false;
        }
    }else{
        if (!storeEstatus($store_id)){
            return false;
        }
    }

    $horarios = Parametro::where('nombre', 'horarios')->first();
    if ($horarios && $horarios->valor == 1){
        $dia = date('D');
        $open = Parametro::where('nombre', $dia."_open")->first();
        $closed = Parametro::where('nombre', $dia."_closed")->first();
        if ($open && $closed){
            $status = hourIsBetween($open->valor, $closed->valor, date('H:i'));
        }else{
            $status = true;
        }
    }else{
        $status = true;
    }

    /*$anulazion_forzada = Parametro::where('nombre', 'anulazion_forzada')->first();
    if ($anulazion_forzada && $anulazion_forzada->valor == 1){
        $status = false;
    }else{
        $status = true;
    }*/

    return $status;
}

function storeEstatus($store_id)
{
    $store = Parametro::where('nombre', 'store_status')->where('tabla_id', $store_id)->first();
    if ($store){
        return $store->valor;
    }else{
        return 1;
    }
}

function storeDefault($store_id)
{
    $store = Parametro::where('nombre', 'store_default')->where('tabla_id', $store_id)->first();
    if ($store){
        return '<i class="fas fa-certificate text-muted text-xs"></i>';
    }else{
        return false;
    }
}


function verImagen($path, $name)
{
    if (!is_null($path)){
        if (file_exists(public_path('storage/'.$path))){
            return asset('storage/'.$path);
        }else{
            if (config('app.type') == 'local'){
                return asset('img/user.png');
            }
            return "https://ui-avatars.com/api/?name=$name&color=7F9CF5&background=EBF4FF";
        }
    }else{
        //return 'https://ui-avatars.com/api/?name='.$name;
        if (config('app.type') == 'local'){
            return asset('img/user.png');
        }
        return "https://ui-avatars.com/api/?name=$name&color=7F9CF5&background=EBF4FF";
    }
}

function crearMiniaturas($img_source, $file_path, $name, $extension = 'png')
{
    $manager = new ImageManager();

    $smallthumbnail = $manager->make($img_source)->resize(150, 93, function ($constraint) {
        $constraint->aspectRatio();
    })->sharpen(15);
    $smallthumbnail->save($file_path.'/t_small_'.$name.'.'.$extension);

    $mediumthumbnail = $manager->make($img_source)->resize(300, 185, function ($constraint) {
        $constraint->aspectRatio();
    })->sharpen(15);
    $mediumthumbnail->save($file_path.'/t_medium_'.$name.'.'.$extension);

    $largethumbnail = $manager->make($img_source)->resize(600, 600, function ($constraint) {
        $constraint->aspectRatio();
    })->sharpen(15);
    $largethumbnail->save($file_path.'/t_large_'.$name.'.'.$extension);

}

function mostrarImagen($file_path, $size = 'original', $extra = 'logo', $path = 'public/store-photos/', $t_name = null)
{

    //$exists = Storage::disk('local')->exists($file_path);
    //mostrarImagen($file_path, 'large', 'logo', 'public/store-photos/', $t_logo)
    switch ($size){
        default:
            if (!is_null($file_path) && empty(!$file_path)){
                if (Storage::disk('local')->exists($file_path)) {
                    return asset(str_replace('public/', 'storage/', $file_path));
                }
                return asset('img/img-placeholder-320x320.png');
            }
            return asset('img/img-placeholder-320x320.png');
        break;
        case "small":
            $name = 't_small_'.$extra.'_'.$t_name.'.png';
            if (!is_null($file_path) && empty(!$file_path)){
                if (Storage::disk('local')->exists($path.''.$file_path.'/'.$name)) {
                    return asset(str_replace('public/', 'storage/', $path.''.$file_path.'/'.$name));
                }
                return asset('img/img-placeholder-320x320.png');
            }
            return asset('img/img-placeholder-320x320.png');
        break;
        case "medium":
            $name = 't_medium_'.$extra.'_'.$t_name.'.png';
            if (!is_null($file_path) && empty(!$file_path)){
                if (Storage::disk('local')->exists($path.''.$file_path.'/'.$name)) {
                    return asset(str_replace('public/', 'storage/', $path.''.$file_path.'/'.$name));
                }
                return asset('img/img-placeholder-320x320.png');
            }
            return asset('img/img-placeholder-320x320.png');
        break;
        case "large":
            $name = 't_large_'.$extra.'_'.$t_name.'.png';
            if (!is_null($file_path) && empty(!$file_path)){
                if (Storage::disk('local')->exists($path.''.$file_path.'/'.$name)) {
                    return asset(str_replace('public/', 'storage/', $path.''.$file_path.'/'.$name));
                }
                return asset('img/img-placeholder-320x320.png');
            }
            return asset('img/img-placeholder-320x320.png');
        break;
    }

}

function borrarImagen($imagen, $file_path, $t_name, $name, $path)
{

    //borrarImagen($db_logo_tienda, $file_path, $db_t_logo, 'logo', 'public/store-photos/');

    $small = 't_small_'.$name.'_'.$t_name.'.png';
    $medium = 't_medium_'.$name.'_'.$t_name.'.png';
    $large = 't_large_'.$name.'_'.$t_name.'.png';

    if (Storage::disk('local')->exists($imagen)) {
        Storage::disk('local')->delete($imagen);
    }
    if (Storage::disk('local')->exists($path.''.$file_path.'/'.$small)) {
        Storage::disk('local')->delete($path.''.$file_path.'/'.$small);
    }
    if (Storage::disk('local')->exists($path.''.$file_path.'/'.$medium)) {
        Storage::disk('local')->delete($path.''.$file_path.'/'.$medium);
    }
    if (Storage::disk('local')->exists($path.''.$file_path.'/'.$large)) {
        Storage::disk('local')->delete($path.''.$file_path.'/'.$large);
    }

}


?>

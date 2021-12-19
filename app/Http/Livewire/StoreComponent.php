<?php

namespace App\Http\Livewire;

use App\Models\Parametro;
use App\Models\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class StoreComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    use LivewireAlert;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'confirmed',
    ];

    public $view = 'show', $logo_tienda, $imagen_tienda, $file_path, $t_logo, $t_imagen;
    public $horarios, $store_status,
        $lunes_open, $lunes_closed,
        $martes_open, $martes_closed,
        $miercoles_open, $miercoles_closed,
        $jueves_open, $jueves_closed,
        $viernes_open, $viernes_closed,
        $sabado_open, $sabado_closed,
        $domingo_open, $domingo_closed;

    public $nombre_tienda, $rif_tienda, $moneda_base, $jefe_tienda, $telefonos_tienda, $email_tienda, $direccion_tienda, $store_id;

    public function render()
    {
        $existe = Parametro::where('nombre', 'horarios')->first();
        if ($existe){ $this->horarios = $existe->valor; }else{ $this->horarios = 0; }

        $existe = Parametro::where('nombre', 'Mon_open')->first();
        if ($existe){ $this->lunes_open = $existe->valor; }else{ $this->lunes_open = null; }
        $existe = Parametro::where('nombre', 'Mon_closed')->first();
        if ($existe){ $this->lunes_closed = $existe->valor; }else{ $this->lunes_closed = null; }
        $existe = Parametro::where('nombre', 'Tue_open')->first();
        if ($existe){ $this->martes_open = $existe->valor; }else{ $this->martes_open = null; }
        $existe = Parametro::where('nombre', 'Tue_closed')->first();
        if ($existe){ $this->martes_closed = $existe->valor; }else{ $this->martes_closed = null; }
        $existe = Parametro::where('nombre', 'Wed_open')->first();
        if ($existe){ $this->miercoles_open = $existe->valor; }else{ $this->miercoles_open = null; }
        $existe = Parametro::where('nombre', 'Wed_closed')->first();
        if ($existe){ $this->miercoles_closed = $existe->valor; }else{ $this->miercoles_closed = null; }
        $existe = Parametro::where('nombre', 'Thu_open')->first();
        if ($existe){ $this->jueves_open = $existe->valor; }else{ $this->jueves_open = null; }
        $existe = Parametro::where('nombre', 'Thu_closed')->first();
        if ($existe){ $this->jueves_closed = $existe->valor; }else{ $this->jueves_closed = null; }
        $existe = Parametro::where('nombre', 'Fri_open')->first();
        if ($existe){ $this->viernes_open = $existe->valor; }else{ $this->viernes_open = null; }
        $existe = Parametro::where('nombre', 'Fri_closed')->first();
        if ($existe){ $this->viernes_closed = $existe->valor; }else{ $this->viernes_closed = null; }
        $existe = Parametro::where('nombre', 'Sat_open')->first();
        if ($existe){ $this->sabado_open = $existe->valor; }else{ $this->sabado_open = null; }
        $existe = Parametro::where('nombre', 'Sat_closed')->first();
        if ($existe){ $this->sabado_closed = $existe->valor; }else{ $this->sabado_closed = null; }
        $existe = Parametro::where('nombre', 'Sun_open')->first();
        if ($existe){ $this->domingo_open = $existe->valor; }else{ $this->domingo_open = null; }
        $existe = Parametro::where('nombre', 'Sun_closed')->first();
        if ($existe){ $this->domingo_closed = $existe->valor; }else{ $this->domingo_closed = null; }

        $stores = Store::/*buscar($this->busqueda)->*/orderBy('id', 'ASC')->paginate(30);

        return view('livewire.store-component')
            ->with('stores', $stores);
    }

    public function parametros($nombre, $valor, $tabla_id = null)
    {

        if (is_null($tabla_id)){
            $exite = Parametro::where('nombre', $nombre)->first();
            if ($exite){
                $parametro = Parametro::find($exite->id);
                $parametro->nombre = $nombre;
                $parametro->valor = $valor;
                $parametro->tabla_id = $tabla_id;
                $parametro->update();
            }else{
                $parametro = new Parametro();
                $parametro->nombre = $nombre;
                $parametro->valor = $valor;
                $parametro->tabla_id = $tabla_id;
                $parametro->save();
            }
        }else{

            $exite = Parametro::where('nombre', $nombre)->where('tabla_id', $tabla_id)->first();
            if ($exite){
                $parametro = Parametro::find($exite->id);
                $parametro->nombre = $nombre;
                $parametro->valor = $valor;
                $parametro->tabla_id = $tabla_id;
                $parametro->update();
            }else{
                $parametro = new Parametro();
                $parametro->nombre = $nombre;
                $parametro->valor = $valor;
                $parametro->tabla_id = $tabla_id;
                $parametro->save();
            }

        }

    }

    public function limpiar()
    {
        $this->nombre_tienda = null;
        $this->rif_tienda= null;
        $this->moneda_base= null;
        $this->jefe_tienda = null;
        $this->telefonos_tienda = null;
        $this->email_tienda = null;
        $this->direccion_tienda = null;
        $this->store_id = null;
        $this->logo_tienda = null;
        $this->imagen_tienda = null;
        $this->t_logo = null;
        $this->t_imagen = null;
    }

    public function create()
    {
        $this->limpiar();
        $this->view = 'create';
    }

    public function store()
    {
        $file_path = time();
        $logo_tienda = null;
        $imagen_tienda = null;
        $manager = new ImageManager();
        $rules = [
            'nombre_tienda' => ['required', 'min:4', Rule::unique('stores')],
            'rif_tienda' => 'required',
            'moneda_base' => 'required',
            'jefe_tienda' => 'required',
        ];
        $this->validate($rules);


        if ($this->logo_tienda){
            $logo_tienda = $this->logo_tienda->store('public/store-photos/'.$file_path);
            $t_img = $this->logo_tienda->temporaryUrl();
            $t_path = Storage::path('public/store-photos/'.$file_path);
            $t_nombre = 'logo_'.$file_path;
            crearMiniaturas($t_img, $t_path, $t_nombre);
        }
        if ($this->imagen_tienda){
            $imagen_tienda = $this->imagen_tienda->store('public/store-photos/'.$file_path);
            $t_img = $this->imagen_tienda->temporaryUrl();
            $t_path = Storage::path('public/store-photos/'.$file_path);
            $t_nombre = 'imagen_'.$file_path;
            crearMiniaturas($t_img, $t_path, $t_nombre);
        }

        if (!$this->logo_tienda && !$this->imagen_tienda){ $file_path = null; }

        $store = new Store();
        $store->nombre_tienda = $this->nombre_tienda;
        $store->rif_tienda = $this->rif_tienda;
        $store->moneda_base = $this->moneda_base;
        $store->jefe_tienda = $this->jefe_tienda;
        $store->telefonos_tienda = $this->telefonos_tienda;
        $store->email_tienda = $this->email_tienda;
        $store->direccion_tienda = $this->direccion_tienda;
        $store->file_path = $file_path;
        $store->t_logo = $file_path;
        $store->t_imagen = $file_path;
        $store->logo_tienda = $logo_tienda;
        $store->imagen_tienda = $imagen_tienda;
        $store->save();
        $store_default = Parametro::where('nombre', 'store_default')->first();
        if (!$store_default){
            $parametro = new Parametro();
            $parametro->nombre = 'store_default';
            $parametro->tabla_id = $store->id;
            $parametro->save();
        }
        $this->show($store->id);
        $this->alert(
            'success',
            'Tienda Creada Exitosamente'
        );
    }

    public function edit()
    {
        $this->view = 'edit';
    }

    public function update()
    {
        $rules = [
            'nombre_tienda' => ['required', 'min:4', Rule::unique('stores', 'nombre_tienda')->ignore($this->store_id)],
            'rif_tienda' => 'min:6',
            'jefe_tienda' => 'min:6',
        ];
        $this->validate($rules);
        $store = Store::find($this->store_id);
        $store->nombre_tienda = $this->nombre_tienda;
        $store->rif_tienda = $this->rif_tienda;
        $store->jefe_tienda = $this->jefe_tienda;
        $store->telefonos_tienda = $this->telefonos_tienda;
        $store->email_tienda = $this->email_tienda;
        $store->direccion_tienda = $this->direccion_tienda;
        $store->update();
        //$this->view = 'show';
        $this->alert(
            'success',
            'Tienda Actualizada'
        );
    }

    public function show($id)
    {
        $store = Store::find($id);
        $this->store_id = $store->id;
        $this->nombre_tienda = $store->nombre_tienda;
        $this->rif_tienda = $store->rif_tienda;
        $this->moneda_base = $store->moneda_base;
        $this->jefe_tienda = $store->jefe_tienda;
        $this->telefonos_tienda = $store->telefonos_tienda;
        $this->email_tienda = $store->email_tienda;
        $this->direccion_tienda = $store->direccion_tienda;
        $this->file_path = $store->file_path;
        $this->t_logo = $store->t_logo;
        $this->t_imagen = $store->t_imagen;
        $this->logo_tienda = $store->logo_tienda;
        $this->imagen_tienda = $store->imagen_tienda;
        $this->view = 'show';
    }

    public function images()
    {
        $this->logo_tienda = null;
        $this->imagen_tienda = null;
        $this->t_logo = null;
        $this->t_imagen = null;
        $this->view = 'images';
    }

    public function horarios($valor)
    {
        if ($valor == 1){
            $valor = 0;
            $text = "Horario de Tienda Desactivado";
        }else{
            $valor = 1;
            $text = "Horario de Tienda Activado";
        }
        $this->parametros('horarios', $valor, null);
        $this->alert(
            'success',
            $text
        );
    }

    public function estatusTienda($tabla_id, $valor)
    {
        if ($valor == 1){
            $valor = 0;
            $text = "Tienda Cerrada";
        }else{
            $valor = 1;
            $text = "Tienda Abierta";
        }
        $this->parametros('store_status', $valor, $tabla_id);
            $this->alert(
                'success',
                $text
            );
    }

    public function storeHorarios()
    {
        $this->parametros('Mon_open', $this->lunes_open);
        if (!empty($this->lunes_closed)){
            $this->parametros('Mon_closed', $this->lunes_closed);
        }

        $this->parametros('Tue_open', $this->martes_open);
        if (!empty($this->martes_closed)){
            $this->parametros('Tue_closed', $this->martes_closed);
        }

        $this->parametros('Wed_open', $this->miercoles_open);
        if (!empty($this->miercoles_closed)){
            $this->parametros('Wed_closed', $this->miercoles_closed);
        }

        $this->parametros('Thu_open', $this->jueves_open);
        if (!empty($this->jueves_closed)){
            $this->parametros('Thu_closed', $this->jueves_closed);
        }

        $this->parametros('Fri_open', $this->viernes_open);
        if (!empty($this->viernes_closed)){
            $this->parametros('Fri_closed', $this->viernes_closed);
        }

        $this->parametros('Sat_open', $this->sabado_open);
        if (!empty($this->sabado_closed)){
            $this->parametros('Sat_closed', $this->sabado_closed);
        }

        $this->parametros('Sun_open', $this->domingo_open);
        if (!empty($this->domingo_closed)){
            $this->parametros('Sun_closed', $this->domingo_closed);
        }

        $this->alert(
            'success',
            'Horario Actualizado '
        );
    }

    public function destroy($id)
    {
        $this->store_id = $id;
        $this->confirm('¿Estas seguro?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  '¡Sí, bórralo!',
            'text' =>  '¡No podrás revertir esto!',
            'cancelButtonText' => 'No',
            'onConfirmed' => 'confirmed',
        ]);

    }

    public function confirmed()
    {
        // Example code inside confirmed callback
        $store = Store::find($this->store_id);

        $file_path = $store->file_path;
        $db_t_logo = $store->t_logo;
        $db_t_imagen = $store->t_imagen;
        $db_logo_tienda = $store->logo_tienda;
        $db_imagen_tienda = $store->imagen_tienda;

        borrarImagen($db_logo_tienda, $file_path, $db_t_logo, 'logo', 'public/store-photos/');
        borrarImagen($db_imagen_tienda, $file_path, $db_t_imagen, 'imagen', 'public/store-photos/');

        $store_default = Parametro::where('nombre', 'store_default')->where('tabla_id', $this->store_id)->first();
        if ($store_default){ $store_default->delete(); }
        $store_status = Parametro::where('nombre', 'store_status')->where('tabla_id', $this->store_id)->first();
        if ($store_status){ $store_status->delete(); }
        $store_multimoneda = Parametro::where('nombre', 'store_multimoneda')->where('tabla_id', $this->store_id)->first();
        if ($store_multimoneda){ $store_multimoneda->delete(); }
        $store->delete();
        $this->limpiar();
        $this->alert(
            'success',
            'Tienda Eliminada'
        );

    }

    public function storeDefault($id)
    {
        $exite = Parametro::where('nombre', 'store_default')->first();
        if ($exite){
            $parametro = Parametro::find($exite->id);
            $parametro->tabla_id = $id;
            $parametro->update();
        }else{
            $parametro = new Parametro();
            $parametro->nombre = 'store_default';
            $parametro->valor = null;
            $parametro->tabla_id = $id;
            $parametro->save();
        }
    }

    public function updateImagen()
    {

        $store = Store::find($this->store_id);

        if (is_null($store->file_path)){
            $file_path = time();
            $store->file_path = $file_path;
        }else{
            $file_path = $store->file_path;
        }

        $db_t_logo = $store->t_logo;
        $db_t_imagen = $store->t_imagen;
        $t_logo = time();
        $t_imagen = time();
        $db_logo_tienda = $store->logo_tienda;
        $db_imagen_tienda = $store->imagen_tienda;


        if ($this->logo_tienda){
            borrarImagen($db_logo_tienda, $file_path, $db_t_logo, 'logo', 'public/store-photos/');
            $logo_tienda = $this->logo_tienda->store('public/store-photos/'.$file_path);
            $t_img = $this->logo_tienda->temporaryUrl();
            $t_path = Storage::path('public/store-photos/'.$file_path);
            $t_nombre = 'logo_'.$t_logo;
            crearMiniaturas($t_img, $t_path, $t_nombre);
            $store->logo_tienda = $logo_tienda;
            $store->t_logo = $t_logo;
        }
        if ($this->imagen_tienda){
            borrarImagen($db_imagen_tienda, $file_path, $db_t_imagen, 'imagen', 'public/store-photos/');
            $imagen_tienda = $this->imagen_tienda->store('public/store-photos/'.$file_path);
            $t_img = $this->imagen_tienda->temporaryUrl();
            $t_path = Storage::path('public/store-photos/'.$file_path);
            $t_nombre = 'imagen_'.$t_imagen;
            crearMiniaturas($t_img, $t_path, $t_nombre);
            $store->imagen_tienda = $imagen_tienda;
            $store->t_imagen = $t_imagen;
        }

        $store->update();
        $this->show($this->store_id);

        $this->alert(
            'success',
            'Imagenes Actualizadas'
        );

    }

    public function storeDivisa($id, $valor)
    {
        if ($valor == 1){
            $this->parametros('store_multimoneda', 0, $id);
        }else{
            $this->parametros('store_multimoneda', 1, $id);
        }

        $this->alert(
            'success',
            'Ajuste Guardado'
        );

    }

}

<?php

namespace App\Http\Livewire;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Unidad;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class ArticulosComponent extends Component
{
    use WithPagination;
    use LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'confirmed_categoria',
        'confirmed_unidad',
        'confirmed_articulo'
    ];

    public $view_categoria = 'create_categoria', $view_unidad = 'create_unidad', $view_articulo = 'create_articulo';
    public $categoria_id, $codigo_categoria, $descripcion_categoria, $estatus_categoria;
    public $unidad_id, $codigo_unidad, $descripcion_unidad;
    public $art_codigo_categoria, $art_descripcion_categoria, $art_codigo_unidad, $art_descripcion_unidad;
    public $articulo_id, $codigo_articulo, $descripcion_articulo, $estatus_articulo;
    public $busqueda;

    public function mount(Request $request)
    {
        if (!is_null($request->articulo)){
            $articulo = Articulo::where('codigo_articulo', $request->articulo)->first();
            if ($articulo){
                $this->edit_articulo($articulo->id);
            }else{
                $this->busqueda = Articulo::where('descripcion_articulo', 'LIKE', "%$request->articulo%")->orderBy('codigo_articulo', 'ASC')->get();
            }
        }
    }

    public function render()
    {
        $categorias = Categoria::orderBy('codigo_categoria', 'ASC')->get();
        $unidades = Unidad::orderBy('codigo_unidad')->get();
        return view('livewire.articulos-component')
            ->with('categorias', $categorias)
            ->with('categorias_count', $categorias->count())
            ->with('unidades', $unidades)
            ->with('unidades_count', $unidades->count())
            ->with('i', 1);
    }

    public function limpiar()
    {
        $this->codigo_categoria = null;
        $this->categoria_id = null;
        $this->descripcion_categoria = null;
        $this->estatus_categoria = null;
        $this->view_categoria = "create_categoria";

        $this->codigo_unidad = null;
        $this->unidad_id = null;
        $this->descripcion_unidad = null;
        $this->view_unidad = "create_unidad";

        $this->codigo_articulo = null;
        $this->descripcion_articulo = null;
        $this->art_codigo_categoria = null;
        $this->art_descripcion_categoria = null;
        $this->art_codigo_unidad = null;
        $this->art_descripcion_unidad = null;
        $this->view_articulo = 'create_articulo';

        $this->busqueda = null;
    }

    public function store_categoria()
    {
        $rules = [
            'codigo_categoria' => ['required', 'min:4', 'alpha_dash', Rule::unique('categorias')],
            'descripcion_categoria' => 'required'
        ];
        $this->validate($rules);
        $categoria = new Categoria();
        $categoria->codigo_categoria = strtoupper($this->codigo_categoria);
        $categoria->descripcion_categoria = strtoupper($this->descripcion_categoria);
        $categoria->estatus = 1;
        $categoria->save();

        $this->limpiar();

        $this->alert(
            'success',
            'Categoria Creada Exitosamnete'
        );
    }

    public function edit_categoria($id)
    {
        $categoria = Categoria::find($id);
        $this->categoria_id = $categoria->id;
        $this->descripcion_categoria = $categoria->descripcion_categoria;
        $this->codigo_categoria = $categoria->codigo_categoria;
        $this->estatus_categoria = $categoria->estatus;
        $this->view_categoria = "edit_categoria";
    }

    public function update_categoria($id)
    {
        $rules = [
            'codigo_categoria' => ['required', 'min:4', 'alpha_dash', Rule::unique('categorias', 'codigo_categoria')->ignore($id)],
            'descripcion_categoria' => 'required'
        ];
        $this->validate($rules);

        $categoria = Categoria::find($id);
        $categoria->codigo_categoria = strtoupper($this->codigo_categoria);
        $categoria->descripcion_categoria = strtoupper($this->descripcion_categoria);
        $categoria->estatus = $this->estatus_categoria;
        $categoria->update();
        $this->edit_categoria($categoria->id);
        $this->alert(
            'success',
            'Cambios Guardados'
        );
    }

    public function destroy_categoria($id)
    {
        $this->categoria_id= $id;
        $this->confirm('¿Estas seguro?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  '¡Sí, bórralo!',
            'text' =>  '¡No podrás revertir esto!',
            'cancelButtonText' => 'No',
            'onConfirmed' => 'confirmed_categoria',
        ]);

    }

    public function confirmed_categoria()
    {
        // Example code inside confirmed callback
        $categoria = Categoria::find($this->categoria_id);
        $categoria->delete();
        $this->categoria_id = null;
        $this->limpiar();
        $this->alert(
            'success',
            'Categoria Eliminada'
        );

    }

    public function store_unidad()
    {
        $rules = [
            'codigo_unidad' => ['required', 'min:2', 'alpha_dash', Rule::unique('unidades')],
            'descripcion_unidad' => 'required'
        ];
        $this->validate($rules);
        $unidad = new Unidad();
        $unidad->codigo_unidad = strtoupper($this->codigo_unidad);
        $unidad->descripcion_unidad = strtoupper($this->descripcion_unidad);
        $unidad->save();

        $this->limpiar();

        $this->alert(
            'success',
            'Unidad Creada Exitosamnete'
        );
    }

    public function edit_unidad($id)
    {
        $unidad = Unidad::find($id);
        $this->unidad_id = $unidad->id;
        $this->descripcion_unidad = $unidad->descripcion_unidad;
        $this->codigo_unidad = $unidad->codigo_unidad;
        $this->view_unidad = "edit_unidad";
    }

    public function update_unidad($id)
    {
        $rules = [
            'codigo_unidad' => ['required', 'min:2', 'alpha_dash', Rule::unique('unidades', 'codigo_unidad')->ignore($id)],
            'descripcion_unidad' => 'required'
        ];
        $this->validate($rules);

        $unidad = Unidad::find($id);
        $unidad->codigo_unidad = strtoupper($this->codigo_unidad);
        $unidad->descripcion_unidad = strtoupper($this->descripcion_unidad);
        $unidad->update();
        $this->edit_unidad($unidad->id);
        $this->alert(
            'success',
            'Cambios Guardados'
        );
    }

    public function destroy_unidad($id)
    {
        $this->unidad_id= $id;
        $this->confirm('¿Estas seguro?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  '¡Sí, bórralo!',
            'text' =>  '¡No podrás revertir esto!',
            'cancelButtonText' => 'No',
            'onConfirmed' => 'confirmed_unidad',
        ]);

    }

    public function confirmed_unidad()
    {
        // Example code inside confirmed callback
        $unidad = Unidad::find($this->unidad_id);
        $unidad->delete();
        $this->unidad_id = null;
        $this->limpiar();
        $this->alert(
            'success',
            'Unidad Eliminada'
        );

    }

    public function verificar_categoria()
    {
        $categoria = Categoria::where('codigo_categoria', $this->art_codigo_categoria)->first();
        if ($categoria){
            $this->art_codigo_categoria = strtoupper($categoria->codigo_categoria);
            $this->art_descripcion_categoria = strtoupper($categoria->descripcion_categoria);
            $this->categoria_id = $categoria->id;
        }else{
            $this->art_codigo_categoria = null;
            $this->art_descripcion_categoria = null;
            $this->alert(
                'error',
                'Codigo Categoria Incorrecto');
        }
    }

    public function verificar_unidad()
    {
        $unidad = Unidad::where('codigo_unidad', $this->art_codigo_unidad)->first();
        if ($unidad){
            $this->art_codigo_unidad = strtoupper($unidad->codigo_unidad);
            $this->art_descripcion_unidad = strtoupper($unidad->descripcion_unidad);
            $this->unidad_id = $unidad->id;
        }else{
            $this->art_codigo_unidad = null;
            $this->art_descripcion_unidad = null;
            $this->alert(
                'error',
                'Codigo Unidad Incorrecto');
        }
    }

    public function store_articulo()
    {
        $this->verificar_categoria();
        $this->verificar_unidad();

        $rules = [
            'codigo_articulo' => ['required', 'min:4', 'alpha_dash', Rule::unique('articulos')],
            'descripcion_articulo' => 'required',
            'art_codigo_categoria' => 'required',
            'art_codigo_unidad' => 'required'
        ];
        $messages = [
            'art_codigo_categoria.required' => 'Codigo Categoria Incorrecto',
            'art_codigo_unidad.required' => 'Codigo Unidad Incorrecto'
        ];
        $this->validate($rules, $messages);

        $articulo = new Articulo();
        $articulo->codigo_articulo = strtoupper($this->codigo_articulo);
        $articulo->descripcion_articulo = strtoupper($this->descripcion_articulo);
        $articulo->categorias_id = $this->categoria_id;
        $articulo->unidades_id = $this->unidad_id;
        $articulo->estatus = 1;
        $articulo->save();

        $this->edit_articulo($articulo->id);

        $this->alert(
            'success',
            'Datos Guardados Exitomsamente'
        );
    }

    public function edit_articulo($id)
    {
        $articulo = Articulo::find($id);
        $this->articulo_id =$articulo->id;
        $this->codigo_articulo = $articulo->codigo_articulo;
        $this->descripcion_articulo = $articulo->descripcion_articulo;
        $this->art_codigo_categoria = $articulo->categorias->codigo_categoria;
        $this->art_descripcion_categoria = $articulo->categorias->descripcion_categoria;
        $this->art_codigo_unidad = $articulo->unidades->codigo_unidad;
        $this->art_descripcion_unidad = $articulo->unidades->descripcion_unidad;
        $this->estatus_articulo = $articulo->estatus;
        $this->view_articulo = 'update_articulo';
    }

    public function update_articulo($id)
    {
        $this->verificar_categoria();
        $this->verificar_unidad();

        $rules = [
            'codigo_articulo' => ['required', 'min:4', 'alpha_dash', Rule::unique('articulos', 'codigo_articulo')->ignore($id)],
            'descripcion_articulo' => 'required',
            'art_codigo_categoria' => 'required',
            'art_codigo_unidad' => 'required'
        ];
        $messages = [
            'art_codigo_categoria.required' => 'Codigo Categoria Incorrecto',
            'art_codigo_unidad.required' => 'Codigo Unidad Incorrecto'
        ];
        $this->validate($rules, $messages);

        $articulo = Articulo::find($id);
        $articulo->codigo_articulo = strtoupper($this->codigo_articulo);
        $articulo->descripcion_articulo = strtoupper($this->descripcion_articulo);
        $articulo->categorias_id = $this->categoria_id;
        $articulo->unidades_id = $this->unidad_id;
        $articulo->update();

        $this->edit_articulo($articulo->id);

        $this->alert(
            'success',
            'Datos Guardados Exitosamente'
        );

    }

    public function estatus_articulo($id)
    {
        $articulo = Articulo::find($id);
        if ($articulo->estatus == 1){
            $articulo->estatus = 0;
            $this->estatus_articulo = 0;
            $articulo->update();
            $this->alert(
                'success',
                'Articulo Inactivo'
            );

        }else{
            $articulo->estatus = 1;
            $this->estatus_articulo = 1;
            $articulo->update();
            $this->alert(
                'success',
                'Articulo Activo'
            );
        }

    }

    public function destroy_articulo($id)
    {
        $this->articulo_id= $id;
        $this->confirm('¿Estas seguro?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  '¡Sí, bórralo!',
            'text' =>  '¡No podrás revertir esto!',
            'cancelButtonText' => 'No',
            'onConfirmed' => 'confirmed_articulo',
        ]);

    }

    public function confirmed_articulo()
    {
        // Example code inside confirmed callback
        $articulo = Articulo::find($this->articulo_id);
        $articulo->delete();
        $this->articulo_id = null;
        $this->limpiar();
        $this->alert(
            'success',
            'Articulo Eliminado'
        );

    }

}

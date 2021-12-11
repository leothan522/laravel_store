<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Unidad;
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
        'confirmed_unidad'
    ];

    public $view_categoria = 'create_categoria', $view_unidad = 'create_unidad';
    public $categoria_id, $codigo_categoria, $descripcion_categoria, $estatus_categoria;
    public $unidad_id, $codigo_unidad, $descripcion_unidad;

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

}

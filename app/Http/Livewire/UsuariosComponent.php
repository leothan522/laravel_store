<?php

namespace App\Http\Livewire;

use App\Models\Multi;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class UsuariosComponent extends Component
{
    use WithPagination;
    use LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'confirmed',
    ];

    public $name, $email, $password, $role, $busqueda, $multi = 0, $stores;
    public $user_id, $user_name, $user_email, $user_password, $user_role, $user_estatus, $user_multi, $user_fecha, $user_permisos, $user_path;

    public function mount(Request $request)
    {
        if (!is_null($request->usuario)){
            $this->busqueda = $request->usuario;
        }
    }

    public function render()
    {
        $users = User::buscar($this->busqueda)->orderBy('id', 'DESC')->paginate(30);
        if ($users->isEmpty()){
            verSweetAlert2("Busqueda sin resultados", 'toast', null, 'error');
        }

        $cont = Store::count();
        return view('livewire.usuarios-component')
            ->with('users', $users)
            ->with('cont', $cont);
    }

    public function generarClave()
    {
        $this->password = Str::random(8);
    }

    public function limpiar()
    {
        $this->user_id = null;
        $this->name = null;
        $this->email = null;
        $this->password = null;
        $this->role = null;
        $this->user_id = null;
        $this->user_name = null;
        $this->user_email = null;
        $this->user_password = null;
        $this->user_role = null;
        $this->user_estatus = null;
        $this->user_fecha = null;
        $this->user_permisos = null;
        $this->user_path = null;
    }

    public function store()
    {
        $rules = [
            'name' => 'required|min:4',
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => 'required|min:8',
            'role' => 'required'
        ];

        $this->validate($rules);
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->role = $this->role;
        $user->password = Hash::make($this->password);
        $user->save();
        $this->alert(
            'success',
            'Usuario Creado'
        );
        $this->limpiar();
    }

    public function edit($id)
    {
        $user = User::find($id);
        $this->user_id = $user->id;
        $this->user_name = $user->name;
        $this->user_email = $user->email;
        $this->user_role = $user->role;
        $this->user_estatus = $user->estatus;
        $this->user_multi = $user->multi_stores;
        $this->user_fecha = $user->created_at;
        $this->user_path = $user->profile_photo_path;
    }

    public function update($id)
    {
        $rules = [
            'user_name' => 'required|min:4',
            'user_email' => ['required', 'email', Rule::unique('users', 'email')->ignore($id)],
            'user_role' => 'required'
        ];
        $this->validate($rules);
        $user = User::find($id);
        $user->name = $this->user_name;
        $user->email = $this->user_email;
        $user->role = $this->user_role;
        $user->save();
        $this->alert(
            'success',
            'Usuario Actualizado'
        );

    }

    public function cambiarEstatus($id)
    {
        $user = User::find($id);

        if ($user->estatus){
            $user->estatus = 0;
            $texto = "Usuario Suspendido";
        }else{
            $user->estatus = 1;
            $texto = "Usuario Activado";
        }

        $user->update();
        $this->user_estatus = $user->estatus;
        $this->alert(
            'success',
            $texto
        );
    }

    public function restablecerClave($id)
    {
        if (!$this->user_password){
            $clave = Str::random(8);
        }else{
            $clave = $this->user_password;
        }
        $user = User::find($id);
        $user->password = Hash::make($clave);
        $user->update();
        $this->user_password = $clave;
        $this->alert(
            'success',
            'Contrase??a Restablecida'
        );
    }

    public function edit_permisos($id)
    {
        $user = User::find($id);
        $this->user_id = $user->id;
        $this->user_name = $user->name;
        $this->user_permisos = $user->permisos;

    }

    public function update_permisos($id, $permiso)
    {
        $permisos = [];
        $user = User::find($id);
        if (!leerJson($user->permisos, $permiso)){
            $permisos = json_decode($user->permisos, true);
            $permisos[$permiso] = true;
            $permisos = json_encode($permisos);
            $this->alert(
                'success',
                'Permiso Agregado'
            );
        }else{
            $permisos = json_decode($user->permisos, true);
            unset($permisos[$permiso]);
            $permisos = json_encode($permisos);
            $this->alert(
                'success',
                'Permiso Eliminado'
            );
        }

        $user->permisos = $permisos;
        $user->update();

    }

    public function destroy($id)
    {
        $this->user_id = $id;
        $this->confirm('??Estas seguro?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  '??S??, b??rralo!',
            'text' =>  '??No podr??s revertir esto!',
            'cancelButtonText' => 'No',
            'onConfirmed' => 'confirmed',
        ]);

    }

    public function confirmed()
    {
        // Example code inside confirmed callback
       $user = User::find($this->user_id);
       $user->delete();
       $this->user_id = null;
       $this->alert(
             'success',
             'Usuario Eliminado'
       );

    }

    public function edit_multi($opcion)
    {
        $this->multi = $opcion;
        if ($this->multi){
            $store = Store::orderBy('nombre_tienda')->get();
            $this->stores = $store;
        }
    }

    public function store_multi($id)
    {
        $usuario = User::find($id);
        if ($this->user_multi == 0){
            $this->user_multi = 1;
        }else{
            $this->user_multi = 0;
        }
        $usuario->multi_stores = $this->user_multi;
        $usuario->update();
        $this->alert(
            'success',
            'Datos Guardados'
        );
    }

    public function multi_store($user, $store)
    {
        $existe = user_store($user, $store);
        if ($existe){
            $existe->delete();
        }else{
            $multi = new Multi();
            $multi->users_id = $user;
            $multi->stores_id = $store;
            $multi->save();
        }
        $this->alert(
            'success',
            'Datos Guardados'
        );
    }
}

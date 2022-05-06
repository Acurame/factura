<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empleados as emp;
class Empleados extends Component
{
    public $empleado;
    public $Nombre,$apellidos,$edad,$salario,$idM;
    public $modal = false;
    public function render()
    {
        $this->empleado = emp::all();
        
        return view('livewire.empleados');
    }
    public function crear(){
        $this->limpiarCampos();
        $this->abrirModal();
    }
    public function abrirModal(){
        $this->modal = true;
    }
    public function cerrarModal(){
        $this->modal = false;
    }
    public function limpiarCampos(){
        $this->Nombre = '';
        $this->apellidos = '';
        $this->edad = '';
        $this->salario = '';
    }
    public function editar($id)
    {
        $emplea = emp::findOrFail($id);
        $this->idM = $id;
        $this->Nombre = $emplea->Nombre;
        $this->apellidos = $emplea->apellidos;
        $this->edad = $emplea->edad;
        $this->salario = $emplea->salario;
   
        $this->abrirModal();
    }
    public function borrar($id){
        emp::find($id)->delete();
    }
    public function guardar()
    {
        emp::updateOrCreate(['empleadoId'=>$this->idM],
        [
            'Nombre' => $this->Nombre, 
            'apellidos' => $this->apellidos,
            'edad' => $this->edad,
            'salario' => $this->salario,
        ]);
        $this->cerrarModal();
        $this->limpiarCampos();
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cliente as clien;
class Cliente extends Component
{
    public $clientes;
    public $modal = false;
    public $clienteId,$nombre,$apellidos,$sexo,$nit,$Edad;
    public function render()
    {
        $this->clientes = clien:: all();
        return view('livewire.cliente');
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
        $this->nombre = '';
        $this->apellidos = '';
        $this->sexo = '';
        $this->nit = '';
        $this->Edad = '';
    }
    public function editar($id)
    {
        $cliente = clien::findOrFail($id);
        $this->clienteId = $id;
        $this->nombre = $cliente->nombre;
        $this->apellidos = $cliente->apellidos;
        $this->sexo = $cliente->sexo;
        $this->nit = $cliente->nit;
        $this->Edad = $cliente->Edad;
        $this->abrirModal();
    }
    public function borrar($id){
        clien::find($id)->delete();
    }
    public function guardar()
    {
        clien::updateOrCreate(['clienteId'=>$this->clienteId],
        [
            'nombre' => $this->nombre, 
            'apellidos' => $this->apellidos,
            'sexo' => $this->sexo,
            'nit' => $this->nit,
            'Edad' => $this->Edad,
        ]);
        $this->cerrarModal();
        $this->limpiarCampos();
    }
}

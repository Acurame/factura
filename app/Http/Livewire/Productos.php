<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Productos as pro;
class Productos extends Component
{
    public $producto;
    public $nombreProducto,$precio,$stock,$empleadoId;
    public $modal = false;
    public function render()
    {
        $this->producto = pro::all();
        return view('livewire.productos');
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
        $this->nombreProducto = '';
        $this->precio = '';
        $this->stock = '';
    }
    public function editar($id)
    {
        $product = pro::findOrFail($id);
        $this->empleadoId = $id;
        $this->nombreProducto = $product->nombreProducto;
        $this->precio = $product->precio;
        $this->stock = $product->stock;
   
        $this->abrirModal();
    }
    public function borrar($id){
        pro::find($id)->delete();
    }
    public function guardar()
    {
        pro::updateOrCreate(['productoId'=>$this->empleadoId],
        [
            'nombreProducto' => $this->nombreProducto, 
            'precio' => $this->precio,
            'stock' => $this->stock,
        ]);
        $this->cerrarModal();
        $this->limpiarCampos();
    }
}

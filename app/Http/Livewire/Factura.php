<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cuerpo;
use App\Models\Encabezado;
use App\Models\Cliente;
use App\Models\Empleados;
use App\Models\Productos;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class Factura extends Component
{
    public $modal = false,$modalagregar = false,$modalMostar = false;
    public $clienteDato,$empleadoDato,$poductoDatos,$DatosProducto;
    public $facturaEncabezado;
    public $idEncabezado,$fecha,$clientes,$empleados;
    public $idCuerpo,$cantida,$precio,$numeroFactura,$productoId;
    public function render(Request $request)
    {
        $this->poductoDatos = Productos::all();
        $this->clienteDato = Cliente::all();
        $this->empleadoDato = Empleados::all();
        $this->facturaEncabezado = DB::table('encabezado')
        ->join('cliente','cliente.clienteId','encabezado.clienteId')
        ->join('empleado','empleado.empleadoId','encabezado.empleadoId')
        ->get();

        $consulta = $request->get('Buscar');
        if($consulta){
            $this->DatosProducto = DB::table('cuerpo')
            ->join('productos','productos.productoId','cuerpo.productoId')
            ->where('numeroFactura',$consulta)
            ->get();
        }else{
            $this->DatosProducto = DB::table('cuerpo')
            ->join('productos','productos.productoId','cuerpo.productoId')
            ->get();
        }
        return view('livewire.factura');
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
        $this->fecha = '';
        $this->clientes = '';
        $this->empleados = '';
    }
    public function editar($id)
    {
        $Enc = Encabezado::findOrFail($id);
        $this->idEncabezado = $id;
        $this->fecha = $Enc->fechaFactura;
        $this->clientes = $Enc->clienteId;
        $this->empleados = $Enc->empleadoId;
        $this->abrirModal();
    }
    public function borrar($id){
        Encabezado::find($id)->delete();
    }
    public function guardar()
    {
        Encabezado::updateOrCreate(['numeroFactura'=>$this->idEncabezado],
        [
            'fechaFactura' => $this->fecha, 
            'clienteId' => $this->clientes,
            'empleadoId' => $this->empleados,
        ]);
        $this->cerrarModal();
        $this->limpiarCampos();
    }
    public function agregar()
    {
        Cuerpo::updateOrCreate(['detalleId'=>$this->idCuerpo],
        [
            'cantida' => $this->cantida, 
            'precio' => $this->precio,
            'numeroFactura' => $this->numeroFactura,
            'productoId' => $this->productoId,
        ]);
        $this->limpiarCamposagregar();
        $this->cerrarModalagregar();
    }
    public function crearagregar($id){
        $this->numeroFactura = $id;
        
        $this->abrirModalagregar();
    }
    public function abrirModalagregar(){
        $this->modalagregar = true;
    }
    public function cerrarModalagregar(){
        $this->modalagregar = false;
    }
    public function limpiarCamposagregar(){
        $this->cantida = '';
        $this->precio = '';
        $this->numeroFactura ='';
        $this->productoId = '';
    }
}

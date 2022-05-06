<x-slot name="header">
    <h1 class="text-gray-900">Movimiento de cuentas</h1>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
        
        <button wire:click="crear()" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3" >Nuevo</button>
        @if($modal)
            @include('livewire.crearFactura')   
        @endif    

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2">Numero Factura</th>
                        <th class="px-4 py-2">Fehca de Emicion</th>
                        <th class="px-4 py-2">Cliente</th>
                        <th class="px-4 py-2">Empleado</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                @foreach($facturaEncabezado as $facEnc)
                    <tr>
                        <td class="border px-4 py-2">{{$facEnc->numeroFactura}}</td>
                        <td class="border px-4 py-2">{{$facEnc->fechaFactura}}</td>
                        <td class="border px-4 py-2">{{$facEnc->nombre}}</td>
                        <td class="border px-4 py-2">{{$facEnc->Nombre}}</td>
                        <td class="border px-4 py-2 text-center">
                            <button wire:click="editar({{$facEnc->numeroFactura}})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button>
                            <button wire:click="borrar({{$facEnc->numeroFactura}})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button>
                            <button wire:click="crearagregar({{$facEnc->numeroFactura}})" class="bg-amber-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Agregar Producto</button>
                        </td>
                            @if($modalagregar)
                                @include('livewire.crearCuerpo')   
                            @endif
                            @if($modalMostar)
                                @include('livewire.mostrarFactura')   
                            @endif
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <x-slot name="header">
    <h1 class="text-gray-900">Movimiento de cuentas</h1>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
        <form method="get">
            <input name="Buscar" type="search" class=" min-w-0 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Numero de Factura" aria-label="Numero de Cuenta" aria-describedby="button-addon3">
            <button class="btn px-6 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out" type="submit">Buscar</button>
        </form>
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2">Id Producto</th>
                        <th class="px-4 py-2">Nombre Poducto</th>
                        <th class="px-4 py-2">Precio</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($DatosProducto as $produ)
                    <tr>
                        <td class="border px-4 py-2">{{$produ->productoId}}</td>
                        <td class="border px-4 py-2">{{$produ->nombreProducto}}</td>
                        <td class="border px-4 py-2">{{$produ->precio}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
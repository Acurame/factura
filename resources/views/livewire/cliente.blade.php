<x-slot name="header">
    <h1 class="text-gray-900">Movimiento de cuentas</h1>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
        
        <button wire:click="crear()" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3" >Nuevo</button>
        @if($modal)
            @include('livewire.crearClientes')   
        @endif    

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2">id</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Apellidos</th>
                        <th class="px-4 py-2">Gnero</th>
                        <th class="px-4 py-2">NIT</th>
                        <th class="px-4 py-2">Edad</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                
                @foreach($clientes as $clie)
                <tr>
                    <td class="border px-4 py-2">{{$clie->clienteId}}</td>
                    <td class="border px-4 py-2">{{$clie->nombre}}</td>
                    <td class="border px-4 py-2">{{$clie->apellidos}}</td>
                    <td class="border px-4 py-2">{{$clie->sexo}}</td>
                    <td class="border px-4 py-2">{{$clie->nit}}</td>
                    <td class="border px-4 py-2">{{$clie->Edad}}</td>
                    <td class="border px-4 py-2 text-center flex">
                        <button wire:click="editar({{$clie->clienteId}})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button>
                        <button wire:click="borrar({{$clie->clienteId}})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button>
                    </td>
                @endforeach
                    
                </tr>
                
                </tbody>
            </table>
        </div>
    </div>
</div>
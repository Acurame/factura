<x-slot name="header">
    <h1 class="text-gray-900">Movimiento de cuentas</h1>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
        
        <button wire:click="crear()" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3" >Nuevo</button>
        @if($modal)
            @include('livewire.crearEmpleado')   
        @endif    

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2">id</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">apellidos</th>
                        <th class="px-4 py-2">edad</th>
                        <th class="px-4 py-2">salario</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                
                @foreach($empleado as $emp)
                <tr>
                    <td class="border px-4 py-2">{{$emp->empleadoId}}</td>
                    <td class="border px-4 py-2">{{$emp->Nombre}}</td>
                    <td class="border px-4 py-2">{{$emp->apellidos}}</td>
                    <td class="border px-4 py-2">{{$emp->edad}}</td>
                    <td class="border px-4 py-2">{{$emp->salario}}</td>
                    <td class="border px-4 py-2 text-center flex">
                        <button wire:click="editar({{$emp->empleadoId}})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button>
                        <button wire:click="borrar({{$emp->empleadoId}})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button>
                    </td>
                @endforeach
                    
                </tr>
                
                </tbody>
            </table>
        </div>
    </div>
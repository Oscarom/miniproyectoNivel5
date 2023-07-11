<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Usuarios
        </h2>
    </x-slot>
    {{-- @php
        dd($usuario);
    @endphp --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form class="flex flex-col gap-3" method="POST" action="{{ route('user.update', $usuario->id) }}">
                        @csrf
                        @method('put')

                        <label for="nombre">Nombre</label>
                        <input type="text" value="{{ $usuario->name }}" name="nombre" required>
                        <label for="email">Correo Electronico</label>
                        <input type="email" value="{{ $usuario->email }}" name="email" required>
                        <label for="roles">Rol:</label>
                        <select name="rol" id="roles">
                            @foreach ($roles as $rol)
                             @if ($usuario->hasRole($rol))
                                 <option value="{{ $rol->name }}" selected>{{ $rol->name }}</option>
                             @else 
                                 <option value="{{ $rol->name }}">{{ $rol->name }}</option>
                             @endif
                                
                            @endforeach
                        </select>


                        <button type="submit" class="text-white bg-sky-800 p-1 rounded-md">Actualizar datos</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Crear usuario
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('status'))
                        <span class="bg-green-500 p-1">{{session('status')}}</span>
                    @endif
                    <form class="flex flex-col gap-3" method="POST" action="{{route("user.store")}}">
                        @csrf
                        
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" required>

                        <label for="email">Correo Electronico</label>
                        <input type="email" name="email" required>

                        <label for="pass">Password</label>
                        <input type="password" name="pass" required>
                        
                        <label for="roles">Rol:</label>
                        <select name="rol" id="roles">
                            <option value="null" selected disabled>Escoge un rol</option>
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->name }}">{{ $rol->name }}</option>
                            @endforeach
                        </select>


                        <button type="submit" class="text-white bg-sky-800 p-1 rounded-md">Actualizar datos</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">

    {{--  @if (session('status'))
            <span class="bg-green-400 p-2">{{ session() }}</span>
        @endif --}}
    <input type="text" wire:model="search" placeholder="Search users" class="w-full my-3">
    <table>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Rol
                    </th>
                    <th scope="col" class="px-6 py-3">
                        EDITAR
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Eliminar
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $usuario->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $usuario->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $usuario->email }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($usuario->hasRole('admin'))
                                <span class="bg-yellow-500 text-white rounded-sm p-1">Admin</span>
                            @endif
                            @if ($usuario->hasRole('maestro'))
                                <span class="bg-blue-500 text-white rounded-sm p-1">Maestro</span>
                            @endif
                            @if ($usuario->hasRole('alumno'))
                                <span class="bg-gray-500 text-white rounded-sm p-1">Alumno</span>
                            @endif
                        </td>

                        <td class="px-6 py-4">

                            <a href="{{ route('user.edit', $usuario->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>

                        <td class="px-6 py-4">
                            <form class="flex flex-col gap-3" method="POST"
                                action="{{ route('user.destroy', $usuario->id) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-white bg-red-600 p-1 rounded-md">Eliminar</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @livewireScripts
</div>

</table>

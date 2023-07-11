<div class="relative overflow-x-auto shadow-md sm:rounded-lg">

    {{--  @if (session('status'))
            <span class="bg-green-400 p-2">{{ session() }}</span>
        @endif --}}
    <input type="text" wire:model="search" placeholder="Search maestro" class="w-full my-3">
    <table>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        DNI
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Direccion
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
                @foreach ($maestros as $maestro)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $maestro->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $maestro->dni }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $maestro->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $maestro->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $maestro->direccion }}
                        </td>

                        <td class="px-6 py-4">

                            <a href="{{ route('maestro.edit', $maestro->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>

                        <td class="px-6 py-4">
                            <form class="flex flex-col gap-3" method="POST"
                                action="{{ route('maestro.destroy', $maestro->id) }}">
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


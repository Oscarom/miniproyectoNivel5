<x-app-layout>
    <x-slot name="header">
         <div class="flex justify-between align-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Alumnos
            </h2>
            <a href="{{ route("alumno.create")}}" class="p-2 bg-sky-700 rounded-sm text-white cursor-pointer">Agregar Alumno</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   @livewire('show-alumnos')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


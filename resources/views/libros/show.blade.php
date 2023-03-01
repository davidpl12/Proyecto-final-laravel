<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del coche') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <img class="rounded-t-lg" src="{{asset($url.$mylibros->foto)}}" alt="" />
                        <div class="p-5">

                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Matricula: {{$mylibros->matricula}}</p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Año: {{$mylibros->year}}</p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Color: {{$mylibros->color}}</p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Fecha de la última revisión: {{$mylibros->fecha_ultima_revision}}</p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Precio: {{$mylibros->precio}}</p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

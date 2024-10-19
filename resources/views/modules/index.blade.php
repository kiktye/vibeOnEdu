
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<div class="p-4 w-full mx-auto">


    <div class="max-w-[1240px] mx-auto">


        <div class="relative flex flex-col w-full h-full text-slate-700 bg-white shadow-md rounded-xl bg-clip-border">
            <div class="relative mx-4 mt-4 overflow-hidden text-slate-700 bg-white rounded-none bg-clip-border">
                <div class="flex flex-wrap items-center justify-between">
                    <h3 class="text-lg font-semibold text-slate-800">Модули</h3>


                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                        Додади Модул
                    </button>

                    <!-- Main modal -->
                    <div id="crud-modal" tabindex="-1" aria-hidden="true"
                         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Креирај Модул
                                    </h3>
                                    <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-toggle="crud-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form method="POST" action="{{route('modules.store')}}" class="p-4 md:p-5">
                                    @csrf
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-2">
                                            <label for="name"
                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Име</label>
                                            <input type="text" name="name" id="name"
                                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                   placeholder="" required="">
                                        </div>

                                        <div class="col-span-2">
                                            <label for="description"
                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Опис</label>
                                            <textarea id="description" name="description" rows="4"
                                                      class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                      placeholder=""></textarea>
                                        </div>
                                    </div>
                                    <button type="submit"
                                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        Додади
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full mt-4 text-left table-auto min-w-max">
                    <thead>
                    <tr>
                        <th
                            class="p-4 transition-colors cursor-default border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                            <h1 class="capitalize font-medium text-sm">Име</h1>
                        </th>
                        <th
                            class="p-4 transition-colors cursor-default border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                            <h1 class="capitalize font-medium text-sm">Опис</h1>
                        </th>
                        <th
                            class="p-4 transition-colors cursor-default border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($modules as $module)
                        <tr class="border-b">

                            <td class="p-4 border-b border-slate-200">
                                <p class="text-sm font-semibold text-slate-700">{{ $module->name }}</p>
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <p>{{ $module->description }}</p>
                            </td>

                            <td class="p-4 border-b border-slate-200">
                                <div class="flex items-center space-x-4">
                                    <!-- Modal toggle -->
                                    <button data-modal-target="edit-modal-{{ $module->id }}"
                                            data-modal-toggle="edit-modal-{{ $module->id }}"
                                            class="flex items-center text-slate-900 transition-all hover:bg-slate-900/10 rounded-xl text-xs p-2"
                                            type="button">

                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                             fill="currentColor" class="size-4 mr-1">
                                            <path d=" M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                            <path fill-rule="evenodd"
                                                  d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"
                                                  clip-rule="evenodd" />
                                        </svg>

                                        Edit
                                    </button>

                                    <!-- Main modal -->
                                    <div id="edit-modal-{{ $module->id }}" tabindex="-1" aria-hidden="true"
                                         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div
                                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3
                                                        class="text-lg font-semibold text-gray-900 dark:text-white">
                                                        Измени Модул {{ $module->name }}
                                                    </h3>
                                                    <button type="button"
                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                            data-modal-toggle="edit-modal-{{ $module->id }}">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                             xmlns="http://www.w3.org/2000/svg" fill="none"
                                                             viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                  stroke-linejoin="round" stroke-width="2"
                                                                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <form method="POST"
                                                      action="{{ route('modules.update', $module->id) }}" class="p-4 md:p-5">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="grid gap-4 mb-4 grid-cols-2">

                                                        <div class="col-span-2">
                                                            <label for="name"
                                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Слика</label>

                                                            <input type="file" name="image_path"
                                                                   id="image_path">
                                                        </div>

                                                        <div class="col-span-2">
                                                            <label for="name"
                                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Име</label>
                                                            <input type="text" name="name" id="name"
                                                                   value="{{ $module->name }}"
                                                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                   placeholder="Напиши го името на Модулот"
                                                                   required="">
                                                        </div>

                                                        <div class="col-span-2">
                                                            <label for="description"
                                                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Опис</label>
                                                            <textarea id="description" name="description" rows="4"
                                                                      class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                      placeholder="Напиши опис на беџ">{{ old('description', $module->description) }}</textarea>
                                                        </div>
                                                    </div>
                                                    <button type="submit"
                                                            class="text-white inline-flex items-center bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        Измени
                                                    </button>

                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                    <form class="space-y-0" method="POST"
                                          action="{{ route('modules.destroy', $module->id) }}"
                                          onsubmit="return confirm('Дали си сигурен дека сакаш да го избришеш овoj Модул?');">
                                        @method('DELETE')
                                        @csrf

                                        <button class="text-xs font-semibold border-b-2 border-red-600"
                                                type="submit">Избриши Модул</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>







            <div class="flex flex-col sm:flex-row items-center justify-between p-3">
                <p class="block text-sm text-slate-500">
                </p>
                <div class="flex gap-1 mt-2 sm:mt-0">
                </div>
            </div>
        </div>
    </div>
</div>



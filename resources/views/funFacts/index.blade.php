<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <ul class="space-y-2 font-medium">

                <li>
                    <a href=""
                       class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75a4.5 4.5 0 0 1-4.884 4.484c-1.076-.091-2.264.071-2.95.904l-7.152 8.684a2.548 2.548 0 1 1-3.586-3.586l8.684-7.152c.833-.686.995-1.874.904-2.95a4.5 4.5 0 0 1 6.336-4.486l-3.276 3.276a3.004 3.004 0 0 0 2.25 2.25l3.276-3.276c.256.565.398 1.192.398 1.852Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.867 19.125h.008v.008h-.008v-.008Z" />
                        </svg>



                        <hr class="h-1 bg-white">
                        <span class="flex-1 ms-3 whitespace-nowrap">Админ Панел</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('manage') }}"
                       class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>

                        <hr class="h-1 bg-white">
                        <span class="flex-1 ms-3 whitespace-nowrap">Менаџирај</span>
                    </a>
                </li>

            </ul>

        </div>
    </aside>

    <div class="p-4 w-full mx-auto">
        <div class="max-w-[1240px] mx-auto">
            <div
                class="relative flex flex-col w-full h-full text-slate-700 bg-white shadow-md rounded-xl bg-clip-border">
                <div class="relative mx-4 mt-4 overflow-hidden text-slate-700 bg-white rounded-none bg-clip-border">
                    <div class="flex flex-wrap items-center justify-between">
                        <h3 class="text-lg font-semibold text-slate-800">Fun Facts</h3>

                        <!-- Modal toggle -->
                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                            class="flex select-none items-center gap-2 rounded bg-slate-800 py-2.5 px-4 text-xs font-semibold text-white"
                            type="button">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="size-5">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm.75-11.25a.75.75 0 0 0-1.5 0v2.5h-2.5a.75.75 0 0 0 0 1.5h2.5v2.5a.75.75 0 0 0 1.5 0v-2.5h2.5a.75.75 0 0 0 0-1.5h-2.5v-2.5Z"
                                    clip-rule="evenodd" />
                            </svg>

                            Додади лекција
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
                                            Нова лекција
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-toggle="crud-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form method="POST" action="{{ route('funFacts.store') }}"
                                        enctype="multipart/form-data" class="p-4 md:p-5">
                                        @csrf

                                        <div class="container mx-auto p-4">
                                            <h1 class="text-2xl font-bold mb-4">Create New Fun Fact</h1>

                                            <!-- Display Validation Errors -->
                                            @if ($errors->any())
                                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                                                    role="alert">
                                                    <strong class="font-bold">Whoops!</strong> There were some problems
                                                    with your input.
                                                    <ul class="mt-2 list-disc pl-5">
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <!-- Form to Create a New funFact -->
                                            <form action="{{ route('funFacts.store') }}" method="POST">
                                                @csrf <!-- CSRF Token for security -->

                                                <!-- Course ID (Dropdown) -->


                                                <!-- funFact Name -->
                                                <div class="mb-4">
                                                    <label for="name"
                                                        class="block text-gray-700 text-sm font-bold mb-2">Fun Fact
                                                    </label>
                                                    <input type="text" name="name" id="name"
                                                        class="form-input block w-full mt-1"
                                                        value="{{ old('name') }}" required>
                                                </div>

                                                <!-- Submit Button -->
                                                <div class="flex items-center justify-between">
                                                    <button type="submit"
                                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                        Create Fun Fact
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

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
                                    <h1 class="capitalize font-medium text-sm">Fun Fact</h1>
                                </th>


                                <th
                                    class="p-4 transition-colors cursor-default border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($funFacts as $funFact)
                                <tr class="border-b">


                                    <td class="p-4 border-b border-slate-200">
                                        <p class="text-sm font-semibold text-slate-700">{{ $funFact->name }}</p>
                                    </td>



                                    <td class="p-4 border-b border-slate-200">
                                        <div class="flex items-center space-x-4">

                                            <!-- Modal toggle -->
                                            <button data-modal-target="edit-modal-{{ $funFact->id }}"
                                                data-modal-toggle="edit-modal-{{ $funFact->id }}"
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
                                            <div id="edit-modal-{{ $funFact->id }}" tabindex="-1"
                                                aria-hidden="true"
                                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative p-4 w-full max-w-md max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <!-- Modal header -->
                                                        <div
                                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                            <h3
                                                                class="text-lg font-semibold text-gray-900 dark:text-white">
                                                                Измени Fun Fact {{ $funFact->name }}
                                                            </h3>
                                                            <button type="button"
                                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                data-modal-toggle="edit-modal-{{ $funFact->id }}">
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
                                                        <!-- Form to Edit an Existing funFact -->
                                                        <form class="container mx-auto p-4"
                                                            action="{{ route('funFacts.update', $funFact->id) }}"
                                                            method="POST">
                                                            @csrf <!-- CSRF Token for security -->
                                                            @method('PUT') <!-- Spoofing PUT method for updating -->



                                                            <!-- funFact Name -->
                                                            <div class="mb-4">
                                                                <label for="name"
                                                                    class="block text-gray-700 text-sm font-bold mb-2">Fun
                                                                    Fact
                                                                </label>
                                                                <input type="text" name="name" id="name"
                                                                    class="form-input block w-full mt-1"
                                                                    value="{{ old('name', $funFact->name) }}"
                                                                    required>
                                                            </div>

                                                            <!-- Submit Button -->
                                                            <div class="flex items-center justify-between">
                                                                <button type="submit"
                                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                                    Update Fun Fact
                                                                </button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>

                                            <form class="space-y-0" method="POST"
                                                action="{{ route('funFacts.destroy', $funFact->id) }}"
                                                onsubmit="return confirm('Дали си сигурен дека сакаш да го избришеш овoj Fun Fact?');">
                                                @method('DELETE')
                                                @csrf

                                                <button class="text-xs font-semibold border-b-2 border-red-600"
                                                    type="submit">Избриши Fun Fact</button>
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

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</x-app-layout>

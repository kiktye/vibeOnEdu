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
                        <h3 class="text-lg font-semibold text-slate-800">Questions</h3>

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

                            Add option
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
                                            Create New option
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
                                    <form method="POST"
                                        action="{{ route('options.store', ['question' => $question->id]) }}"
                                        enctype="multipart/form-data" class="p-4 md:p-5">
                                        @csrf

                                        <div class="container mx-auto p-4">
                                            <h1 class="text-2xl font-bold mb-4">Add an Option to
                                                {{ $question->question_text }}</h1>

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

                                            <!-- Hidden Field for question_id -->
                                            <input type="hidden" name="question_id" value="{{ $question->id }}">

                                            <!-- Form to Create a New Option -->
                                            <div class="mb-4">
                                                <label for="option_text"
                                                    class="block text-gray-700 text-sm font-bold mb-2">Option
                                                    Text</label>
                                                <textarea name="option_text" id="option_text" class="form-input block w-full mt-1" required>{{ old('option_text') }}</textarea>
                                            </div>

                                            <!-- Checkbox for is_correct -->
                                            <div class="mb-4">
                                                <label for="is_correct"
                                                    class="block text-gray-700 text-sm font-bold mb-2">
                                                    <input type="checkbox" name="is_correct" id="is_correct"
                                                        value="1" class="mr-2">
                                                    Mark as correct option
                                                </label>
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="flex items-center justify-between">
                                                <button type="submit"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                    Add Option
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <table class="w-full mt-4 text-left table-auto min-w-max">
                    <thead>
                        <tr>
                            <th
                                class="p-4 transition-colors cursor-default border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                <h1 class="capitalize font-medium text-sm">question Title</h1>
                            </th>
                            <th
                                class="p-4 transition-colors cursor-default border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                <h1 class="capitalize font-medium text-sm">Description</h1>
                            </th>
                            <th
                                class="p-4 transition-colors cursor-default border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                <h1 class="capitalize font-medium text-sm">options</h1>
                            </th>
                            <th
                                class="p-4 transition-colors cursor-default border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="p-4 border-b border-slate-200">
                                <p class="text-sm font-semibold text-slate-700">{{ $question->title }}</p>
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <p class="text-sm text-slate-700">{{ $question->description }}</p>
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <ul>
                                    @foreach ($question->options as $option)
                                        <li class="flex justify-between items-center">
                                            <span class="text-sm text-slate-600">{{ $option->option_text }}</span>

                                            <!-- Edit option -->
                                            <button data-modal-target="edit-option-modal-{{ $option->id }}"
                                                data-modal-toggle="edit-option-modal-{{ $option->id }}"
                                                class="text-slate-900 transition-all hover:bg-slate-900/10 rounded-xl text-xs p-2">
                                                Edit
                                            </button>

                                            <!-- Delete option -->
                                            <form
                                                action="{{ route('options.destroy', ['question' => $question->id, 'option' => $option->id]) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this option?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 transition-all hover:bg-red-600/10 rounded-xl text-xs p-2">Delete</button>
                                            </form>

                                        </li>

                                        <!-- Edit option Modal -->
                                        <div id="edit-option-modal-{{ $option->id }}" tabindex="-1"
                                            aria-hidden="true"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <div
                                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                        <h3
                                                            class="text-lg font-semibold text-gray-900 dark:text-white">
                                                            Edit option</h3>
                                                        <button type="button"
                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                            data-modal-toggle="edit-option-modal-{{ $option->id }}">
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
                                                    <form method="POST"
                                                        action="{{ route('options.update', $option->id) }}"
                                                        class="p-4 md:p-5">
                                                        @csrf
                                                        @method('PUT')

                                                        <!-- Hidden Field for question_id -->
                                                        <input type="hidden" name="question_id"
                                                            value="{{ $question->id }}">

                                                        <!-- Option Text -->
                                                        <div class="mb-4">
                                                            <label for="option_text"
                                                                class="block text-gray-700 text-sm font-bold mb-2">
                                                                Option Text
                                                            </label>
                                                            <input type="text" name="option_text" id="option_text"
                                                                class="form-input block w-full mt-1"
                                                                value="{{ $option->option_text }}" required>
                                                        </div>

                                                        <!-- Is Correct Checkbox -->
                                                        <div class="mb-4">
                                                            <label for="is_correct"
                                                                class="block text-gray-700 text-sm font-bold mb-2">
                                                                Is this the correct option?
                                                            </label>
                                                            <input type="checkbox" name="is_correct" id="is_correct"
                                                                class="form-checkbox"
                                                                {{ $option->is_correct ? 'checked' : '' }}>
                                                        </div>

                                                        <!-- Submit Button -->
                                                        <div class="flex items-center justify-between">
                                                            <button type="submit"
                                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                                Update Option
                                                            </button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </ul>
                            </td>

                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</x-app-layout>

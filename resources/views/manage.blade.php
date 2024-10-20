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
                    <a href="{{route('manage')}}"
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

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="grid grid-cols-3 gap-4 mb-4">
                <a href=" {{ route('badges.index') }} " class="text-2xl text-gray-400 dark:text-gray-500">
                    <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                        Badges
                    </div>
                </a>

                <a href=" {{ route('users.index') }} " class="text-2xl text-gray-400 dark:text-gray-500">
                    <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                        Users
                    </div>
                </a>

                <a href=" {{ route('lectures.index') }} " class="text-2xl text-gray-400 dark:text-gray-500">
                    <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                        Lectures
                    </div>
                </a>

                <a href="{{ route('modules.index') }}" class="text-2xl text-gray-400 dark:text-gray-500">
                    <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                        <p>Modules</p>
                    </div>
                </a>


                <a href="{{ route('topics.index') }}" class="text-2xl text-gray-400 dark:text-gray-500">
                    <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                        <p>Topics</p>
                    </div>
                </a>

                <a href="{{ route('courses.index') }}" class="text-2xl text-gray-400 dark:text-gray-500">
                    <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                        <p>Courses</p>
                    </div>
                </a>
                <a href="{{ route('funFacts.index') }}" class="text-2xl text-gray-400 dark:text-gray-500">
                    <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                        <p>Fun Facts</p>
                    </div>
                </a>


                <a href="{{ route('quizzes.index') }}" class="text-2xl text-gray-400 dark:text-gray-500">
                    <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                        <p>Quiz</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

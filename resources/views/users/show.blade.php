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


<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
    type="button"
    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
                <a href="#"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path
                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Главен Панел</span>
                    <span
                        class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Мој Профил</span>
                    <span
                        class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Статистики</span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path
                            d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Штедомер</span>
                </a>
            </li>

            <li>
                <a href="{{ route('manage') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path
                            d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                    </svg>
                    <hr class="h-1 bg-white">
                    <span class="flex-1 ms-3 whitespace-nowrap">Менаџирај</span>
                </a>
            </li>
        </ul>

    </div>
</aside>

<div class="flex flex-col lg:flex-row p-4 space-y-4 lg:space-y-0 lg:space-x-4 items-start w-[87.5%] absolute right-0 ">
    <!-- info -->
    <div class="space-y-4 w-full lg:w-auto">
        {{-- Basic Info Section --}}
        <div class="top-4 rounded bg-white border border-gray-300 shadow-lg">
            <div class="flex flex-col p-6">
                <div class="flex flex-row justify-between space-x-4 items-center">
                    <div class="text-xl">Информации за корисник</div>
                </div>

                <div class="mt-4 self-start items-start">
                    <p class="italic">Локација:</p>
                    <h1 class="font-bold italic text-xl">{{ $user->country }} {{ $user->city }}</h1>
                    <p class="italic">Контакт:</p>
                    <p class="font-medium">{{ $user->email }} | {{ $user->phone }}</p>
                </div>

            </div>
        </div>

        {{-- Blogs Info Section --}}
        <div class="top-4 rounded bg-white border border-gray-300 shadow-lg">
            <div class="flex flex-col p-6 space-y-0.5">
                <div class="flex flex-col justify-between">
                    <div class="text-xl">Информации за блогови</div>
                    <h2>Корисникот има напишано <span class="font-semibold">/</span>
                        блогови
                    </h2>
                </div>

            </div>
        </div>

        {{-- Comments --}}

        {{-- Back to usrs Button --}}
        <div class="top-4 rounded bg-white border border-gray-300 shadow-lg">
            <div class="flex flex-col justify-between p-4 text-center">
                <a href="{{ route('users.index') }}" class="text-sm font-semibold">Назад кон сите корисници</a>
            </div>
        </div>
    </div>

    <!-- Manage User Info Section -->
    <div class="flex-grow w-full lg:w-auto rounded bg-white border border-gray-300 shadow-lg">
        <div class="flex flex-col p-4 lg:p-6">
            <span class="text-lg lg:text-xl">Управувај со податоци на корисник</span>


            {{-- section to manage informations --}}
            <div class="flex flex-col lg:flex-row justify-around items-center my-6 space-y-4 lg:space-y-0">
                <div class="my-2 text-center lg:text-left">
                    <h1 class="font-bold text-lg lg:text-xl"> <span class="text-sm italic">Име |</span>
                        {{ $user->name }}</h1>

                    <h1 class="font-bold text-lg lg:text-xl"> <span class="text-sm italic">Презиме |</span>
                        {{ $user->surname }}</h1>

                    {{-- edit form modal pop up --}}
                    {{-- <x-modal :trigger="$user->id" :button="'Измени'">
                        <x-forms.form method="POST" action="{{ route('users.update.credentials', $user->id) }}">
                            @method('PATCH')

                            <x-forms.input label="Име" name="name" value="{{ old('name', $user->name) }}" />

                            <x-forms.input label="Презиме" name="surname"
                                value="{{ old('surname', $user->surname) }}" />

                            <x-forms.button type="submit">Зачувај промени</x-forms.button>
                        </x-forms.form>
                    </x-modal> --}}
                </div>

                <div class="my-2 text-center lg:text-left">
                    <h1 class="font-bold text-lg lg:text-xl"> <span class="text-sm italic">Email |</span>
                        {{ $user->email }}</h1>

                    <h1 class="font-bold text-lg lg:text-xl"> <span class="text-sm italic">Телефонски број
                            |</span>
                        {{ $user->phone }}</h1>

                    <h1 class="font-bold text-lg lg:text-xl"> <span class="text-sm italic">Title |</span>
                        {{ $user->title }}</h1>

                    {{-- edit form modal pop up --}}
                    {{-- <x-modal :trigger="$user->id" :button="'Измени'">
                        <x-forms.form method="POST" action="{{ route('users.update.info', $user->id) }}">
                            @method('PATCH')

                            <x-forms.input label="Email" name="email" value="{{ old('email', $user->email) }}" />

                            <x-forms.input label="Телефонски број" name="phone"
                                value="{{ old('phone', $user->phone) }}" />

                            <x-forms.input label="Title" name="title" value="{{ old('title', $user->title) }}" />

                            <x-forms.button type="submit">Зачувај промени</x-forms.button>
                        </x-forms.form>
                    </x-modal> --}}
                </div>
            </div>

            <div class="mt-5 border-b border-gray-300"></div>

            <div class="flex flex-col items-center">
                <div class="flex flex-row space-x-2 my-6">
                    <span class="font-bold italic text-sm">Биографија | </span>
                    <p class="max-w-full lg:max-w-[800px] text-center lg:text-left"> {{ $user->bio }}</p>
                </div>

                Несоодветна содржина?

                {{-- <x-modal :trigger="$user->id" :button="'Измени'">
                    <x-forms.form method="POST" action="{{ route('users.update.bio', $user->id) }}">
                        @method('PATCH')

                        <x-forms.textarea label="Биографија" name="bio" value="{{ old('bio', $user->bio) }}" />

                        <x-forms.button type="submit">Зачувај промени</x-forms.button>
                    </x-forms.form>
                </x-modal> --}}
            </div>

            <p class="text-sm font-semibold text-slate-700 flex items-center justify-center lg:justify-start my-10">
                Корисникот е креиран на : {{ $user->created_at->format('M d, Y') }}
            </p>

            <div class="mt-5 border-b border-gray-300"></div>



            {{-- button/form to delete entire user --}}
            <div class="rounded mt-4 bg-white border border-gray-300 shadow-lg p-4 text-center">
                <form class="space-y-0" method="POST" action="{{ route('users.destroy', $user->id) }}"
                    onsubmit="return confirm('Дали си сигурен дека сакаш да го избришеш овој Корисник?');">
                    @method('DELETE')

                    <button class="text-sm font-semibold border-b-2 border-red-600" type="submit">Избриши
                        корисник</button>
                </form>
            </div>

        </div>
    </div>
</div>

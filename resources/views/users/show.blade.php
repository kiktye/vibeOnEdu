{{-- {{ dd($user) }} --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <aside id="default-sidebar"
           class="fixed top-0 left-0 z-40 w-60 h-screen transition-transform -translate-x-full sm:translate-x-0"
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



    <div
        class="flex flex-col lg:flex-row p-4 space-y-4 lg:space-y-0 lg:space-x-4 items-start w-[87.5%] absolute right-0 ">
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
                        <h1 class="font-bold text-xl">{{ $user->userInfo->city->name }}</h1>

                        <p class="italic">Контакт:</p>
                        <p class="font-medium">{{ $user->email }} | {{ $user->userInfo->phone }}</p>
                    </div>

                </div>
            </div>

            {{-- certificate Info Section --}}
            <div class="top-4 rounded bg-white border border-gray-300 shadow-lg">
                <div class="flex flex-col p-6 space-y-0.5">
                    <div class="flex flex-col justify-between">
                        <div class="text-xl">Информации за сертификати</div>
                        <h2>Корисникот има освоено <span class="font-semibold">{{ $user->certificates->count() }}</span>
                            сертификати
                        </h2>

                        <!-- Modal toggle -->
                        <button data-modal-target="certificate-modal" data-modal-toggle="certificate-modal"
                            class="flex items-center text-slate-900 transition-all hover:bg-slate-900/10 rounded-xl text-xs p-2"
                            type="button">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="size-4 mr-1">
                                <path d=" M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                <path fill-rule="evenodd"
                                    d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"
                                    clip-rule="evenodd" />
                            </svg>

                            Види сертификати
                        </button>

                        <div id="certificate-modal" tabindex="-1" aria-hidden="true"
                             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-3xl max-h-[90vh]">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Освоени сертификати
                                        </h3>
                                        <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-toggle="certificate-modal">
                                            <svg class="w-3 h-3" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->

                                    @foreach ($user->certificates as $certificate)
                                        <div class="">
                                            {{ $certificate->course->name }}

                                            <iframe src="{{ Vite::asset('resources/Sertifikati/sertifikat.pdf') }}#zoom=50"
                                                    alt="" class="w-full h-[70vh] border-none"> </iframe>

                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

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

                <div class="mt-4">
                    {{-- section to show photo + delete/edit buttons --}}
                    <div class="flex flex-col items-center">
                        <img src="{{ $user->userInfo->image_path }}" alt="""
                            class="w-[550px] h-[350px] object-contain rounded-xl">
                        <div class="flex space-x-2 items-center">

                            {{-- If photo exists show delete button
                            @if ($user->photo_path)
                                <x-forms.form method="POST" action="{{ route('users.delete.image', $user->id) }}">
                                    @method('DELETE')

                                    <button
                                        class="rounded-md bg-slate-800 py-1.5 px-2 text-2xs font-semibold text-white shadow-md">Избриши
                                        слика
                                    </button>
                                </x-forms.form>
                            @endif --}}

                            {{-- Edit photo pop up with form in it
                            <x-modal :trigger="$user->id" :button="'Промени слика'">
                                <x-forms.form method="POST" action="{{ route('users.update.image', $user->id) }}"
                                    enctype="multipart/form-data">
                                    @method('PATCH')

                                    <x-forms.input label="Слика на корисник" name="photo_path" type="file" />

                                    <x-forms.button type="submit">Зачувај</x-forms.button>
                                </x-forms.form>
                            </x-modal> --}}
                        </div>
                    </div>
                </div>

                {{-- section to manage informations --}}
                <div class="flex flex-col lg:flex-row justify-around items-center my-6 space-y-4 lg:space-y-0">
                    <div class="my-2 text-center lg:text-left">
                        <h1 class="font-bold text-lg lg:text-xl"> <span class="text-sm italic">Име |</span>
                            {{ $user->name }}</h1>

                        <h1 class="font-bold text-lg lg:text-xl"> <span class="text-sm italic">Презиме |</span>
                            {{ $user->surname }}</h1>

                        <h1 class="font-bold text-lg lg:text-xl"> <span class="text-sm italic">Датум на раѓање
                                |</span>
                            @php
                                $date = new DateTime($user->userInfo->birth_date);
                                $user->userInfo->birth_date = $date->format('d.m.Y');
                            @endphp
                            {{ $user->userInfo->birth_date }}</h1>

                        <h1 class="font-bold text-lg lg:text-xl"> <span class="text-sm italic">Пол |</span>
                            @if ($user->userInfo->gender == 'm')
                                Машки
                            @else
                                Женски
                            @endif
                        </h1>
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
                            {{ $user->userInfo->phone }}</h1>

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

                <p
                    class="text-sm font-semibold text-slate-700 flex items-center justify-center lg:justify-start my-10">
                    Корисникот е креиран на : {{ $user->created_at }}
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
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</x-app-layout>

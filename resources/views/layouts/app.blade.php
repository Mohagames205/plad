<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">

        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.datatables.net/v/dt/dt-2.0.5/sb-1.7.1/sp-2.3.1/sl-2.0.1/datatables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased h-full bg-gray-800">


    <div class="grid grid-cols-8 grid-rows-10 h-full bg-gray-800">

        <div class="col-start-1 row-start-1 dark:bg-gray-900 dark:text-white">

            <div class="flex flex-col justify-center h-full text-center border-b border-r border-gray-600">
                <p class="text-4xl font-mono">Plad</p>
            </div>

        </div>

        <div class="col-span-7 col-start-2 row-start-1 dark:bg-gradient-to-bl dark:bg-gray-900 border-b dark:text-white border-gray-600">

            <div class="flex flex-row-reverse w-full h-full p-10">
                <div class="self-center tracking-tight font-bold p-3 bg-gray-900 rounded-lg border border-gray-600">
                    <div class="flex gap-2">
                        <span class="material-symbols-outlined self-center text-base">person</span> {{ auth()->user()->name }}
                    </div>

                </div>
            </div>

        </div>

        <div class="row-span-9 col-span-1 col-start-1 row-start-2 dark:bg-gray-900 border-r border-gray-600 dark:text-white h-full">
            <div class="flex flex-col h-full">


                <a href="{{ route('dashboard') }}">
                    <div class="p-6 text-gray-300 text-base {{ request()->routeIs('dashboard') ? 'text-white font-bold border-r-2 ' : '' }} hover:bg-gray-800 cursor-pointer">
                       <div class="flex gap-6">
                           <span class="material-symbols-outlined self-center text-base">grid_view</span> Dashboard
                       </div>
                    </div>
                </a>
                <a href="{{ route('event.list') }}">
                    <div class="p-6 text-gray-300 text-base {{ request()->routeIs('event.list') ? 'text-white font-bold border-r-2 ' : '' }} hover:bg-gray-800 cursor-pointer">
                            <div class="flex gap-6">
                                <span class="material-symbols-outlined self-center text-base">payments</span> Verkoopacties
                            </div>
                    </div>
                </a>
                <div class="p-6 text-gray-300 text-base {{ request()->routeIs('partners.list') ? 'text-white font-bold border-r-2 ' : '' }} hover:bg-gray-800 cursor-pointer">
                    <div class="flex gap-6">
                        <span class="material-symbols-outlined self-center text-base">groups</span> Verenigingen
                    </div>
                </div>
                <div class="p-6 text-gray-300 text-base {{ request()->routeIs('partners.list') ? 'text-white font-bold border-r-2 ' : '' }} hover:bg-gray-800 cursor-pointer">
                    <div class="flex gap-6">
                        <span class="material-symbols-outlined self-center text-base">equalizer</span> Statistieken
                    </div>
                </div>


            <div class="mt-auto justify-self-end">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                        <div class="mt-auto p-6 text-red-400 text-base justify-self-end cursor-pointer hover:bg-gray-800">
                            <div class="flex gap-6">
                                <span class="material-symbols-outlined self-center text-base">logout</span> Uitloggen
                            </div>
                        </div>
                    </a>
                </form>
            </div>

            </div>
        </div>
        <div class="row-span-9 col-span-7 overflow-y-auto">
            <main>
                {{ $slot }}
            </main>
        </div>



    </div>



    </body>
</html>

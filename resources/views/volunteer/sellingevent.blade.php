<x-volunteer-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aanvullen evenementgegevens') }}
        </h2>
    </x-slot>


    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    <div class="flex mb-4 p-6 bg-red-500 text-white shadow rounded-lg">
                        <h1 class="flex-1 text-2xl font-bold min-w-0">Pleisteractie #{{ $collectionEvent->code }}</h1>
                        <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                        <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                        {{ \App\Enums\Status::from($collectionEvent->status)->readable() }}
                    </span>
                    </div>

                    <hr>
                    <div class="flex gap-10 p-6 my-6">

                        <div id="fill-in" class="basis-2/3 rounded-lg shadow-sm p-8 border border-gray-200 bg-white">
                            <h2 class="text-xl font-bold">Details aanvullen</h2>
                            <div class="mb-3 text-md w-full">
                                Hallo daar! Zou je alsjeblieft zo vriendelijk willen zijn om de onderstaande gegevens zo nauwkeurig mogelijk aan te vullen? Het helpt enorm bij onze administratie!
                            </div>




                            <form method="POST" action="/followup">
                                @csrf

                                <input type="hidden" value="{{ $collectionEvent->code }}" name="code">

                                <div class="mb-4">
                                    <x-input-label for="remaining_bandages" :value="__('Overgebleven pleisters')" />
                                    <x-text-input id="remaining_bandages" class="block mt-1 w-3/4" type="number" name="remaining_bandages" required autofocus />
                                </div>

                                <!-- Geldbedrag na verkoop -->
                                <div class="mb-4">
                                    <x-input-label for="money_after_event" :value="__('Geld na verkoop')" />
                                    <x-text-input id="money_after_event" class="block mt-1 w-3/4" type="text" name="money_after_event" required />
                                </div>

                                <!-- Opmerkingen -->
                                <div class="mb-4">
                                    <x-input-label for="comments" :value="__('Opmerkingen')" />
                                    <textarea id="comments" class="block mt-1 w-3/4 border-gray-300 rounded-md shadow-sm focus:border-indigo-300" name="comments" rows="4"></textarea>
                                </div>

                                <x-primary-button class="mt-4">
                                    {{ __('Opslaan') }}
                                </x-primary-button>

                            </form>

                        </div>



                        <div id="details" class="rounded-lg shadow-sm p-8 border border-gray-200 bg-white max-w-sm">

                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $collectionEvent->location }}</h5>

                            <ol class="items-center sm:flex my-4">
                                <li class="relative mb-6 sm:mb-0">
                                    <div class="flex items-center">
                                        <div class="z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white sm:ring-8shrink-0">
                                            <svg class="w-2.5 h-2.5 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                            </svg>
                                        </div>
                                        <div class="hidden sm:flex w-full bg-gray-200 h-0.5"></div>
                                    </div>
                                    <div class="mt-3 sm:pe-8">
                                        <h3 class="text-lg font-semibold text-gray-900">Begintijd</h3>
                                        <p class="text-base font-normal text-gray-500">{{ $collectionEvent->start_time }}</p>
                                    </div>
                                </li>
                                <li class="relative mb-6 sm:mb-0">
                                    <div class="flex items-center">
                                        <div class="z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white  sm:ring-8 shrink-0">
                                            <svg class="w-2.5 h-2.5 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                            </svg>
                                        </div>
                                        <div class="hidden sm:flex w-full bg-gray-200 h-0.5"></div>
                                    </div>
                                    <div class="mt-3 sm:pe-8">
                                        <h3 class="text-lg font-semibold text-gray-900">Eindtijd</h3>
                                        <p class="text-base font-normal text-gray-500">{{ $collectionEvent->end_time }}</p>
                                    </div>
                                </li>
                            </ol>

                            <div class="mt-8">

                                <div class="px-2 my-3" >
                                    <p class="text-sm text-gray-400">Vrijwilligers</p>
                                    <p class="text-lg">{{ implode(", ", json_decode($collectionEvent->volunteers)) }}</p>
                                </div>

                                <hr>

                                <div class="px-2 my-3">
                                    <p class="text-sm text-gray-400">Ontvangen pleisters</p>
                                    <p class="text-lg">{{$collectionEvent->bandage_count}}</p>
                                </div>

                                <hr>

                                <div class="px-2 my-3">
                                    <p class="text-sm text-gray-400">Ontvangen wisselgeld</p>
                                    <p class="text-lg"> €{{$collectionEvent->change_received}} </p>
                                </div>

                                <hr>

                                <div class="px-2 my-3">
                                    <p class="text-sm text-gray-400">Payconiq codes</p>
                                    <p class="text-lg"> {{ $collectionEvent->payconiq_uid }} </p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

</x-volunteer-layout>

<x-volunteer-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aanvullen evenementgegevens') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="bg-red-500 p-6 text-white mt-5 rounded-lg mb-4">
                        <p class="font-bold">Hulp nodig? Snap je iets niet? Gaat er iets mis met de verkoop?</p>

                        <p> Stuur dan een e-mail naar pr@leuven.rodekruis.be.<p>
                    </div>

                    <h1 class="text-2xl font-bold mb-4">Pleisteractie #{{ $collectionEvent->code }} <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">{{ \App\Enums\Status::from($collectionEvent->status)->readable() }}</span></h1>
                    <hr>
                    <div class="flex gap-30 p-6">

                        <div id="fill-in">
                            <h2 class="text-xl font-bold">Details aanvullen</h2>
                            <div class="mb-3 text-md">
                                Mogen we je vragen om de volgende gegevens zo correct mogelijk aan te vullen. Dit is heel belangrijk voor onze administratie!
                            </div>



                            <form method="POST" action="/followup">
                                @csrf

                                <input type="hidden" value="{{ $collectionEvent->code }}" name="code">

                                <div class="mb-4">
                                    <x-input-label for="remaining_bandages" :value="__('Overgebleven pleisters')" />
                                    <x-text-input id="remaining_bandages" class="block mt-1 w-1/2" type="number" name="remaining_bandages" required autofocus />
                                </div>

                                <!-- Geldbedrag na verkoop -->
                                <div class="mb-4">
                                    <x-input-label for="money_after_event" :value="__('Geld na verkoop')" />
                                    <x-text-input id="money_after_event" class="block mt-1 w-1/2" type="text" name="money_after_event" required />
                                </div>

                                <!-- Opmerkingen -->
                                <div class="mb-4">
                                    <x-input-label for="comments" :value="__('Opmerkingen')" />
                                    <textarea id="comments" class="block mt-1 w-1/2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300" name="comments" rows="4"></textarea>
                                </div>

                                <x-primary-button class="mt-4">
                                    {{ __('Opslaan') }}
                                </x-primary-button>

                            </form>

                        </div>



                        <div id="details">

                            <p class="font-bold text-xl">{{ $collectionEvent->location }}</p>

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

                            <p><span class="font-bold">Vrijwilligers:</span> {{ implode(", ", json_decode($collectionEvent->volunteers)) }}</p>
                            <p><span class="font-bold">Ontvangen pleisters:</span> {{ $collectionEvent->bandage_count }}</p>
                            <p><span class="font-bold">Ontvangen wisselgeld:</span> €{{ $collectionEvent->change_received }}</p>
                            <p><span class="font-bold">Payconiq UID:</span> {{ $collectionEvent->payconiq_uid }}</p>


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

</x-volunteer-layout>

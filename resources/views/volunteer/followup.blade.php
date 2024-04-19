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

                    <div class="bg-blue-500 p-6 text-white mt-5 rounded-lg mb-4">
                        <p class="font-bold">Hulp nodig? Snap je iets niet? Gaat er iets mis met de verkoop?</p>

                        <p> Stuur dan een e-mail naar pr@leuven.rodekruis.be.<p>
                    </div>

                    <h1 class="text-2xl font-bold mb-4">Pleisteractie #{{ $collectionEvent->code }} <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">{{ \App\Enums\Status::from($collectionEvent->status)->readable() }}</span></h1>

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
                            <p class="text-lg"> {{ implode(',', json_decode($event->payconiq_uids, true)) }} </p>
                        </div>
                    </div>
                </div>
            </div>



                </div>
            </div>
        </div>
    </div>

</x-volunteer-layout>

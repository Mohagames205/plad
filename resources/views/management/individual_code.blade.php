<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="rounded-lg shadow-sm p-8 border border-gray-200 bg-white m-6" id="action-buttons">
                        <a href="{{$event->id}}/pdf" target="_blank"> <x-primary-button>Genereer PDF</x-primary-button></a>
                        <a href="{{$event->id}}/contract" target="_blank"> <x-primary-button>Genereer Overeenkomst</x-primary-button></a>
                        <x-primary-button>Aanpassen</x-primary-button>
                        <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'status-change')">Status aanpassen</x-primary-button>
                        @include('management.modals.edit-action-status-form')

                        <form method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <x-danger-button type="submit">Verwijder verkoopactie</x-danger-button>
                        </form>

                    </div>

                    <div class="flex gap-10 p-6 my-6">

                        <div id="fill-in" class="basis-2/3 rounded-lg shadow-sm p-8 border border-gray-200 bg-white">
                            <div class="justify-between flex flex-col h-full">
                            <div>
                            <h2 class="text-2xl tracking-tight text-gray-900 mb-2 font-bold">Ingevulde gegevens</h2>
                            @if($event->comment)



                                        <div class="mb-3 text-md w-full">
                                            Dit zijn de gegevens die de vrijwilligers voor dit evenement hebben ingevuld.
                                        </div>
                                        <div class="px-2 my-3" >
                                            <p class="text-sm text-gray-400">Resterende pleisters</p>
                                            <div class="flex justify-between">
                                                <p class="text-lg">{{ $event->comment->remaining_bandages }} </p>
                                                @if(!$event->productValidation)
                                                    <a href="{{ route('validation.bandages', ['id' => $event->id]) }}" class="bg-green-100 text-right hover:bg-green-200 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded border border-blue-400 inline-flex items-center justify-center">Verifieer</a>
                                                @else
                                                    <a class="text-green-800 hover:underline cursor-pointer" href="{{ route('validation.bandage.see', $event->id) }}">Geverifieerd ✓</a>
                                                @endif

                                            </div>
                                        </div>

                                        <hr>

                                        <div class="px-2 my-3">
                                            <p class="text-sm text-gray-400">Resterend geld</p>
                                            <div class="flex justify-between">
                                                <p class="text-lg">€{{ $event->comment->money_after_event }} </p>
                                                @if(!$event->moneyValidation)
                                                    <a href="{{ route('validation.money', ['id' => $event->id]) }}" class="bg-green-100 text-right hover:bg-green-200 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded border border-blue-400 inline-flex items-center justify-center">Verifieer</a>
                                                @else
                                                    <a class="text-green-800 hover:underline cursor-pointer" href="{{ route('validation.money.see', $event->id) }}">Geverifieerd ✓</a>
                                                @endif
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="px-2 my-3">
                                            <p class="text-sm text-gray-400">Opmerkingen</p>
                                            <p class="text-lg"> {{$event->comment->comments ?? 'Geen opmerking'}} </p>
                                        </div>

                                        <hr>
                                    </div>
                                    <div class="justify-end flex">
                                        <form method="POST" action="{{ route('comment.delete', $event->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button class="mt-5">Verwijder gegevens</x-danger-button>
                                        </form>

                                    </div>


                            @else
                                <div class="mb-3 text-md w-full">
                                    De vrijwilliger heeft nog geen gegevens ingevoerd voor deze inzamelactie
                                </div>
                                <div class="flex justify-center">
                                    <img src="/storage/nothing_yet.png">
                                </div>

                            </div>


                            @endif

                        </div>

                        </div>



                        <div id="details" class="rounded-lg shadow-sm p-8 border border-gray-200 bg-white max-w-sm">

                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $event->location }}</h5>

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
                                        <p class="text-base font-normal text-gray-500">{{ $event->start_time }}</p>
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
                                        <p class="text-base font-normal text-gray-500">{{ $event->end_time }}</p>
                                    </div>
                                </li>
                            </ol>

                            <div class="mt-8">

                                <div class="px-2 my-3" >
                                    <p class="text-sm text-gray-400">Code</p>
                                    <a href="/selling_event?code={{ $event->code }}" class="underline text-blue-600 hover:text-blue-800 visited:text-purple-600"><p class="text-lg">{{ $event->code }}</p></a>
                                </div>
                                <hr>

                                <div class="px-2 my-3" >
                                    <p class="text-sm text-gray-400">Vrijwilligers</p>
                                    <p class="text-lg">{{ implode(", ", json_decode($event->volunteers)) }}</p>
                                </div>

                                <hr>

                                <div class="px-2 my-3">
                                    <p class="text-sm text-gray-400">Ontvangen pleisters</p>
                                    <p class="text-lg">{{$event->bandage_count}}</p>
                                </div>

                                <hr>

                                <div class="px-2 my-3">
                                    <p class="text-sm text-gray-400">Ontvangen wisselgeld</p>
                                    <p class="text-lg"> €{{$event->change_received}} </p>
                                </div>

                                <hr>

                                <div class="px-2 my-3">
                                    <p class="text-sm text-gray-400">Payconiq codes</p>
                                    <p class="text-lg"> {{ implode(',', json_decode($event->payconiq_uids, true)) }} </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="basis-1 p-8">
                        <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Samenvatting</h3>
                        @if($event->comment)
                        <div class="flex gap-10 justify-center">
                            <div id="bandages-sold" class="basis-1/2 rounded-lg mt-8 shadow-sm p-8 border border-gray-200 bg-white max-w-sm">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 text-center">Verkochte pleisters</h5>
                                <p class="text-3xl text-center text-gray-700">{{ $event->bandage_count - $event->comment->remaining_bandages }}</p>
                            </div>

                            <div id="bandages-sold" class="basis-1/2 rounded-lg mt-8 shadow-sm p-8 border border-gray-200 bg-white max-w-sm">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 text-center">Opbrengst</h5>

                                <p class="text-3xl text-center text-gray-700">€{{ $event->comment->money_after_event - $event->change_received }}</p>
                            </div>

                    @endif
                            <div id="bandages-sold" class="basis-1/2 rounded-lg mt-8 shadow-sm p-8 border border-gray-200 bg-white max-w-sm">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 text-center">QR code</h5>
                                <img src="data:image/png;base64,{!! base64_encode(QrCode::format('png')->size(300)->generate('https://localhost:8000/selling_event?code=' . $event->code)) !!}">
                            </div>

                        </div>


                    </div>







                </div>
            </div>
        </div>
    </div>
</x-app-layout>

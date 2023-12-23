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



                    <div class="grid grid-cols-3 gap-10 p-6">

                        <div class="shadow border-sm border-gray-200 col-span-3 rounded-lg p-6">
                            <p class="text-2xl font-semibold tracking-tight">Filter</p>
                        </div>

                        @forelse($events as $event)

                            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm col-span-1">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $event->location }}</h5>
                                </a>

                                <div class="mt-6">

                                    <div class="px-2 my-3" >
                                        <p class="text-sm text-gray-400">Begintijd</p>
                                        <p class="text-lg">{{$event->start_time}}</p>
                                    </div>

                                    <div class="px-2 my-3" >
                                        <p class="text-sm text-gray-400">Eindtijd</p>
                                        <p class="text-lg">{{$event->end_time}}</p>
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
                                        <p class="text-lg"> {{ $event->payconiq_uid }} </p>
                                    </div>
                                </div>


                                <a href="code/{{ $event->id }}" class="mt-4 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    Meer info
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            </div>
                        @empty

                            <p>No bueno!</p>

                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

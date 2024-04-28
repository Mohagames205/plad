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




                    <table id="codes" class="display">
                        <thead>
                        <tr>
                            <th>Locatie</th>
                            <th>Begintijd</th>
                            <th>Eindtijd</th>
                            <th>Vrijwilligers</th>
                            <th>Ontvangen pleisters</th>
                            <th>Ontvangen wisselgeld</th>
                            <th>Payconiq codes</th>
                            <th>Info</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($events as $event)

                            <tr>
                                <td>
                                    <h5 class="text-xl font-bold tracking-tight">{{ $event->location }}</h5>
                                </td>
                                <td>
                                    <p class="text-lg">{{$event->start_time}}</p>
                                </td>
                                <td>
                                    <p class="text-lg">{{$event->end_time}}</p>
                                </td>
                                <td>
                                    <p class="text-lg">{{ implode(", ", json_decode($event->volunteers)) }}</p>
                                </td>
                                <td>
                                    <p class="text-lg">{{$event->bandage_count}}</p>
                                </td>
                                <td>
                                    <p class="text-lg">{{$event->change_received}}</p>
                                </td>
                                <td>
                                    <p class="text-lg"> {{ implode(',', json_decode($event->payconiq_uids, true)) }} </p>
                                </td>
                                <td>
                                    <a href="code/{{ $event->id }}" class="mt-4 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                        Info
                                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                        </svg>
                                    </a>
                                </td>

                            </tr>
                        @empty

                            <p>No bueno!</p>

                        @endforelse
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>


    <script type="module">

        let table = new DataTable('#codes', {
            colReorder: true,
            responsive: true,
            dom: 'Qfrtip',
        });


    </script>

</x-app-layout>

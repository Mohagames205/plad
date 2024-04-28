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
                            <th>Status</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($events as $event)


                            <tr>
                                <td>
                                    <a href="code/{{ $event->id }}" class="underline"><h5 class="text-xl font-bold tracking-tight">{{ $event->location }}</h5></a>
                                </td>
                                <td>
                                    <p class="text-md">{{$event->start_time}}</p>
                                </td>
                                <td>
                                    <p class="text-md">{{$event->end_time}}</p>
                                </td>
                                <td>
                                    <p class="text-md">{{ implode(", ", json_decode($event->volunteers)) }}</p>
                                </td>
                                <td>
                                    <p class="text-md">{{$event->bandage_count}}</p>
                                </td>
                                <td>
                                    <p class="text-md">€{{$event->change_received}}</p>
                                </td>
                                <td>
                                    <p class="text-md"> {{ implode(', ', json_decode($event->payconiq_uids, true)) }} </p>
                                </td>
                                <td>
                                    <p class="text-md {{ $event->status == '1' ? 'text-green-600' : 'text-red-600' }}">
                                        {{ \App\Enums\Status::from($event->status)->readable() }}
                                    </p>
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
            order: [[1, 'desc']]
        });


    </script>

</x-app-layout>

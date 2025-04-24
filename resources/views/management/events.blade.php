<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-100">
                    <div class="bg-gray-900 p-6 border border-gray-600 rounded-lg">
                        <h2 class="font-semibold text-3xl leading-tight text-white">Verkoopacties</h2>
                        <p class="mb-5">Maak snel een verkoopactie aan. Vrijwilligers kunnen dan aan de hand van <b>automatisch gegenereerde</b> code verkoopsgegevens invoeren.</p>
                        <a href="{{ route('management.create_code') }}"><x-primary-button>Actie aanmaken</x-primary-button></a>

                    </div>

                    <div class="bg-gray-900 p-6 border border-gray-600 rounded-lg mt-5">
                        <h2 class="font-semibold text-3xl leading-tight text-white">Overzicht</h2>
                        <table id="codes" class="display">
                            <thead>
                            <tr>
                                <th>Naam</th>
                                <th>Beschrijving</th>

                            </tr>
                            </thead>

                            <tbody>
                            @forelse($events as $event)


                                <tr onclick="window.location='code/{{ $event->id }}';" class="hover:cursor-pointer">
                                    <td>
                                        <a href="code/{{ $event->name }}" class="underline"><h5 class="text-xl font-bold tracking-tight">{{ $event->name }}</h5></a>
                                    </td>
                                    <td>
                                        <p class="text-md">{{$event->description}}</p>
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
    </div>


    <script type="module">

        let table = new DataTable('#codes', {
            responsive: true,
            dom: 'Qfrtip',
            order: [[1, 'desc']]
        });


    </script>

</x-app-layout>

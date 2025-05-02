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
                    <div class="flex gap-6">
                        <div class="shadow-sm p-6 border border-gray-200 rounded-lg basis-1/3">
                            <h3 class="text-2xl tracking-tight text-gray-800 text-center">Totaal verkocht</h3>



                            <p class="text-gray-800 text-lg mt-4 text-center">{{  $sold }}</p>
                        </div>

                        <div class="shadow-sm p-6 border border-gray-200 rounded-lg basis-1/3">
                            <h3 class="text-2xl tracking-tight text-gray-800 text-center">Totale winst</h3>
                            @php
                                $year = 2025;

                                $totalMoneyAfter = \App\Models\EventComment::join('collection_events', 'event_comments.collection_event_id', '=', 'collection_events.id')
                                    ->where('collection_events.year', $year)
                                    ->sum('event_comments.money_after_event');

                                $totalChangeReceived = \App\Models\CollectionEvent::where('year', $year)->sum('change_received');

                                $netAmount = $totalMoneyAfter - $totalChangeReceived;
                            @endphp

                            <p class="text-gray-800 text-lg mt-4 text-center">€{{ $netAmount }}</p>

                        </div>
                        <div class="shadow-sm p-6 border border-gray-200 rounded-lg basis-1/3">
                            <h3 class="text-2xl tracking-tight text-gray-800 text-center">Aantal verkoopsacties</h3>
                            <p class="text-gray-800 text-lg mt-4 text-center">{{ \App\Models\CollectionEvent::where('year', 2025)->count() }}</p>
                        </div>
                    </div>

                    <div style="width: 100%;" class="text-center mt-10"><canvas class="inline" id="acquisitions"></canvas></div>

                </div>
            </div>
        </div>
    </div>

    <script defer>
        setTimeout(() => {
            (async function() {
                const data = <?php echo json_encode($dataArray); ?>;

                new Chart(
                    document.getElementById('acquisitions'),
                    {
                        type: 'line',
                        data: {
                            labels: data.map(row => row.date),
                            datasets: [
                                {
                                    label: 'Verkochte pleisters / dag',
                                    data: data.map(row => row.total_sold_bandages)
                                }
                            ]
                        }
                    }
                );
            })();
        }, 200);
    </script>
</x-app-layout>

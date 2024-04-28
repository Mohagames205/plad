<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden  sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex gap-6">
                        <div class="p-6 border border-gray-600 rounded-lg bg-gray-900 basis-1/3">
                            <h3 class="text-2xl tracking-tight text-white text-center">Totaal verkocht</h3>
                            <p class="text-white text-lg mt-4 text-center">{{  $sold }}</p>
                        </div>

                        <div class="p-6 border border-gray-600 rounded-lg bg-gray-900 basis-1/3">
                            <h3 class="text-2xl tracking-tight text-white text-center">Totale winst</h3>
                            <p class="text-white text-lg mt-4 text-center">€{{ \App\Models\EventComment::sum('money_after_event') - \App\Models\CollectionEvent::sum('change_received') }}</p>
                        </div>
                        <div class="p-6 border border-gray-600 rounded-lg bg-gray-900 basis-1/3">
                            <h3 class="text-2xl tracking-tight text-white text-center">Aantal verkoopsacties</h3>
                            <p class="text-white text-lg mt-4 text-center">{{ \App\Models\CollectionEvent::count() }}</p>
                        </div>
                    </div>

                    <div class="bg-gray-900 p-20 border border-gray-600 rounded-lg mt-10">
                        <div class="flex justify-center">
                            <div style="width: 80%;" class="text-center text-white"><canvas class="inline" id="acquisitions"></canvas></div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <script defer>
        setTimeout(() => {
            (async function() {
                const data = <?php echo json_encode($dataArray); ?>;

                Chart.defaults.color = "#fff";

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

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


                    </div>
                </div>
            </div>
    </div>

</x-volunteer-layout>

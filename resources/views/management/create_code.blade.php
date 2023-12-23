<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 text-gray-900">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST">
                        @csrf


                        <h3 class="font-semibold text-xl">Praktisch</h3>
                        <p class="text-gray-500">Wie, wat, waar en wanneer! Zo simpel is het.</p>

                        <div class="mt-4">
                            <x-input-label for="location">Locatie</x-input-label>
                            <x-text-input type="text" name="location" id="location" class="block w-1/2"/>

                        </div>

                        <div class="mt-4">
                            <x-input-label for="start_time">Starttijd</x-input-label>
                            <x-text-input type="datetime-local" name="start_time" id="start_time" class="block w-1/2"/>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="end_time">Eindtijd</x-input-label>
                            <x-text-input type="datetime-local" name="end_time" id="end_time" class="block w-1/2"/>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="volunteers">Vrijwilligers</x-input-label>
                            <x-text-input type="text" name="volunteers" id="volunteers" class="block w-1/2"/>
                        </div>

                        <hr class="mt-10">

                        <h3 class="font-semibold text-xl mt-7">Materiaal</h3>
                        <p class="text-gray-500">Wat gaat er allemaal mee?</p>

                        <div class="mt-4">
                            <x-input-label for="bandage_count">Aantal pleisters</x-input-label>
                            <x-text-input type="number" name="bandage_count" id="bandage_count" class="block w-1/2"/>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="change_received">Wisselgeld</x-input-label>
                            <x-text-input type="number" name="change_received" id="change_received" class="block w-1/2"/>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="payconiq_uid">Payconiq-nummer</x-input-label>
                            <x-text-input type="number" name="payconiq_uid" id="payconiq_uid" class="block w-1/2"/>
                        </div>

                        <div class="mt-4">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                            <select id="status" name="status" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/4 p-2.5">
                                <option selected>Selecteer een status</option>
                                <option value="0">Concept</option>
                                <option value="1">Actief</option>
                                <option value="2">Afgesloten</option>
                            </select>

                        </div>

                        <hr class="mt-10">

                        <h3 class="font-semibold text-xl mt-7">Ready, set, go!</h3>

                        <x-primary-button class="mt-5" type="submit">Aanmaken</x-primary-button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>

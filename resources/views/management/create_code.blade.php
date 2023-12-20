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

                    <form>

                        <div class="mt-4">
                            <x-input-label for="prefix">Gegenereerde code</x-input-label>
                            <x-text-input type="text" name="prefix" id="prefix" value="{{ mt_rand(0, 99999) }}" read-only disabled/>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="locatie">Locatie</x-input-label>
                            <x-text-input type="text" name="locatie" id="locatie"/>

                        </div>

                        <div class="mt-4">
                            <x-input-label for="tijdstip">Tijdstip</x-input-label>
                            <x-text-input type="datetime-local" name="tijdstip" id="tijdstip"/>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="vrijwilligers">Vrijwilligers</x-input-label>
                            <x-text-input type="text" name="vrijwilligers" id="vrijwilligers"/>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="pleisters">Aantal pleisters</x-input-label>
                            <x-text-input type="number" name="pleisters" id="pleisters"/>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="wisselgeld">Wisselgeld</x-input-label>
                            <x-text-input type="number" name="wisselgeld" id="wisselgeld"/>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="pq_code">Payconiq-nummer</x-input-label>
                            <x-text-input type="number" name="pq_code" id="pq_code"/>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>

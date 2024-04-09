<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }

    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex mb-4 p-6 bg-blue-500 text-white shadow rounded-lg">
                <h1 class="flex-1 text-2xl font-bold min-w-0">Pleisteractie #{{ $event->code }}</h1>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-8 text-gray-900">



                    <h2 class="text-2xl tracking-tight text-gray-900 mb-2 font-bold">Verificatie pleisteraantallen</h2>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route("validation.bandage.create", $event->id) }}">
                        @csrf


                        <h3 class="font-semibold text-xl mt-7">Pleisters</h3>

                        <table class="mt-4">
                            <tr>
                                <th>Attribuut</th>
                                <th>Waarde</th>
                            </tr>
                            <tr>
                                <td>Overgehouden pleisters</td>
                                <td>{{ $event->comment->remaining_bandages }}</td>
                            </tr>
                            <tr>
                                <td>Aantal verkochte pleisters</td>
                                <td>{{ ($event->bandage_count - $event->comment->remaining_bandages) }}</td>
                            </tr>

                        </table>
                        <i class="text-sm text-red-600">Waardes gerapporteerd door vrijwilligers</i>

                        <div class="mt-4">
                            <x-input-label for="remaining_bandages">Resterende pleisters</x-input-label>
                            <x-text-input type="number" name="remaining_bandages" id="remaining_bandages" class="block w-1/2" value="0"/>
                        </div>



                        <hr class="mt-10">

                        <x-primary-button class="mt-5" type="submit">Valideren</x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

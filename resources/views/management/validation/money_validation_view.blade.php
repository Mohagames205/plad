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
                <h1 class="flex-1 text-2xl font-bold min-w-0">Pleisteractie #{{ $validation->event->code }}</h1>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900">
                    <h2 class="text-2xl tracking-tight text-gray-900 mb-2 font-bold">Verificatie geld</h2>


                        <h3 class="font-semibold text-xl mt-7">Aangegeven door vrijwilliger</h3>

                        <table class="mt-4 rounded-xl">
                            <tr>
                                <th>Attribuut</th>
                                <th>Waarde</th>
                            </tr>
                            <tr class="bg-blue-100">
                                <td>Totaal ontvangen</td>
                                <td>{{ $validation->event->bandage_count}}</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center bg-blue-500 text-white font-bold">Aangegeven door vrijwilliger</td>
                            </tr>
                            <tr class="bg-blue-100">
                                <td>Geld na verkoop</td>
                                <td>€{{ $validation->event->comment->money_after_event }}</td>
                            </tr>
                            <tr class="bg-blue-100">
                                <td>Wisselgeld</td>
                                <td>€{{ ($validation->event->change_received) }}</td>
                            </tr>

                            <tr>
                                <td colspan="2" class="text-center bg-blue-500 text-white font-bold">Gevalideerde gegevens</td>
                            </tr>
                            <tr class="bg-blue-100">
                                <td>Cash</td>
                                <td>€{{ $validation->cash_money }}</td>
                            </tr>
                            <tr class="bg-blue-100">
                                <td>Payconiq</td>
                                <td>€{{ $validation->payconiq_money }}</td>
                            </tr>
                            <tr class="bg-blue-100">
                                <td>SumUp</td>
                                <td>€{{ $validation->sumup_money }}</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center bg-blue-500 text-white font-bold">Totaal gevalideerd</td>
                            </tr>
                            <tr class="bg-blue-300">
                                <td>Cash</td>
                                <td>€{{ $validation->cash_money }}</td>
                            </tr>
                            <tr class="bg-blue-300">
                                <td>Digitaal</td>
                                <td>€{{ $validation->payconiq_money +  $validation->sumup_money}}</td>
                            </tr>
                            <tr class="bg-blue-500 text-white">
                                <td>Totaal (Digitaal + cash)</td>
                                <td>€{{ $validation->payconiq_money +  $validation->sumup_money + $validation->cash_money}}</td>
                            </tr>


                        </table>

                        <x-primary-button class="mt-5" type="submit">Aanpassen</x-primary-button>
                        <form method="POST" class="inline" action="{{ route('validation.money.delete', $validation->event->id) }}">
                            @method('DELETE')
                            @csrf
                            <x-danger-button class="mt-5" type="submit">Verwijderen</x-danger-button>
                        </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

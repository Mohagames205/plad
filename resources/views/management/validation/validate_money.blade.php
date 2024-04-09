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



                    <h2 class="text-2xl tracking-tight text-gray-900 mb-2 font-bold">Verificatie geldhoeveelheden</h2>
                    <p>In de tabellen staan de bedragen berekend op basis van de waardes ingevuld door de vrijwilliger.</p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route("validation.money.create", $event->id) }}">
                        @csrf


                        <h3 class="font-semibold text-xl mt-7">Contant geld</h3>

                        <table class="mt-4">
                            <tr>
                                <th>Attribuut</th>
                                <th>Waarde</th>
                            </tr>
                            <tr>
                                <td>Ontvangen wisselgeld</td>
                                <td>€{{ $event->change_received }}</td>
                            </tr>
                            <tr>
                                <td>Geld na verkoop</td>
                                <td>€{{ $event->comment->money_after_event }}</td>
                            </tr>
                            <tr>
                                <td><i>Winst</i></td>
                                <td><i>€{{ $event->comment->money_after_event - $event->change_received }}</i></td>
                            </tr>

                        </table>


                        <div class="mt-4">
                            <x-input-label for="cash_money">Hoeveelheid contant geld</x-input-label>
                            <x-text-input type="number" name="cash_money" id="cash_money" class="block w-1/2" value="0"/>
                        </div>


                        <h3 class="font-semibold text-xl mt-7">Digitaal</h3>

                        <table class="mt-4">
                            <tr>
                                <th>Attribuut</th>
                                <th>Waarde</th>
                            </tr>
                            <tr>
                                <td>Payconiq nummers</td>
                                <td>{{ $event->payconiq_uid }}</td>
                            </tr>

                            <tr>
                                <td>Vrijwilligers</td>
                                <td>{{ implode(', ', json_decode($event->volunteers)) }}</td>
                            </tr>
                            <tr>
                                <td>Offset²</td>
                                <td><strong>€{{ ($event->comment->money_after_event - $event->change_received) - (($event->bandage_count - $event->comment->remaining_bandages) * 10) }}</strong></td>
                            </tr>
                        </table>

                        <div class="mt-4">
                            <x-input-label for="payconiq_money">Hoeveelheid via Payconiq</x-input-label>
                            <x-text-input type="number" name="payconiq_money" id="payconiq_money" value="0" class="block w-1/2"/>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="sumup_money">Hoeveelheid via SumUp</x-input-label>
                            <x-text-input type="number" name="sumup_money" id="sumup_money" class="block w-1/2" value="0"/>
                        </div>

                        <hr class="w-1/3 mt-6">

                        <div class="mt-6">
                            <b>Totaal </b>€ <span id="som_digitaal" class="p-2 bg-gray-200 font-mono">0</span>
                        </div>




                        <hr class="mt-10">



                        <h3 class="font-semibold text-xl mt-7">Totaal</h3>
                        <table class="mt-4">
                            <tr>
                                <th>Attribuut</th>
                                <th>Waarde</th>
                            </tr>
                            <tr>
                                <td>Aantal verkochte pleisters</td>
                                <td>{{ ($event->bandage_count - $event->comment->remaining_bandages) }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td> <i> x € 10 </i></td>
                            </tr>
                            <tr>
                                <td>Verwachte winst¹</td>
                                <td>€{{ ($event->bandage_count - $event->comment->remaining_bandages) * 10 }}</td>
                            </tr>

                        </table>
                        <div class="mt-2">
                            <b>Contant + digitaal = </b>€ <span id="som_totaal" class="p-2 bg-gray-200 font-mono">0</span>
                        </div>

                        <x-primary-button class="mt-5" type="submit">Valideren</x-primary-button>
                    </form>



                    <script>

                         let loadValues = function (){
                            let cash = parseFloat(document.querySelector('#cash_money').value)
                            let payconiq = parseFloat(document.querySelector('#payconiq_money').value)
                            let sumup = parseFloat(document.querySelector('#sumup_money').value)

                            document.querySelector('#som_totaal').innerText = cash + payconiq + sumup
                            document.querySelector('#som_digitaal').innerText = payconiq + sumup
                        }

                        loadValues()

                        document.addEventListener('input', loadValues)

                    </script>





                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pleisteractie 2024</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #ffffff;
        }
        .content {
            width: 90%;
            max-width: 800px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #2c3e50;
            font-size: 32px;
            margin-top: 10px;
            text-align: left;
        }
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
        .optional-info {
            margin-top: 20px;
        }
        .optional-info .info-item {
            font-style: italic;
            color: #777;
        }
        .profit-summary {
            background-color: #dff0d8;
            border: 1px solid #c3e6cb;
            padding: 20px;
            border-radius: 8px;
        }

        .expected-profits {
            margin-top: 20px;
            background-color: #f0d8d8;
            border: 1px solid #e6c3c3;
            padding: 20px;
            border-radius: 8px;
        }

        .expected-profits strong {
            color: darkred;
        }

        .profit-summary strong {
            color: #155724;
        }

        .warning {
            background-color: #eed3a5;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid orange;
            margin-top: 50px;
        }

        .footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #ccc;
            font-size: 14px;
            color: #555;
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>
<div class="content">
    <div class="header">
        <img src="./storage/logo.jpg" alt="Bedrijfslogo" style="max-width: 30%; height: auto;">
        <h1>Pleisteractie 2024</h1>
    </div>
    <table>
        <tr>
            <th>Attribuut</th>
            <th>Waarde</th>
        </tr>
        <tr>
            <td>Locatie</td>
            <td>{{ $location }}</td>
        </tr>
        <tr>
            <td>Code</td>
            <td>{{ $code }}</td>
        </tr>
        <tr>
            <td>Aantal pleisters</td>
            <td>{{ $bandage_count }}</td>
        </tr>
        <tr>
            <td>Vrijwilligers</td>
            <td>{{ implode(', ', json_decode($volunteers)) }}</td>
        </tr>
        <tr>
            <td>Starttijd</td>
            <td>{{ $start_time }}</td>
        </tr>
        <tr>
            <td>Eindtijd</td>
            <td>{{ $end_time }}</td>
        </tr>
        <tr>
            <td>Payconiq-codes</td>
            <td>{{ implode(',', json_decode($event->payconiq_uids, true)) }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>{{ \App\Enums\Status::from($status)->readable() }}</td>
        </tr>
    </table>

    @if(isset($money_after_event))
        <div class="optional-info">
            <h3>Optionele Informatie</h3>
            <table>
                <tr>
                    <th>Attribuut</th>
                    <th>Waarde</th>
                </tr>
                <tr>
                    <td>Geld na verkoop</td>
                    <td>€{{ $money_after_event }}</td>
                </tr>
                <tr>
                    <td>Overgebleven pleisters</td>
                    <td>{{ $remaining_bandages }}</td>
                </tr>
                <tr>
                    <td>Opmerkingen</td>
                    <td>{{ $comments }}</td>
                </tr>
            </table>
        </div>


    <div class="profit-summary page-break">
        <h3>Samenvatting</h3>
        <table>
            <tr>
                <th>Attribuut</th>
                <th>Waarde</th>
            </tr>
            <tr>
                <td>Winst gemaakt</td>
                <td>€{{ $money_after_event - $change_received }}</td>
            </tr>
            <tr>
                <td>Pleisters verkocht</td>
                <td>{{ $bandage_count - $remaining_bandages }}</td>
            </tr>
        </table>
    </div>

    <div class="expected-profits">
        <h3>Verwachte waardes</h3>
        <table>
            <tr>
                <th>Attribuut</th>
                <th>Waarde</th>
            </tr>
            <tr>
                <td>Verwachte winst¹</td>
                <td>€{{ ($bandage_count - $remaining_bandages) * 10 }}</td>
            </tr>
            <tr>
                <td>Offset²</td>
                <td><strong>€{{ ($money_after_event - $change_received) - (($bandage_count - $remaining_bandages) * 10) }}</strong></td>
            </tr>
        </table>

        <p>¹ Let erop dat deze waardes geen rekening houden met de originele aankoopprijs van de pleisters.</p>
        <p>² De offset is het verschil tussen de <i>gemaakte winst</i> en de <i>verwachte winst</i>. Dit is dus de hoeveelheid geld die <i>theoretisch gezien</i> ontbreekt.</p>
    </div>

    @else

        <div class="warning">
            <h3>Opgepast!</h3>
            <p> Sommige waardes en berekeningen ontbreken, omdat de vrijwilliger nog geen informatie heeft aangevuld voor deze verkoopactie. </p>
        </div>

    @endif

    <div class="footer">
        <p>Automatisch gegenereerd door PLAD (<b>PL</b>eisteractie <b>AD</b>ministratie) op: {{ date('Y-m-d H:i:s') }}</p>
    </div>
</div>
</body>
</html>

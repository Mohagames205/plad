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
    <img src="./storage/logo.jpg" alt="Bedrijfslogo" style="max-width: 20%; height: auto;">
    <div class="header">

        <h1>Overeenkomst pleisteractie</h1>
    </div>

    <p>Ik, .....………………………………..., bevestig de volgende gegevens:</p>

    <table>
        <tr>
            <td>Locatie</td>
            <td>{{ $location }}</td>
        </tr>
        <tr>
            <td>Tijd</td>
            <td>{{ $start_time }} tot {{ $end_time }}</td>
        </tr>
        <tr>
            <td>Aantal ontvangen pleisters</td>
            <td>{{ $bandage_count }} pleisters</td>
        </tr>
        <tr>
            <td>Verkoopprijs</td>
            <td>€10 / pleister</td>
        </tr>
        <tr>
            <td>Ontvangen wisselgeld</td>
            <td>€{{ $change_received }}</td>
        </tr>
        <tr>
            <td>Vrijwilligers</td>
            <td>{{ implode(', ', json_decode($volunteers)) }}</td>
        </tr>
    </table>

    <div>
        <p>
            Na het beëindigen van de verkoop retourneer ik:    </p>
        <ul>
            <li> de niet-verkochte pleisters;</li>
            <li> het verschuldigde bedrag; </li>
            <li>het ontvangen materiaal;</li>
        </ul>

        <p>aan het <b>Rode Kruis - Leuven.</b></p>

        <p>De verkoop kan enkel doorgaan op plaatsen waarvoor een toelating is bekomen via
            de gemeente, AWV en VLAIO.
        </p>
        <p>
            <i>Indien u een vereniging vertegenwoordigt:</i> Na het beëindigen van de verkoop moet de opbrengst volledig gestort worden op de
            rekening van het <b>Rode Kruis - Leuven.</b> De afdeling zal dan het bedrag ten voordele
            van de vereniging storten.
        </p>

    </div>

    <div class="page-break">

        <p>Mochten er zich problemen voordoen of als u vragen heeft aarzel dan niet om contact op te nemen met:</p>
        <table>
            <tr>
                <th>Naam</th>
                <th>Telefoonnummer</th>
            </tr>
            <tr>
                <td>Mohamed El Yousfi</td>
                <td>+32 484 34 18 57</td>
            </tr>
            <tr>
                <td>Cindy Rossi</td>
                <td>+32 498 62 16 96</td>
            </tr>
            <tr>
                <td>Brent Dedroog</td>
                <td>+32 474 72 64 76</td>
            </tr>
            <tr>
                <td>Timothy Boeykens</td>
                <td>+32 484 12 77 60</td>
            </tr>
            <tr>
                <td>Mieke Decuypere</td>
                <td>+32 484 80 15 09</td>
            </tr>
            <tr>
                <td>Julie Degreef</td>
                <td>+32 468 57 76 35</td>
            </tr>
        </table>

        <p>Hartelijk bedankt voor uw steun en nog veel succes!</p>
        <hr>

        <p><b>Digitaal ondertekend op: </b></p>


        <table>
            <tr>
                <td>Handtekening verantwoordelijke</td>
                <td>Handtekening verkoper</td>
            </tr>
            <tr>
                <td style="padding: 80px"></td>
                <td></td>
            </tr>
        </table>


    </div>





    <div class="footer">
        <p>Automatisch gegenereerd door PLAD (<b>PL</b>eisteractie <b>AD</b>ministratie) op: {{ date('Y-m-d H:i:s') }}</p>
    </div>
</div>
</body>
</html>

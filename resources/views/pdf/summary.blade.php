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
        .profit-summary strong {
            color: #155724;
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
        <img src="https://www.rodekruis.be/img/logo.svg?1670492344" alt="Bedrijfslogo" style="max-width: 100%; height: auto;">
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
            <td>Aantal Verbanden</td>
            <td>{{ $bandage_count }}</td>
        </tr>
        <tr>
            <td>Vrijwilligers</td>
            <td>{{ implode(', ', json_decode($volunteers)) }}</td>
        </tr>
        <tr>
            <td>Start Tijd</td>
            <td>{{ $start_time }}</td>
        </tr>
        <tr>
            <td>Eind Tijd</td>
            <td>{{ $end_time }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>{{ $status }}</td>
        </tr>
    </table>

    @if(isset($comments))
        <div class="optional-info">
            <h3>Optionele Informatie</h3>
            <table>
                <tr>
                    <th>Attribuut</th>
                    <th>Waarde</th>
                </tr>
                <tr>
                    <td>Geld Na Evenement</td>
                    <td>€{{ $money_after_event }}</td>
                </tr>
                <tr>
                    <td>Resterende Verbanden</td>
                    <td>{{ $remaining_bandages }}</td>
                </tr>
                <tr>
                    <td>Opmerkingen</td>
                    <td>{{ $comments }}</td>
                </tr>
            </table>
        </div>
    @endif

    <div class="profit-summary page-break">
        <h3>Samenvatting</h3>
        <table>
            <tr>
                <th>Attribuut</th>
                <th>Waarde</th>
            </tr>
            <tr>
                <td>Winst Gemaakt</td>
                <td>€{{ $money_after_event - $change_received }}</td>
            </tr>
            <tr>
                <td>Verbanden Verkocht</td>
                <td>{{ $bandage_count - $remaining_bandages }}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <p>Gegenereerd op: {{ date('Y-m-d H:i:s') }}</p>
    </div>
</div>
</body>
</html>

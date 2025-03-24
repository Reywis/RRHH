<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo de Pago</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; margin: 20px; }
        .container { width: 100%; }
        .header, .footer { text-align: center; }
        .table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .table th, .table td { border: 1px solid black; padding: 6px; text-align: left; }
        .right { text-align: right; }
        .bold { font-weight: bold; }
        .title { font-size: 18px; font-weight: bold; }
        .subtitle { font-size: 14px; font-weight: bold; }
        .logo { text-align: center; margin-bottom: 10px; }
        .signature { text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h3>INSTITUTO NACIONAL DE FORMACION PROFESIONAL</h3>
            <p><strong>SISTEMA DE PLANILLAS</strong></p>
            <p>Fecha: {{ $fecha }}</p>
        </div>

        <table class="table">
            <tr>
                <td><strong>Mes:</strong> {{ $mes }}</td>
                <td><strong>Código:</strong> {{ $codigo }}</td>
                <td><strong>Actividad:</strong> {{ $actividad }}</td>
                <td><strong>Nombre:</strong> {{ $nombre }}</td>
            </tr>
        </table>

        <table class="table">
            <tr>
                <th>Ingresos</th>
                <th class="right">Valor</th>
                <th>Deducciones</th>
                <th class="right">Valor</th>
            </tr>
            <tr>
                <td>Suelo</td>
                <td class="right">Q{{ number_format($sueldobruto, 2) }}</td>
                <td>
                    @foreach($deducciones as $deduccion)
                        {{ $deduccion['concepto'] }} <br>
                    @endforeach
                </td>
                <td class="right">
                    @foreach($deducciones as $deduccion)
                        Q{{ number_format($deduccion['monto'], 2) }} <br>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td class="bold">TOTAL</td>
                <td class="right bold">Q{{ number_format($sueldobruto, 2) }}</td>
                <td class="bold">TOTAL</td>
                <td class="right bold">Q{{ number_format($total_deducciones, 2) }}</td>
            </tr>
        </table>

        <p class="right bold">A Pagar: Q{{ number_format($total_neto, 2) }}</p>

        <div class="signature">
            <p>__________________________</p>
            <p>Firma del Empleado</p>
        </div>

        <div class="footer">
            <p>**** Pagos y Ajustes Sujetos a Revisión ****</p>
        </div>
    </div>
</body>
</html>

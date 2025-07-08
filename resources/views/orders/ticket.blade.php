<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Orden de Compra #{{ $order->payment_id }}</title>
    <style>
        body {
            font-family: "Helvetica", sans-serif;
            font-size: 14px;
            margin: 0;
            padding: 0;
            background-color: #f6f8fa;
            color: #333;
        }

        .container {
            width: 95%;
            max-width: 900px;
            margin: 20px auto;
            background-color: #fff;
            padding: 25px;
            border-radius: 12px;
            border: 1px solid #ccc;
        }

        .header {
            text-align: center;
            background-color: #1e3a8a;
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header small {
            display: block;
            font-size: 13px;
            margin-top: 5px;
        }

        .section {
            margin-bottom: 25px;
        }

        .section-title {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 10px;
            color: #1e40af;
            border-bottom: 1px solid #1e40af;
            padding-bottom: 5px;
        }

        .info-table td {
            padding: 4px 0;
        }

        .products-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .products-table th {
            background-color: #e2e8f0;
            text-align: left;
            padding: 8px;
            font-size: 13px;
        }

        .products-table td {
            padding: 8px;
            vertical-align: top;
            border-top: 1px solid #ccc;
        }

        .products-table img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
        }

        .totals {
            width: 100%;
            max-width: 300px;
            float: right;
            margin-top: 20px;
        }

        .totals td {
            padding: 6px;
        }

        .totals .label {
            text-align: left;
        }

        .totals .value {
            text-align: right;
        }

        .totals .total {
            font-weight: bold;
            border-top: 2px solid #1e3a8a;
        }

        .footer {
            margin-top: 40px;
            font-size: 12px;
            color: #666;
            text-align: right;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Orden de Compra</h1>
            <small>ID de Orden: #{{ $order->payment_id }}</small>
        </div>

        <div class="section">
            <div class="section-title">Información de Entrega</div>
            <table class="info-table">
                <tr><td><strong>Recibido por:</strong></td><td>{{ $order->address['receiver_name'] }}</td></tr>
                <tr><td><strong>Dirección:</strong></td><td>{{ $order->address['name'] }}</td></tr>
                <tr><td><strong>Colonia:</strong></td><td>{{ $order->address['community'] }}</td></tr>
                <tr><td><strong>Ciudad:</strong></td><td>{{ $order->address['city'] }}, {{ $order->address['state'] }}</td></tr>
                <tr><td><strong>C.P.:</strong></td><td>{{ $order->address['postal_code'] }}</td></tr>
                <tr><td><strong>País:</strong></td><td>{{ $order->address['country'] }}</td></tr>
                <tr><td><strong>Referencia:</strong></td><td>{{ $order->address['reference'] }}</td></tr>
            </table>
        </div>

        <div class="section">
            <div class="section-title">Datos del Cliente</div>
            <table class="info-table">
                <tr><td><strong>Nombre:</strong></td><td>{{ $receiver->name }} {{ $receiver->last_name }}</td></tr>
                <tr><td><strong>Email:</strong></td><td>{{ $receiver->email }}</td></tr>
                <tr><td><strong>Teléfono:</strong></td><td>{{ $receiver->phone }}</td></tr>
            </table>
        </div>

        <div class="section">
            <div class="section-title">Productos</div>
            <table class="products-table">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $subtotal = 0;
                        $totalTax = 100;
                    @endphp
                    @foreach ($order->content as $item)
                        @php
                            $subtotal += $item['subtotal'];
                        @endphp
                        <tr>
                            <td>
                                @if(isset($item['options']['image']) && $item['options']['image'])
                                    <img src="{{ public_path('storage/' . $item['options']['image']) }}" alt="Producto">
                                @else
                                    Sin imagen
                                @endif
                            </td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['qty'] }}</td>
                            <td>${{ number_format($item['price'], 2) }} MXN</td>
                            <td>${{ number_format($item['subtotal'], 2) }} MXN</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <table class="totals">
            <tr>
                <td class="label">Subtotal:</td>
                <td class="value">${{ number_format($subtotal, 2) }} MXN</td>
            </tr>
            <tr>
                <td class="label">Envío:</td>
                <td class="value">${{ number_format($totalTax, 2) }} MXN</td>
            </tr>
            <tr class="total">
                <td class="label">Total:</td>
                <td class="value">${{ number_format($subtotal + $totalTax, 2) }} MXN</td>
            </tr>
        </table>

        <div class="section" style="clear: both;">
            <div class="section-title">Método de Pago</div>
            <p>
                @switch($order->payment_method)
                    @case(0)
                        Efectivo
                        @break
                    @case(1)
                        Tarjeta de Crédito
                        @break
                    @case(2)
                        Transferencia
                        @break
                    @default
                        No especificado
                @endswitch
            </p>
        </div>

        <div class="footer">
            Creado: {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i:s') }} <br>
            Última actualización: {{ \Carbon\Carbon::parse($order->updated_at)->format('d/m/Y H:i:s') }}
        </div>
    </div>
</body>
</html>

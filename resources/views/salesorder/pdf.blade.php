<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        .kop-surat {
            border-bottom: 2px solid #000;
            padding: 10px 0;
            margin-bottom: 20px;
        }

        .kop-surat table {
            width: 100%;
            border: none; /* Hilangkan border tabel kop surat */
            border-collapse: collapse; /* Pastikan tidak ada garis antar sel */
        }

        .kop-surat td {
            vertical-align: middle;
            border: none; /* Hilangkan border setiap sel */
            padding: 5px; /* Pastikan tata letak tetap rapi */
        }

        .logo-container {
            width: 100px;
            text-align: left;
        }

        .logo-container img {
            max-width: 100%;
            height: auto;
        }

        .outlet-header {
            text-align: left;
            padding-left: 20px;
        }

        .outlet-header h1 {
            font-size: 18px;
            margin: 0;
            font-weight: bold;
        }

        .outlet-header p {
            margin: 3px 0;
            font-size: 12px;
        }

        .details {
            text-align: right;
            padding-right: 20px;
        }

        .details p {
            margin: 3px 0;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 6px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }

        .text-right {
            text-align: right;
        }

        .font-bold {
            font-weight: bold;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <!-- Kop Surat -->
    <div class="kop-surat">
        <table border="0">
            <tr>
                <td class="logo-container">
                    <img src="{{ public_path('upload/outlets/' . $salesOrder->outlet->logo) }}" alt="{{ $salesOrder->outlet->name }}">
                </td>
                <td class="outlet-header">
                    <h1>{{ $salesOrder->outlet->name }}</h1>
                    <p>{{ $salesOrder->outlet->address }}</p>
                    <p>Telepon: +62 851-9898-9744 | Email: info@gubugbuah.com</p>
                </td>
                <td class="details">
                    <p><strong>Tanggal:</strong> {{ $salesOrder->created_at->format('d M Y') }}</p>
                    <p><strong>No Invoice:</strong> INV-{{ $salesOrder->id }}</p>
                    <p><strong>Kepada Yth:</strong> {{ $salesOrder->customer->name }}</p>
                    <p><strong>Alamat:</strong> {{ $salesOrder->customer->address }}</p>
                </td>
            </tr>
        </table>
    </div>

    <!-- Judul Invoice -->
    <div class="invoice-title">Sales Order</div>

    <!-- Tabel Produk -->
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>QTY</th>
                <th>Unit</th>
                <th>Unit Price</th>

                <th class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salesOrder->products as $product)
            <tr>
                <td>
                    {{ $product->product->name }}
                    @if ($product->variant)
                    <div style="font-size: 10px; color: #666;">Variant: {{ $product->variant->name }}</div>
                    @endif
                    @if ($product->batch)
                    <div style="font-size: 10px; color: #666;">Batch: {{ $product->batch->batch_no }}</div>
                    @endif
                </td>
                <td>{{ $product->qty }}</td>
                <td>{{ $product->product->unit->name }}</td>
                <td>{{ currency($product->unit_price) }}</td>

                <td class="text-right">
                    {{ currency($product->total_price) }}
                </td>
            </tr>
            @endforeach
            <tr class="font-bold">
                <td colspan="4" class="text-right">Grand Total</td>
                <td class="text-right">{{ currency($salesOrder->grandtotal) }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Footer -->
    <div class="footer">
        <p><em>Terima kasih atas kepercayaan Anda.</em></p>
        <p>Untuk pembayaran via transfer: BCA - 8832 901 902 a.n {{$salesOrder->outlet->name}}</p>
    </div>
</body>
</html>

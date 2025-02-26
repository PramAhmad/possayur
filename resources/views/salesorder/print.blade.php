<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 18px;
            margin: 0.5cm;
            padding: 0;
        }

        p {
            padding: 0;
            margin:0
        }

        table.table-product {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table-product th, .table-product td {
            padding: 6px;
            text-align: left;
            border: 1px solid #000;
        }

        .text-center {
            text-align: center !important;
        }

        .text-right {
            text-align: right !important;
        }
    </style>
    {{-- <style>
        body {
            font-family: Arial, sans-serif;
            /* font-size: 12px; */
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

        table.table-product {
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
    </style> --}}
</head>
<body>
    <!-- Kop Surat -->
    <div class="kop-surat">
        <table border="0" style="width: 100%">
            <tr>
                <td class="outlet-header" width="50%">
                    <p><strong style="font-size: 22px">Koyasai</strong></p>
                    <p style="font-size: 18px">{{ $salesOrder->outlet->name }}</p>
                    <p>{{ $salesOrder->outlet->address }}</p>
                    <p>Telepon: +62 851-9898-9744 | Email: info@gubugbuah.com</p>
                    <br>
                    <p>Kepada Yth: {{ $salesOrder->customer->name }}</p>
                    <p>Alamat: {{ $salesOrder->customer->address }}</p>
                </td>
                <td style="text-align: right" valign="top">
                    <p><strong style="font-size: 22px">SALES ORDER</strong></p>
                    <p>Tanggal: {{ $salesOrder->created_at->format('d M Y') }}</p>
                    <p>No Invoice: INV-{{ $salesOrder->id }}</p>
                    {{-- <p><strong>Kepada Yth:</strong> {{ $salesOrder->customer->name }}</p>
                    <p><strong>Alamat:</strong> {{ $salesOrder->customer->address }}</p> --}}
                </td>
            </tr>
        </table>
    </div>

    <br>
    <table style="width: 100%" class="table-product">
        <thead>
            <tr>
                <th class="text-center">NO</th>
                <th class="text-center">PRODUCT</th>
                <th class="text-center">QTY</th>
                <th class="text-center">UNIT</th>
                <th class="text-center">UNIT PRICE</th>
                <th class="text-center">TOTAL</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salesOrder?->products as $product)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>
                        {{ $product?->product?->name }}
                        @if ($product->variant)
                        <div style="font-size: 10px; color: #666;">Variant: {{ $product?->variant?->name }}</div>
                        @endif
                        @if ($product->batch)
                        <div style="font-size: 10px; color: #666;">Batch: {{ $product?->batch?->batch_no }}</div>
                        @endif
                    </td>
                    <td class="text-center">{{ $product?->qty }}</td>
                    <td>{{ $product?->product?->unit?->name }}</td>
                    <td>
                        <span style="float: left">Rp.</span>
                        <span style="float: right">{{ number_format($product?->unit_price, 0, ',', '.') }}</span>
                    </td>
                    <td class="text-right">
                        <span style="float: left">Rp.</span>
                        <span style="float: right">{{ number_format($product?->total_price, 0, ',', '.') }}</span>
                    </td>
                </tr>
            @endforeach
            <tr class="font-bold">
                <td colspan="5" class="text-right"><strong>Grand Total</strong></td>
                <td>
                    <strong>
                        <span style="float: left">Rp.</span>
                        <span style="float: right">{{ number_format($salesOrder->grandtotal, 0, ',', '.') }}</span>
                    </strong>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>

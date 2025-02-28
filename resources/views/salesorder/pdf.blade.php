<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>PRINT ORDER</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        /* CSS yang sudah kita buat sebelumnya */
        @page {
            margin: 0;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .sheet {
            margin: 0;
            overflow: hidden;
            position: relative;
            box-sizing: border-box;
            page-break-after: always;
            padding: 10mm;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
        }

        table,
        td,
        th {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: center;
        }

        td {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-bold {
            font-weight: bold;
        }

        .logo {
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            height: 80px;
            width: 150px;
        }
    </style>
</head>

<body>
    <section class="sheet">
        <table>
            <thead>
                <tr>
                    <td colspan="2" rowspan="3" class="logo" style='background-image: url("logo.png") ;>'"></td> 
                    <td colspan="3"></td>
                    <td colspan="2" class="text-right">Bandung, {{ date('d M Y') }}</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td colspan="2" class="text-right">Kepada Yth.</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td colspan="2" class="text-right">{{ $salesOrder->customer->name }}</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="7"></td>
                </tr>
                <tr>
                    <td colspan="2">No. Faktur: INV-{{ $salesOrder->id }}</td>
                    <td colspan="5"></td>
                </tr>
                <tr class="text-bold text-center">
                    <th>No</th>
                    <th colspan="2">Nama Barang</th>
                    <th>QTY</th>
                    <th>UNIT</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>
                @php
                    $no = 1;
                    $grandTotal = 0;
                @endphp
                @foreach ($salesOrder->products as $product)
                    @php
                        $productName = $product->product->name;
                        if ($product->variant) {
                            $productName .= ' (Var: ' . $product->variant->name . ')';
                        }
                        if ($product->batch) {
                            $productName .= ' (Batch: ' . $product->batch->batch_no . ')';
                        }
                        $grandTotal += $product->total_price;
                    @endphp
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td colspan="2">{{ $productName }}</td>
                        <td class="text-right">{{ $product->qty }}</td>
                        <td>{{ $product->product->unit->name }}</td>
                        <td class="text-right">Rp {{ number_format($product->unit_price, 0, ',', '.') }}</td>
                        <td class="text-right">Rp {{ number_format($product->total_price, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr class="text-bold">
                    <td colspan="5" class="text-right">GRAND TOTAL</td>
                    <td colspan="2" class="text-right">Rp {{ number_format($grandTotal, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td colspan="7"></td>
                </tr>
                <tr>
                    <td colspan="7">
                        <table>
                            <colgroup>
                                <col style="width: 150px;">
                                <col style="width: 35px;">
                                <col style="width: 400px;">
                                <col style="width: 35px;">
                                <col style="width: 150px;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>Hormat Kami</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Penerima</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="border-bottom: 1px solid black;"></td>
                                    <td></td>
                                    <td style="border: 1px solid black;">
                                        <span class="text-bold">Perhatian!!!</span><br />
                                        <span>
                                            1. Barang diterima dengan baik dan sesuai dengan pembelian.<br />
                                            2. Kehilangan/kerusakan di luar toko, bukan tanggung jawab kami.<br />
                                            3. Barang yang sudah dibeli tidak boleh dikembalikan.
                                        </span>
                                    </td>
                                    <td></td>
                                    <td style="border-bottom: 1px solid black;"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</body>

</html>
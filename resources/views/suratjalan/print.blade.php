@extends('print-document.layout')

@section('title', 'Surat Jalan PO ' . $suratJalan?->salesorder?->reference_no)

@section('content')
    <table style="width: 100%" class="table-product">
        <thead>
            <tr>
                <th style="width:1%">No</th>
                <th>Nama Item</th>
                <th style="width:15%">Unit</th>
                <th class="text-right" style="width:10%">Qty</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratJalan?->productSuratJalans as $product)
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
                    <td>{{ $product?->product?->unit?->code }}</td>
                    <td class="text-right">{{ $product?->qty }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table style="width: 100%; margin-top: 30px">
        <tr>
            <td style="width: 5%"></td>
            <td style="width: 35%" class="text-center">Penerima</td>
            <td style="width: 20%" class="text-center"></td>
            <td style="width: 35%" class="text-center">Hormat Kami,</td>
            <td style="width: 5%"></td>
        </tr>
        <tr>
            <td></td>
            <td class="text-center">Tanda tangan/cap</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td style="padding:50px"></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td class="text-center" style="border-top:solid 1px #000;padding-top:5px">
            </td>
            <td></td>
            <td class="text-center" style="border-top:solid 1px #000;padding-top:5px">
            </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td style="padding:50px"></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td class="text-center" style="border-top:solid 1px #000;padding-top:5px">
                <strong>DRIVER</strong>
            </td>
            <td></td>
            <td class="text-center" style="border-top:solid 1px #000;padding-top:5px">
                <strong>PACKER</strong>
            </td>
            <td></td>
        </tr>
    </table>
@endsection

@section('right_header')
    <p><strong style="font-size: 16px">SURAT JALAN</strong></p>
    <p><strong>{{ $suratJalan->reference_no }}</strong></p>
    <p>Tanggal: {{ $suratJalan->created_at->format('d M Y') }}</p>
    <p>No. PO: {{ $suratJalan?->salesorder?->reference_no }}</p>
@endsection
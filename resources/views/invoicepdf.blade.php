<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice {{ $invoice_no ?? 'PDL' }}</title>
    <style>
        /* Pengaturan Kertas PDF */
        @page {
            margin: 1.2cm;
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #334155;
            font-size: 12px;
            line-height: 1.4;
        }

        /* Helper Utilities untuk Layout Lama */
        .clear {
            clear: both;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .font-bold {
            font-weight: bold;
        }

        /* Header Style (Menggunakan Float) */
        .header-left {
            float: left;
            width: 50%;
        }

        .header-right {
            float: right;
            width: 50%;
            text-align: right;
            margin-top: 5%
        }

        .brand-title {
            font-size: 24px;
            color: #00246B;
            /* Warna Navy PDL Anda */
            margin: 0;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .brand-subtitle {
            font-size: 10px;
            color: #64748b;
            margin: 2px 0 0 0;
        }

        .doc-title {
            font-size: 20px;
            color: #334155;
            margin: 0;
            text-transform: uppercase;
        }

        /* Divider Garis Tipis */
        .divider {
            border-top: 2px solid #e2e8f0;
            margin: 15px 0;
        }

        /* Info Ringkas Meta Data */
        .meta-table {
            width: 100%;
            margin-bottom: 30px;
        }

        .meta-table td {
            vertical-align: top;
            width: 50%;
        }

        .meta-label {
            font-size: 10px;
            text-transform: uppercase;
            color: #64748b;
            font-weight: bold;
            margin-bottom: 3px;
        }

        /* Tabel Data Utama (Gaya Clean & Soft) */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .data-table th {
            background-color: #f8fafc;
            /* Warna soft gray */
            color: #475569;
            text-transform: uppercase;
            font-size: 10px;
            font-weight: bold;
            padding: 10px 12px;
            border-bottom: 10px solid #e2e8f0;
            text-align: left;
        }

        .data-table td {
            padding: 12px;
            border-bottom: 1px solid #f1f5f9;
            color: #334155;
            font-size: 11px;
        }

        /* Zebra striping lembut */
        .data-table tr:nth-child(even) td {
            background-color: #fafafa;
        }

        /* Badge bergaya untuk No Container */
        .badge-container {
            background-color: #f1f5f9;
            color: #1e293b;
            padding: 4px 8px;
            border-radius: 4px;
            font-family: 'Courier New', Courier, monospace;
            font-size: 11px;
            border: 1px solid #e2e8f0;
        }

        /* Footer / Tanda Tangan */
        .footer-section {
            margin-top: 50px;
            width: 100%;
        }

        .signature-box {
            float: right;
            width: 200px;
            text-align: center;
        }

        .signature-space {
            height: 70px;
        }
    </style>
</head>

<body>

    <!-- HEADER LOGO & JUDUL -->
    <div class="header-container">
        <div class="header-left">
            <img src="{{ $logoBase64 }}" alt="" style="width: 200px">
        </div>
        <div class="header-right">
            <h2 class="doc-title">INVOICE</h2>
            <p style="margin: 5px 0 0 0; color: #64748b;">No: <span class="font-bold"
                    style="color: #00246B;">{{ $data->invoice_no ?? 'INV-2026-001' }}</span></p>
        </div>
        <div class="clear"></div>
    </div>

    <div class="divider"></div>

    <!-- METADATA TANGGAL & SHIPPER -->
    <table class="meta-table">
        <tr>
            <td>
                <div class="meta-label">Invoice To :</div>
                <div class="font-bold" style="font-size: 13px; color: #1e293b;">
                    {{ $data->perusahaan->nama_perusahaan ?? 'PT. Maju Bersama' }}</div>
                <div style="color: #64748b; margin-top: 2px;">{{ $data->perusahaan->alamat_perusahaan }}</div>
            </td>
            <td class="text-right">
                <div class="meta-label">Tanggal Invoice:</div>
                <div class="font-bold" style="font-size: 13px; color: #1e293b;">{{ $invoice_date ?? '17 Mei 2026' }}
                </div>
            </td>
        </tr>
    </table>

    <!-- TABEL UTAMA DATA BARANG -->
    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 35%;">Description</th>
                <th style="width: 20%;">Quantity</th>
                <th style="width: 20%;">RATE</th>
                <th style="width: 25%;">AMOUNT</th>
            </tr>
        </thead>
        <tbody>
            {{-- Jika menggunakan loop Laravel, aktifkan baris ini: --}}
            {{-- @foreach ($items as $item) --}}
            <tr>
                <td class="font-bold" style="color: #00246B;">{{ $data->description ?? 'Suku Cadang Mesin' }}</td>
                <td>{{ $data->quantity }}</td>
                <td>150,0000.00</td>
                <td>150,0000.00</td>

            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>

    <!-- KETERANGAN TAMBAHAN / TANDA TANGAN -->
    <table class="footer-section">
        <tr>
            <td style="width: 60%; vertical-align: bottom; color: #94a3b8; font-size: 10px;">
                * Dokumen ini sah dan diterbitkan secara komputerisasi oleh sistem PDL Invoice.
            </td>
            <td style="width: 40%;">
                <div class="signature-box">
                    <div style="color: #64748b; font-size: 11px; margin-bottom: 10px;">Hormat Kami,</div>
                    <div class="signature-space"></div>
                    <div class="divider" style="margin: 5px 0; border-top: 1px solid #334155;"></div>
                    <div class="font-bold" style="color: #00246B;">Admin Logistik</div>
                    <div style="color: #64748b; font-size: 10px;">PDL Invoice System</div>
                </div>
            </td>
        </tr>
    </table>

</body>

</html>

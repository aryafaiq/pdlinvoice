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
            font-size: 30px;
            color: #334155;
            margin: 0;
            text-transform: uppercase;
        }

        /* Divider Garis Tipis */
        .divider {
            border-top: 2px solid #e2e8f0;
            margin: 15px 0;
        }

        .enti {
            width: 100%;
        }

        .enti::after {
            content: "";
            display: table;
            clear: both;
        }

        .ship {
            float: left;
            width: 50%;
            /* Atur lebar sesuai kebutuhan */
        }

        /* Sisi Kanan */
        .ship2 {
            float: right;
            width: 50%;
            /* Atur lebar sesuai kebutuhan */
            text-align: right;
            /* Opsional: membuat teks di dalam ship2 rata kanan */
        }

        /* Info Ringkas Meta Data */
        .meta-table {
            width: 100%;
        }

        .meta-table td {
            vertical-align: top;
        }

        .meta-label {
            font-size: 12px;
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
            text-align: left;
        }

        .data-table td {
            padding: 12px;
            
            color: #334155;
            font-size: 11px;
        }

        /* Zebra striping lembut */
        .data-table tr:nth-child(even) td {
            background-color: #fafafa;
        }

        .total-row td {
            font-weight: bold;

            padding-top: 100px;
            padding-bottom: 15px;
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

        .copyright-footer {
            position: fixed;
            bottom: -0.5cm;
            /* Menempel erat di batas margin bawah kertas */
            left: 0;
            right: 0;
            text-align: center;
            font-size: 8px;
            color: #94a3b8;
            /* Warna abu-abu halus */
            border-top: 1px solid #e2e8f0;
            padding-top: 8px;
        }

        .fbold {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <!-- HEADER LOGO & JUDUL -->
    <div class="header-container">
        <div class="header-left">
            <img src="{{ $logoBase64 }}" alt="" style="width: 200px">
            <h4>PT PORTIBION DJEWELINDO LOGISTIK</h4>
            <p style="color: #94a3b8; font-size: 9px">JL EDAM II NO.15C RT.002 RW.016, TANJUNG PRIOK, TANJUNG PRIOK, KOTA
                ADMINISTRASI
                JAKARTA UTARA, DAERAH KHUSUS IBUKOTA JAKARTA</p>
        </div>
        <div class="header-right">
            <h1 class="doc-title">INVOICE</h1>
        </div>
        <div class="clear"></div>
    </div>

    <div class="divider"></div>

    <!-- METADATA TANGGAL & SHIPPER -->
    <div class="enti">
        <div class="ship">
            <table class="meta-table">
                <tr>
                    <td>
                        <div class="meta-label">Invoice To</div>
                    </td>
                    <td style="">
                        :
                    </td>
                    <td style="width: 70%">
                        <span class="font-bold" style="font-size: 13px; color: #1e293b;">
                            {{ $data->perusahaan->nama_perusahaan }}</span>

                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="meta-label">Address</div>
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <span style="color: #1e293b; margin-top: 2px;">
                            {{ $data->perusahaan->alamat_perusahaan }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="margin-top: 2px;" class="meta-label">PIC</div>

                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <span style="color: #1e293b; margin-top: 2px;"> {{ $data->perusahaan->pic }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="margin-top: 2px;" class="meta-label">NO Tlp</div>

                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <span style="color: #1e293b; margin-top: 2px;"> {{ $data->perusahaan->no_tlp ?? '-' }}</span>
                    </td>
                </tr>
            </table>
        </div>

        <div class="ship2">
            <p style="margin: 5px 0 0 0; color: #64748b;">Invoice No: <span class="font-bold"
                    style="color: #00246B;">{{ $data->invoice_no ?? 'INV-2026-001' }}</span></p>
            <div class="">Date: <span class="font-bold" style="font-size: 13px; color: #1e293b;">
                    {{ date('d-m-Y', strtotime($data->invoice_date)) }}
                </span></div>
        </div>
    </div>


    <!-- TABEL UTAMA DATA BARANG -->
    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 35%;">Description</th>
                <th style="width: 20%;">Quantity</th>
                <th style="width: 20%;">RATE</th>
                <th style="width: 25%;">TOTAL</th>
            </tr>
        </thead>
        <tbody>
            {{-- Jika menggunakan loop Laravel, aktifkan baris ini: --}}
            {{-- @foreach ($items as $item) --}}
            <tr>
                <td class="font-bold" style="color: #00246B;">{{ $data->description ?? 'Suku Cadang Mesin' }}</td>
                <td>{{ $data->quantity . ' ' . 'DOC' }}</td>
                <td>{{ number_format($rate, 2, ',', '.') }}</td>
                <td>{{ number_format($data->amount, 2, ',', '.') }}</td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
        <div>
            <p style="color: #94a3b8">*Note/Aju PIB</p>
            <p>{!! nl2br($data->note) !!}</p>
        </div>
        <tfoot>
            <tr class="total-row">
                <td colspan=""></td>
                <td colspan=""></td>
                <td class=" grand-total-cell">GRAND TOTAL:</td>
                <td class="grand-total-cell">{{ 'Rp.' . ' ' . number_format($data->amount, 2, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
    <div class="divider" style="margin: 5px 0; border-top: 1px solid #334155;"></div>
    <div class="" style="">
        <p>Please Transfer the payment as stated above (Full Amount) To: <br>
            Bank Name : Bank BCA <br>
            A/N : DJENGISKAN JULIANTO <br>
            A/C : 6320289741 </p>
    </div>


    <!-- KETERANGAN TAMBAHAN / TANDA TANGAN -->
    <table class="footer-section header-right">
        <tr>
            <td style="width: 40%;">
                <div class="signature-box">
                    <div style="color: #64748b; font-size: 11px; margin-bottom: 10px;">Approve By:</div>
                    <div class="signature-space"><img src="{{ $signBase64 }}" alt="" style="width: 120px">
                    </div>
                    <div class="divider" style="margin: 5px 0; border-top: 1px solid #334155;"></div>
                    <div class="font-bold" style="color: #00246B;">Darius</div>
                </div>
            </td>
        </tr>
    </table>

    <div class="copyright-footer">
        <div class="">
            <p class="fbold">PT PORTIBION DJEWELINDO LOGISTIK</p>
            <p>JL EDAM II NO.15C RT.002 RW.016, TANJUNG PRIOK, TANJUNG PRIOK, KOTA ADMINISTRASI
                JAKARTA UTARA, DAERAH KHUSUS IBUKOTA JAKARTA</p>
        </div>
    </div>

</body>

</html>

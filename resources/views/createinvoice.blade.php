@extends('layout.sidebar')
@section('custom-css')
    <style>
        .btn-submit {
            transition: all 0.2s ease-in-out;
            color: #ffffff;
            text-decoration: none;
            background-color: #00246B;

        }

        .btn-submit:hover {
            background-color: #0055ff;
            color: #ffffff;
        }

        .btn-submit i {
            color: #354762;
            transition: color 0.2s ease;
        }

        .table-custom {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        /* Memastikan teks di header vertikalnya di tengah (center) */
        .table-custom thead th {
            vertical-align: middle;
            text-align: center;
            background-color: #00246B;

        }

        /* Mengatur keselarasan teks untuk baris data */
        .table-custom tbody td {
            vertical-align: middle;
        }
    </style>
@endsection

@php
    if ($lastinvoice) {
        $nomor_urut = (int) explode('/', $lastinvoice)[0] + 1;
    } else {
        $nomor_urut = 1;
    }
    $invoice = $nomor_urut . '/PDL/INV/V/2026';
@endphp
@section('content')
    <div class="container">
        <a href="{{ route('invoice.index') }}" class="btn btn-secondary mb-2"><i data-lucide="arrow-big-left-dash"></i>Back
        </a>
        <div class="row">
            <div class="col-md-8 col-lg-12">

                <!-- CARD FORM CONTAINER -->
                <form action="{{ route('invoice.store') }}" method="POST">
                    @csrf
                    <div class="card p-4 bg-white">
                        <!-- Form Header -->
                        <div class="mb-4">
                            <h2 class="fs-4 fw-bold text-dark m-0">SHIPPING DATA</h2>
                            <div class="d-flex justify-content-end gap-2">
                                <button type="button"
                                    class="btn btn-secondary rounded-3 px-4 text-light text-sm font-medium"
                                    onclick="window.location.href='{{ route('invoice.index') }}'">Batal</button>
                                <button type="submit" class="btn btn-submit">Simpan Data</button>
                            </div>
                        </div>

                        <!-- FORM START -->

                        <!-- Row 1: Dua Kolom (Nama & Email) -->
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <select class="form-select" aria-label="Default select example" name="perusahaan_id">
                                    <option selected>Pilih Perusahaan</option>
                                    @foreach ($perusahaan as $pt)
                                        <option value="{{ $pt->id }}">{{ $pt->nama_perusahaan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="inputNama" class="form-label text-secondary fw-medium small">Date</label>
                                <input type="date" class="form-control rounded-3" id="inputNama" name="invoice_date">
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label text-secondary fw-medium small">No Invoice</label>
                                <input type="text" class="form-control rounded-3" id="inputEmail" name="invoice_no"
                                    placeholder="Contoh: INV-001" value="{{ $invoice }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label text-secondary fw-medium small">Description</label>
                                <input type="text" class="form-control rounded-3" id="inputEmail" name="description"
                                    placeholder="DOC" value="">
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label text-secondary fw-medium small">Quantity</label>
                                <input type="text" class="form-control rounded-3" id="inputEmail" name="quantity"
                                    placeholder="1" value="">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

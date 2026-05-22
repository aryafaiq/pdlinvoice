@extends('layout.sidebar')
@section('custom-css')
    <style>
        .btn-invoice {
            transition: all 0.2s ease-in-out;
            color: #64748b;
            text-decoration: none;
            background-color: #ffffff
        }

        .btn-invoice:hover {
            background-color: #f8fafcde;
            color: #1e293b;
        }

        .btn-invoice i {
            color: #354762;
            transition: color 0.2s ease;
        }

        .custom-focus:focus {
            border-color: #a5b4fc !important;
            box-shadow: 0 0 0 0.25rem rgba(99, 102, 241, 0.15) !important;
        }

        .table th {
            font-weight: 600;
            background-color: #35a159
        }

        .table td {
            padding-top: 14px;
            padding-bottom: 14px;
        }
    </style>
@endsection
@section('content')
    <div>
        <div class="d-flex  align-items-start justify-content-between">
            <div class="">
                <a href="{{ route('invoice.create') }}"
                    class="btn-invoice fw-medium rounded-3 d-flex align-items-center gap-3 px-3 py-2 fs-7">
                    <i data-lucide="folder-open" style="width: 16px; height: 16px;"></i>
                    <span style="font-size: 14px;">Create Invoice</span>
                </a>
            </div>
            <div class="">
                <form action="  search" method="GET">
                    @csrf
                    <div class="d-flex">
                        <input class="form-control rounded-start rounded-end-0" id="exampleDataList" placeholder="Type to search Invoice.." name="search">
                        <button class="btn bg-success rounded-start-0" type="submit"><i data-lucide="search" class="text-white"></i></button>
                    </div>
                </form>
            </div>

        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

    </div>

    <div class="card border-0 shadow-sm bg-white p-4 mt-4 min-vh-100">
        <!-- Header Tabel -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fs-5 fw-bold text-dark m-0">INVOICE PDL</h3>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle m-0" style="min-width: 900px;">
                <thead>
                    <tr class="">
                        <th scope="col" class="py-3 px-3 text-uppercase text-light fw-bold" style="font-size: 11px; ">No.
                            Invoice</th>
                        <th scope="col" class="py-3 text-uppercase text-light fw-bold" style="font-size: 11px; ">Tanggal
                        </th>
                        <th scope="col" class="py-3 text-uppercase text-light fw-bold" style="font-size: 11px; ">Penerima
                        </th>
                        <th scope="col" class="py-3 text-uppercase text-light fw-bold" style="font-size: 11px; ">Qty</th>
                        <th scope="col" class="py-3 text-uppercase text-light fw-bold" style="font-size: 11px; ">PIC</th>
                        <th scope="col" class="py-3 text-uppercase text-light fw-bold" style="font-size: 11px; ">Status
                        </th>
                        <th scope="col" class="py-3 text-center text-uppercase text-light fw-bold"
                            style="font-size: 11px;  width: 100px;">Aksi</th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    @foreach ($invoices as $invoice)
                        <tr class="text-secondary" style="font-size: 14px;">
                            <td class="px-3 fw-semibold text-dark">{{ $invoice->invoice_no }}</td>
                            <td>{{ $invoice->invoice_date }}</td>
                            <td>{{ $invoice->perusahaan->nama_perusahaan }}</td>
                            <td>{{ $invoice->quantity }}</td>
                            <td>{{ $invoice->perusahaan->pic }}</td>
                            <td
                                class="{{ $invoice->status == 'Payment' ? 'border-bottom border-warning' : 'border-bottom border-success' }}">
                                <span
                                    class="{{ $invoice->status == 'Payment' ? 'bg-warning' : 'bg-success' }} p-1 rounded">{{ $invoice->status }}</span>
                            </td>

                            <td class="text-center">
                                <div class="d-inline-flex gap-1">
                                    @if ($invoice->status == 'Payment')
                                        <a href="{{ route('invoice.edit', $invoice->id) }}"
                                            class="btn btn-light btn-sm text-primary p-2 rounded-3 border-0"
                                            title="Edit"><i data-lucide="pencil"
                                                style="width: 14px; height: 14px;"></i></a>
                                    @endif
                                    <a href="{{ route('invoice.pdf', $invoice->id) }}" target="_blank"
                                        class="btn btn-light btn-sm text-primary p-2 rounded-3 border-0"
                                        title="Generate PDF"><i data-lucide="file-text"
                                            style="width: 14px; height: 14px;"></i></a>
                                    @if ($invoice->status == 'Payment')
                                        <form action="{{ route('invoice.destroy', $invoice->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="btn btn-light btn-sm text-danger p-2 rounded-3 border-0"
                                                title="Hapus"><i data-lucide="trash-2"
                                                    style="width: 14px; height: 14px;"></i></button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

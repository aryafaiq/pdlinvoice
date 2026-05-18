@extends('layout.sidebar')
@section('custom-css')

<style>
    .btn-invoice{
      transition: all 0.2s ease-in-out;
      color: #64748b;
      text-decoration: none;
      background-color: #ffffff
    }
    .btn-invoice:hover{
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
    }
    .table td {
        padding-top: 14px;
        padding-bottom: 14px;
    }
</style>

@endsection
@section('content')

<div>
    <div class="d-flex flex-column align-items-start">
        <div class="">
            <a href="{{ route('invoice.create') }}" class="btn-invoice fw-medium rounded-3 d-flex align-items-center gap-3 px-3 py-2 fs-7">
          <i data-lucide="folder-open" style="width: 16px; height: 16px;"></i>
          <span style="font-size: 14px;">Create Invoice</span>
        </a>
        </div>
    </div>
</div>

<div class="card border-0 rounded-4 shadow-sm bg-white p-4 mt-4">
  <!-- Header Tabel -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h3 class="fs-5 fw-bold text-dark m-0">INVOICE PDL</h3>
    </div>
  </div>

  <div class="table-responsive">
            <table class="table table-hover align-middle m-0" style="min-width: 900px;">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="py-3 px-3 text-uppercase text-muted fw-bold" style="font-size: 11px; letter-spacing: 0.05em;">No. Invoice</th>
                        <th scope="col" class="py-3 text-uppercase text-muted fw-bold" style="font-size: 11px; letter-spacing: 0.05em;">Tanggal</th>
                        <th scope="col" class="py-3 text-uppercase text-muted fw-bold" style="font-size: 11px; letter-spacing: 0.05em;">Nama Barang</th>
                        <th scope="col" class="py-3 text-uppercase text-muted fw-bold" style="font-size: 11px; letter-spacing: 0.05em;">Shipper</th>
                        <th scope="col" class="py-3 text-uppercase text-muted fw-bold" style="font-size: 11px; letter-spacing: 0.05em;">Party</th>
                        <th scope="col" class="py-3 text-uppercase text-muted fw-bold" style="font-size: 11px; letter-spacing: 0.05em;">Weight</th>
                        <th scope="col" class="py-3 text-uppercase text-muted fw-bold" style="font-size: 11px; letter-spacing: 0.05em;">No. Container</th>
                        <th scope="col" class="py-3 text-center text-uppercase text-muted fw-bold" style="font-size: 11px; letter-spacing: 0.05em; width: 100px;">Aksi</th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    <!-- Contoh Baris Data -->
                    @foreach ($invoices as $invoice)
                        <tr class="text-secondary" style="font-size: 14px;">
                            <td class="px-3 fw-semibold text-dark">{{ $invoice->invoice_no }}</td>
                            <td>{{ $invoice->invoice_date }}</td>
                            <td>{{ $invoice->nama_barang }}</td>
                            <td>{{ $invoice->shipper }}</td>
                            <td>{{ $invoice->party }}</td>
                            <td>{{ $invoice->weight }}</td>
                            <td><span class="badge bg-light text-dark border border-light-subtle rounded-2 px-2 py-1.5 font-monospace">{{ $invoice->no_container }}</span></td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('invoice.edit', $invoice->id) }}" class="btn btn-light btn-sm text-primary p-2 rounded-3 border-0" title="Edit"><i data-lucide="pencil" style="width: 14px; height: 14px;"></i></a>
                                    <a href="{{ route('invoice.pdf', $invoice->id) }}" target="_blank" class="btn btn-light btn-sm text-primary p-2 rounded-3 border-0" title="Generate PDF"><i data-lucide="file-text" style="width: 14px; height: 14px;"></i></a>
                                    <form action="{{ route('invoice.destroy', $invoice->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-light btn-sm text-danger p-2 rounded-3 border-0" title="Hapus"><i data-lucide="trash-2" style="width: 14px; height: 14px;"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>



@endsection
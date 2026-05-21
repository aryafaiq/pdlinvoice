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
    </style>
@endsection

@section('content')
    <div class="container">
        <a href="{{ route('invoice.index') }}" class="btn btn-secondary mb-2"><i data-lucide="arrow-big-left-dash"></i>Back
        </a>
        <div class="row">
            <div class="col-md-8 col-lg-12">

                <!-- CARD FORM CONTAINER -->
                <div class="card card-custom p-4 bg-white">

                    <!-- Form Header -->
                    <div class="mb-4">
                        <h2 class="fs-4 fw-bold text-dark m-0">INVOICE</h2>
                    </div>
                    <!-- FORM START -->
                    <form action="{{ route('invoice.update', $invoice->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <!-- Row 1: Dua Kolom (Nama & Email) -->
                        <div class="row g-3 mb-3">
                            <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <select class="form-select" aria-label="Default select example" name="perusahaan_id">
                                    @foreach ($perusahaan as $p)
                                        <option value="{{ $p->id }}" {{ $invoice->perusahaan_id == $p->id ? 'selected' : '' }}>
                                            {{ $p->nama_perusahaan }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-sm-6">
                                <label for="inputNama" class="form-label text-secondary fw-medium small">Date</label>
                                <input type="date" class="form-control rounded-3" id="inputNama" name="invoice_date" value="{{ $invoice->invoice_date }}">
                                @error('invoice_date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label text-secondary fw-medium small">No Invoice</label>
                                <input type="text" class="form-control rounded-3" id="inputEmail" name="invoice_no"
                                    placeholder="Contoh: INV-001" value="{{ $invoice->invoice_no }}" disabled readonly>
                                @error('invoice_no')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label text-secondary fw-medium small">Description</label>
                                <input type="text" class="form-control rounded-3" id="inputEmail" name="description"
                                    placeholder="DOC" value="{{ $invoice->description }}">
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label text-secondary fw-medium small">Quantity</label>
                                <input type="text" class="form-control rounded-3" id="inputEmail" name="quantity"
                                    placeholder="1" value="{{ $invoice->quantity }}">
                                @error('quantity')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        </div>
                        

                        <!-- Row 5: Checkbox Syarat & Ketentuan -->

                        <!-- BUTTONS: Cancel & Submit -->
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button"
                                    class="btn btn-secondary rounded-3 px-4 text-light text-sm font-medium" onclick="window.location.href='{{ route('invoice.index') }}'">Batal</button>
                            <button type="submit" class="btn btn-submit">Simpan Data</button>
                        </div>

                    </form>
                    <!-- FORM END -->

                </div>

            </div>
        </div>
    </div>
@endsection

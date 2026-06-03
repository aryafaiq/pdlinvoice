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
    .custom-focus:focus {
        border-color: #a5b4fc !important;
        box-shadow: 0 0 0 0.25rem rgba(99, 102, 241, 0.15) !important;
    }

    </style>
@endsection


@section('content')
    <div class="col-md-8 col-lg-12">
        <a href="{{ route('perusahaan.index') }}" class="btn btn-secondary mb-2"><i data-lucide="arrow-big-left-dash"></i>Back
        </a>
        <!-- CARD FORM CONTAINER -->
        <form action="{{ route('perusahaan.store') }}" method="POST">
            @csrf
            <div class="card p-4 bg-white">
                <!-- Form Header -->
                <div class="mb-4">
                    <h2 class="fs-4 fw-bold text-dark m-0">Recipient Data</h2>
                    <div class="d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-submit">Simpan Data</button>
                    </div>
                </div>

                <!-- FORM START -->

                <!-- Row 1: Dua Kolom (Nama & Email) -->
                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label for="inputNama" class="form-label text-secondary fw-medium small">Nama Perusahaan</label>
                        <input type="text" class="form-control rounded-3" id="inputNama" name="nama_perusahaan">
                    </div>
                    <div class="col-sm-6">
                        <label for="" class="form-label text-secondary fw-medium small">Alamat</label>
                        <textarea type="textarea" class="form-control rounded-3" id="inputEmail" name="alamat_perusahaan" placeholder=""
                            value=""></textarea>
                    </div>
                    <div class="col-sm-6">
                        <label for="" class="form-label text-secondary fw-medium small">PIC</label>
                        <input type="text" class="form-control rounded-3" id="inputEmail" name="pic" placeholder=""
                            value="">
                    </div>
                    <div class="col-sm-6">
                        <label for="" class="form-label text-secondary fw-medium small">No Tlp</label>
                        <input type="text" class="form-control rounded-3" id="inputEmail" name="no_tlp"
                            placeholder="+62" value="">
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection

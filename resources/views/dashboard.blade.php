@section('custom-css')
<style>
    .hover-animate {
            /* Menentukan properti yang dianimasikan dan durasinya (0.3 detik) */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-animate:hover {
            /* Menggeser card ke atas sejajar sumbu Y sebesar 8 pixel */
            transform: translateY(-8px);
            /* Mengubah bayangan menjadi lebih tebal dan menyebar saat di-hover */
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.12) !important;
            /* Mengubah kursor menjadi tipe klik/pointer */
            cursor: pointer;
        }
</style>
@endsection


@extends('layout.sidebar')
@section('content')

    <div class="row">
            
            <!-- Card 1: Total Data Invoice -->
            <div class="col-md-6 col-lg-4">
                <!-- Ditambahkan class 'hover-animate' -->
                <div class="card border-0 shadow-sm h-100 hover-animate">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h6 class="card-subtitle text-muted text-uppercase fw-bold fs-7">Total Invoice</h6>
                                <h2 class="card-title my-2 text-dark">{{ $data1 }}</h2>
                            </div>
                            <div class="bg-primary-subtle text-primary rounded p-1">
                                <i data-lucide="folder-open"></i>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2: Sum Seluruh Harga Invoice -->
            <div class="col-md-6">
                <!-- Ditambahkan class 'hover-animate' -->
                <div class="card border-0 shadow-sm h-100 hover-animate">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h6 class="card-subtitle text-muted text-uppercase fw-bold fs-7">Total Pendapatan</h6>
                                <h3 class="card-title  my-2 text-dark">{{ 'Rp.' . ' ' . number_format($data2, 0, ',', '.') }}</h3>
                            </div>
                            <div class="bg-success-subtle text-success rounded p-1">
                                <i data-lucide="landmark"></i>  
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

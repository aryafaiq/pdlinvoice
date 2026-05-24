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
        <a href="{{ route('perusahaan.create') }}" class="btn btn-success">
            <i data-lucide="id-card"></i> Add Receipient
        </a>
    </div>

    <div class="container">
        <div class="row">

            <div class="card bg-white my-2 py-2 min-vh-100">
                <table class="table table-hover align-middle m-0" style="min-width: 900px;">
                    <thead class="">
                        <tr class="">
                            <th scope="col" class="py-3 text-light px-3 text-uppercase fw-bold"
                                style="font-size: 11px;  letter-spacing: 0.05em;">Penerima</th>
                            <th scope="col" class="py-3 text-light text-uppercase fw-bold"
                                style="font-size: 11px;  letter-spacing: 0.05em;">Alamat</th>
                            <th scope="col" class="py-3 text-light text-uppercase fw-bold"
                                style="font-size: 11px;  letter-spacing: 0.05em;">PIC</th>
                            <th scope="col" class="py-3 text-light text-uppercase fw-bold"
                                style="font-size: 11px;  letter-spacing: 0.05em;">No Tlp</th>
                            <th scope="col" class="py-3 text-light text-center text-uppercase fw-bold"
                                style="font-size: 11px;  letter-spacing: 0.05em; width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        @foreach ($perusahaan as $data)
                            <tr class="text-secondary" style="font-size: 14px;">
                                <td class="px-3 fw-semibold text-dark">{{ $data->nama_perusahaan }}</td>
                                <td>{{ $data->alamat_perusahaan }}</td>
                                <td>{{ $data->pic }}</td>
                                <td>{{ $data->no_tlp }}</td>

                                <td class="text-center">
                                    <div class="d-inline-flex gap-1">
                                        <a href="{{ route('perusahaan.edit', $data->id) }}"
                                            class="btn btn-light btn-sm text-primary p-2 rounded-3 border-0"
                                            title="Edit"><i data-lucide="pencil"
                                                style="width: 14px; height: 14px;"></i></a>
                                        <form action="{{ route('perusahaan.destroy', $data->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="btn btn-light btn-sm text-danger p-2 rounded-3 border-0"
                                                title="Hapus"><i data-lucide="trash-2"
                                                    style="width: 14px; height: 14px;"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>


    </div>
@endsection

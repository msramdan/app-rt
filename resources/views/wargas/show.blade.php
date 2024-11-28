@extends('layouts.app')

@section('title', __('Detail of Warga'))

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header" style="margin-top: 5px">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>{{ __('Warga') }}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/panel">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('wargas.index') }}">{{ __('Warga') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('Detail') }}
                            </li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <tr>
                                        <td class="fw-bold">{{ __('Nama') }}</td>
                                        <td>{{ $warga->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('No Kk') }}</td>
                                        <td>{{ $warga->no_kk }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Nik') }}</td>
                                        <td>{{ $warga->nik }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Agama') }}</td>
                                        <td>{{ $warga->agama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Jenis Kelamin') }}</td>
                                        <td>{{ $warga->jenis_kelamin }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Tempat Lahir') }}</td>
                                        <td>{{ $warga->tempat_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Tanggal Lahir') }}</td>
                                        <td>{{ $warga->tanggal_lahir }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Status Kawin') }}</td>
                                        <td>{{ $warga->status_kawin }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Golongan Darah') }}</td>
                                        <td>{{ $warga->golongan_darah }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Pekerjaan') }}</td>
                                        <td>{{ $warga->pekerjaan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Alamat Lengkap') }}</td>
                                        <td>{{ $warga->alamat_lengkap }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Kartu Keluarga') }}</td>
                                        <td>
                                            @if ($warga->kartu_keluarga == null)
                                                <img src="https://via.placeholder.com/350?text=No+Image+Avaiable"
                                                    alt="Kartu Keluarga" class="rounded" width="200" height="150"
                                                    style="object-fit: cover">
                                            @else
                                                <img src="{{ asset('storage/uploads/kartu_keluargas/' . $warga->kartu_keluarga) }}"
                                                    alt="Kartu Keluarga" class="rounded" width="200" height="150"
                                                    style="object-fit: cover">
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Terverifikasi Warga') }}</td>
                                        <td>{{ $warga->is_verify }}</td>
                                    </tr>
                                </table>
                            </div>

                            <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Kembali') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

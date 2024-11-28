@extends('layouts.app')

@section('title', __('Warga'))

@section('content')
                <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">{{ __('Warga') }}</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="/panel">Dashboard</a></li>
                                    <li class="breadcrumb-item active">{{ __('Warga') }}</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                    <div class="card-header">
                            @can('warga create')
                                <a href="{{ route('wargas.create') }}" class="btn btn-md btn-primary"> <i
                                        class="mdi mdi-plus"></i> Tambah</a>
                            @endcan
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="data-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('Nama') }}</th>
											<th>{{ __('No Kk') }}</th>
											<th>{{ __('Nik') }}</th>
											<th>{{ __('Agama') }}</th>
											<th>{{ __('Jenis Kelamin') }}</th>
											<th>{{ __('Tempat Lahir') }}</th>
											<th>{{ __('Tanggal Lahir') }}</th>
											<th>{{ __('Status Kawin') }}</th>
											<th>{{ __('Golongan Darah') }}</th>
											<th>{{ __('Pekerjaan') }}</th>
											<th>{{ __('Alamat Lengkap') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script>
        $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('wargas.index') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nama',
                    name: 'nama',
                },
				{
                    data: 'no_kk',
                    name: 'no_kk',
                },
				{
                    data: 'nik',
                    name: 'nik',
                },
				{
                    data: 'agama',
                    name: 'agama',
                },
				{
                    data: 'jenis_kelamin',
                    name: 'jenis_kelamin',
                },
				{
                    data: 'tempat_lahir',
                    name: 'tempat_lahir',
                },
				{
                    data: 'tanggal_lahir',
                    name: 'tanggal_lahir',
                },
				{
                    data: 'status_kawin',
                    name: 'status_kawin',
                },
				{
                    data: 'golongan_darah',
                    name: 'golongan_darah',
                },
				{
                    data: 'pekerjaan',
                    name: 'pekerjaan',
                },
				{
                    data: 'alamat_lengkap',
                    name: 'alamat_lengkap',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
        });
    </script>
@endpush

<div class="row mb-2">
    <div class="col-md-6 mb-2">
                <label for="tanggal-kegiatan">{{ __('Tanggal Kegiatan') }}</label>
            <input type="date" name="tanggal_kegiatan" id="tanggal-kegiatan" class="form-control @error('tanggal_kegiatan') is-invalid @enderror" value="{{ isset($kegiatanWarga) && $kegiatanWarga->tanggal_kegiatan ? $kegiatanWarga->tanggal_kegiatan->format('Y-m-d') : old('tanggal_kegiatan') }}" placeholder="{{ __('Tanggal Kegiatan') }}" required />
            @error('tanggal_kegiatan')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
    </div>
    <div class="col-md-6 mb-2">
                <label for="judul-kegiatan">{{ __('Judul Kegiatan') }}</label>
            <input type="text" name="judul_kegiatan" id="judul-kegiatan" class="form-control @error('judul_kegiatan') is-invalid @enderror" value="{{ isset($kegiatanWarga) ? $kegiatanWarga->judul_kegiatan : old('judul_kegiatan') }}" placeholder="{{ __('Judul Kegiatan') }}" required />
            @error('judul_kegiatan')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
    </div>
    <div class="col-md-6 mb-2">
                <label for="keteran-kegiatan">{{ __('Keteran Kegiatan') }}</label>
            <input type="text" name="keterangan_kegiatan" id="keteran-kegiatan" class="form-control @error('keterangan_kegiatan') is-invalid @enderror" value="{{ isset($kegiatanWarga) ? $kegiatanWarga->keterangan_kegiatan : old('keterangan_kegiatan') }}" placeholder="{{ __('Keteran Kegiatan') }}" required />
            @error('keterangan_kegiatan')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
    </div>
</div>

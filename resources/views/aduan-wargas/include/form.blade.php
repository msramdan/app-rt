<div class="row mb-2">
    <div class="col-md-6 mb-2">
                <label for="nama-pengirim">{{ __('Nama Pengirim') }}</label>
            <input type="text" name="nama_pengirim" id="nama-pengirim" class="form-control @error('nama_pengirim') is-invalid @enderror" value="{{ isset($aduanWarga) ? $aduanWarga->nama_pengirim : old('nama_pengirim') }}" placeholder="{{ __('Nama Pengirim') }}" required />
            @error('nama_pengirim')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
    </div>
    <div class="col-md-6 mb-2">
                <label for="tanggal">{{ __('Tanggal') }}</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ isset($aduanWarga) && $aduanWarga->tanggal ? $aduanWarga->tanggal->format('Y-m-d') : old('tanggal') }}" placeholder="{{ __('Tanggal') }}" required />
            @error('tanggal')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
    </div>
    <div class="col-md-6 mb-2">
                <label for="judul">{{ __('Judul') }}</label>
            <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ isset($aduanWarga) ? $aduanWarga->judul : old('judul') }}" placeholder="{{ __('Judul') }}" required />
            @error('judul')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="keterangan">{{ __('Keterangan') }}</label>
            <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="{{ __('Keterangan') }}" required>{{ isset($aduanWarga) ? $aduanWarga->keterangan : old('keterangan') }}</textarea>
            @error('keterangan')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>
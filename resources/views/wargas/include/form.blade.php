<div class="row mb-2">
    <div class="col-md-6 mb-2">
        <label for="nama">{{ __('Nama') }}</label>
        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
            value="{{ isset($warga) ? $warga->nama : old('nama') }}" placeholder="{{ __('Nama') }}" required />
        @error('nama')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="col-md-6 mb-2">
        <label for="no-kk">{{ __('No Kk') }}</label>
        <input type="text" name="no_kk" id="no-kk" class="form-control @error('no_kk') is-invalid @enderror"
            value="{{ isset($warga) ? $warga->no_kk : old('no_kk') }}" placeholder="{{ __('No Kk') }}" required />
        @error('no_kk')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="col-md-6 mb-2">
        <label for="nik">{{ __('Nik') }}</label>
        <input type="text" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror"
            value="{{ isset($warga) ? $warga->nik : old('nik') }}" placeholder="{{ __('Nik') }}" required />
        @error('nik')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="col-md-6 mb-2">
        <label for="agama">{{ __('Agama') }}</label>
        <select class="form-control @error('agama') is-invalid @enderror" name="agama" id="agama" required>
            <option value="" selected disabled>-- {{ __('Select agama') }} --</option>
            <option value="Islam"
                {{ isset($warga) && $warga->agama == 'Islam' ? 'selected' : (old('agama') == 'Islam' ? 'selected' : '') }}>
                Islam</option>
            <option value="Kristen Protestan"
                {{ isset($warga) && $warga->agama == 'Kristen Protestan' ? 'selected' : (old('agama') == 'Kristen Protestan' ? 'selected' : '') }}>
                Kristen Protestan</option>
            <option value="Kristen Katolik"
                {{ isset($warga) && $warga->agama == 'Kristen Katolik' ? 'selected' : (old('agama') == 'Kristen Katolik' ? 'selected' : '') }}>
                Kristen Katolik</option>
            <option value="Hindu"
                {{ isset($warga) && $warga->agama == 'Hindu' ? 'selected' : (old('agama') == 'Hindu' ? 'selected' : '') }}>
                Hindu</option>
            <option value="Buddha"
                {{ isset($warga) && $warga->agama == 'Buddha' ? 'selected' : (old('agama') == 'Buddha' ? 'selected' : '') }}>
                Buddha</option>
            <option value="Konghucu"
                {{ isset($warga) && $warga->agama == 'Konghucu' ? 'selected' : (old('agama') == 'Konghucu' ? 'selected' : '') }}>
                Konghucu</option>
        </select>
        @error('agama')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>

    <div class="col-md-6 mb-2">
        <label for="jenis-kelamin">{{ __('Jenis Kelamin') }}</label>
        <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin"
            id="jenis-kelamin" required>
            <option value="" selected disabled>-- {{ __('Select jenis kelamin') }} --</option>
            <option value="Laki-Laki"
                {{ isset($warga) && $warga->jenis_kelamin == 'Laki-Laki' ? 'selected' : (old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '') }}>
                Laki-Laki</option>
            <option value="Perempuan"
                {{ isset($warga) && $warga->jenis_kelamin == 'Perempuan' ? 'selected' : (old('jenis_kelamin') == 'Perempuan' ? 'selected' : '') }}>
                Perempuan</option>
        </select>
        @error('jenis_kelamin')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>

    <div class="col-md-6 mb-2">
        <label for="tempat-lahir">{{ __('Tempat Lahir') }}</label>
        <input type="text" name="tempat_lahir" id="tempat-lahir"
            class="form-control @error('tempat_lahir') is-invalid @enderror"
            value="{{ isset($warga) ? $warga->tempat_lahir : old('tempat_lahir') }}"
            placeholder="{{ __('Tempat Lahir') }}" required />
        @error('tempat_lahir')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="col-md-6 mb-2">
        <label for="tanggal-lahir">{{ __('Tanggal Lahir') }}</label>
        <input type="date" name="tanggal_lahir" id="tanggal-lahir"
            class="form-control @error('tanggal_lahir') is-invalid @enderror"
            value="{{ isset($warga) ? $warga->tanggal_lahir : old('tanggal_lahir') }}"
            placeholder="{{ __('Tanggal Lahir') }}" required />
        @error('tanggal_lahir')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>

    <div class="col-md-6 mb-2">
        <label for="status-kawin">{{ __('Status Kawin') }}</label>
        <select class="form-control @error('status_kawin') is-invalid @enderror" name="status_kawin" id="status-kawin"
            required>
            <option value="" selected disabled>-- {{ __('Select status kawin') }} --</option>
            <option value="Belum Kawin"
                {{ isset($warga) && $warga->status_kawin == 'Belum Kawin' ? 'selected' : (old('status_kawin') == 'Belum Kawin' ? 'selected' : '') }}>
                Belum Kawin</option>
            <option value="Kawin"
                {{ isset($warga) && $warga->status_kawin == 'Kawin' ? 'selected' : (old('status_kawin') == 'Kawin' ? 'selected' : '') }}>
                Kawin</option>
            <option value="Cerai Hidup"
                {{ isset($warga) && $warga->status_kawin == 'Cerai Hidup' ? 'selected' : (old('status_kawin') == 'Cerai Hidup' ? 'selected' : '') }}>
                Cerai Hidup</option>
            <option value="Cerai Mati"
                {{ isset($warga) && $warga->status_kawin == 'Cerai Mati' ? 'selected' : (old('status_kawin') == 'Cerai Mati' ? 'selected' : '') }}>
                Cerai Mati</option>
        </select>
        @error('status_kawin')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>

    <div class="col-md-6 mb-2">
        <label for="golongan-darah">{{ __('Golongan Darah') }}</label>
        <select class="form-control @error('golongan_darah') is-invalid @enderror" name="golongan_darah"
            id="golongan-darah" required>
            <option value="" selected disabled>-- {{ __('Select golongan darah') }} --</option>
            <option value="A"
                {{ isset($warga) && $warga->golongan_darah == 'A' ? 'selected' : (old('golongan_darah') == 'A' ? 'selected' : '') }}>
                A</option>
            <option value="B"
                {{ isset($warga) && $warga->golongan_darah == 'B' ? 'selected' : (old('golongan_darah') == 'B' ? 'selected' : '') }}>
                B</option>
            <option value="AB"
                {{ isset($warga) && $warga->golongan_darah == 'AB' ? 'selected' : (old('golongan_darah') == 'AB' ? 'selected' : '') }}>
                AB</option>
            <option value="O"
                {{ isset($warga) && $warga->golongan_darah == 'O' ? 'selected' : (old('golongan_darah') == 'O' ? 'selected' : '') }}>
                O</option>
        </select>
        @error('golongan_darah')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>

    <div class="col-md-6 mb-2">
        <label for="pekerjaan">{{ __('Pekerjaan') }}</label>
        <input type="text" name="pekerjaan" id="pekerjaan"
            class="form-control @error('pekerjaan') is-invalid @enderror"
            value="{{ isset($warga) ? $warga->pekerjaan : old('pekerjaan') }}" placeholder="{{ __('Pekerjaan') }}"
            required />
        @error('pekerjaan')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="alamat-lengkap">{{ __('Alamat Lengkap') }}</label>
            <textarea name="alamat_lengkap" id="alamat-lengkap"
                class="form-control @error('alamat_lengkap') is-invalid @enderror" placeholder="{{ __('Alamat Lengkap') }}"
                required>{{ isset($warga) ? $warga->alamat_lengkap : old('alamat_lengkap') }}</textarea>
            @error('alamat_lengkap')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-2">
        <label for="password">{{ __('Password') }}</label>
        <input type="password" name="password" id="password"
            class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Enter Password') }}"
            @if(!isset($warga)) required @endif minlength="6" />
        @error('password')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
        <small class="form-text text-muted">{{ __('Kosongkan jika Anda tidak ingin merubah password.') }}</small>
    </div>

    @isset($warga)
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($warga->kartu_keluarga == null)
                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Kartu Keluarga"
                            class="rounded mb-2 mt-2" alt="Kartu Keluarga" width="200" height="150"
                            style="object-fit: cover">
                    @else
                        <img src="{{ asset('storage/uploads/kartu_keluargas/' . $warga->kartu_keluarga) }}"
                            alt="Kartu Keluarga" class="rounded mb-2 mt-2" width="200" height="150"
                            style="object-fit: cover">
                    @endif
                </div>

                <div class="col-md-8">
                    <div class="form-group ms-3">
                        <label for="kartu_keluarga">{{ __('Kartu Keluarga') }}</label>
                        <input type="file" name="kartu_keluarga"
                            class="form-control @error('kartu_keluarga') is-invalid @enderror" id="kartu_keluarga">

                        @error('kartu_keluarga')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <small class="form-text text-muted">{{ __('Kosongkan jika Anda tidak ingin merubah kartu keluarga.') }}</small>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-md-6">
            <div class="form-group">
                <label for="kartu_keluarga">{{ __('Kartu Keluarga') }}</label>
                <input type="file" name="kartu_keluarga"
                    class="form-control @error('kartu_keluarga') is-invalid @enderror" id="kartu_keluarga" required>

                @error('kartu_keluarga')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
    @endisset
</div>

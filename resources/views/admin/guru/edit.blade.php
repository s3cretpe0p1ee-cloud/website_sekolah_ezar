<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Guru - Admin</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 40px;
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        .container {
            max-width: 750px;
            margin: auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(0,0,0,.06);
        }

        h1 {
            color: #123b73;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #6b7280;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #123b73;
        }

        .foto-preview {
            margin-bottom: 15px;
        }

        .foto-preview img {
            width: 120px;
            height: 150px;
            object-fit: contain;
            background: #f3f4f6;
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        .foto-info {
            color: #6b7280;
            font-size: 13px;
            margin-top: 6px;
        }

        .peran-box {
            border: 1px solid #dbe1e8;
            padding: 18px;
            border-radius: 10px;
            margin-bottom: 12px;
            background: #fafbfc;
        }

        .peran-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .peran-header strong {
            color: #123b73;
        }

        .hapus-peran {
            border: none;
            background: #fee2e2;
            color: #b91c1c;
            padding: 7px 10px;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn-tambah {
            border: none;
            background: #e0edff;
            color: #1554a5;
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            padding: 12px 18px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-save {
            background: #123b73;
            color: white;
        }

        .btn-back {
            background: #e5e7eb;
            color: #374151;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 5px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Edit Guru & Staff</h1>

        <p class="subtitle">
            Perbarui data guru, foto, dan peran.
        </p>

        <form
            action="{{ url('/admin/guru/' . $guru->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <div class="form-group">

                <label>NIP</label>

                <input
                    type="text"
                    name="nip"
                    value="{{ old('nip', $guru->nip) }}"
                    placeholder="Masukkan NIP"
                >

            </div>


            <div class="form-group">

                <label>Nama Lengkap</label>

                <input
                    type="text"
                    name="nama"
                    value="{{ old('nama', $guru->nama) }}"
                    required
                >

            </div>


            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $guru->email) }}"
                >

            </div>


            <div class="form-group">

                <label>Foto Guru</label>

                @if($guru->foto)

                    <div class="foto-preview">

                        <img
                            src="{{ asset('storage/' . $guru->foto) }}"
                            alt="{{ $guru->nama }}"
                        >

                    </div>

                @endif

                <input
                    type="file"
                    name="foto"
                    accept="image/jpeg,image/png,image/jpg,image/webp"
                >

                <div class="foto-info">
                    Kosongkan jika tidak ingin mengganti foto.
                </div>

            </div>


            <div class="form-group">

                <label>Peran / Jabatan</label>

                <div id="peran-container">

                    @forelse($guru->peran as $index => $peran)

                        <div class="peran-box">

                            <div class="peran-header">

                                <strong>
                                    Peran {{ $index + 1 }}
                                </strong>

                                @if($index > 0)

                                    <button
                                        type="button"
                                        class="hapus-peran"
                                        onclick="this.closest('.peran-box').remove()"
                                    >
                                        Hapus
                                    </button>

                                @endif

                            </div>


                            <select
                                name="peran[{{ $index }}][jenis]"
                                required
                            >

                                <option value="">
                                    -- Pilih Peran --
                                </option>

                                @foreach([
                                    'Kepala Sekolah',
                                    'Wakil Kepala Sekolah',
                                    'Guru Mata Pelajaran',
                                    'Guru BK',
                                    'Wali Kelas',
                                    'Pembina / Koordinator',
                                    'Staff Tata Usaha',
                                    'Staff'
                                ] as $jenis)

                                    <option
                                        value="{{ $jenis }}"
                                        {{ $peran->jenis == $jenis ? 'selected' : '' }}
                                    >
                                        {{ $jenis }}
                                    </option>

                                @endforeach

                            </select>

                            <br><br>

                            <input
                                type="text"
                                name="peran[{{ $index }}][jabatan]"
                                value="{{ $peran->jabatan }}"
                                placeholder="Contoh: Guru Bahasa Indonesia"
                                required
                            >

                            <br><br>

                            <input
                                type="text"
                                name="peran[{{ $index }}][kelas]"
                                value="{{ $peran->kelas }}"
                                placeholder="Kelas jika ada"
                            >

                        </div>

                    @empty

                        <div class="peran-box">

                            <div class="peran-header">
                                <strong>Peran 1</strong>
                            </div>

                            <select name="peran[0][jenis]" required>

                                <option value="">
                                    -- Pilih Peran --
                                </option>

                                <option value="Kepala Sekolah">
                                    Kepala Sekolah
                                </option>

                                <option value="Wakil Kepala Sekolah">
                                    Wakil Kepala Sekolah
                                </option>

                                <option value="Guru Mata Pelajaran">
                                    Guru Mata Pelajaran
                                </option>

                                <option value="Wali Kelas">
                                    Wali Kelas
                                </option>

                                <option value="Pembina / Koordinator">
                                    Pembina / Koordinator
                                </option>

                                <option value="Staff Tata Usaha">
                                    Staff Tata Usaha
                                </option>

                                <option value="Staff">
                                    Staff
                                </option>

                                <option value="Guru BK">
                                    Guru BK
                                </option>

                            </select>

                            <br><br>

                            <input
                                type="text"
                                name="peran[0][jabatan]"
                                placeholder="Contoh: Guru Bahasa Indonesia"
                                required
                            >

                            <br><br>

                            <input
                                type="text"
                                name="peran[0][kelas]"
                                placeholder="Kelas jika ada"
                            >

                        </div>

                    @endforelse

                </div>


                <button
                    type="button"
                    class="btn-tambah"
                    onclick="tambahPeran()"
                >
                    + Tambah Peran
                </button>

            </div>


            @if($errors->any())

                <div class="error">

                    <ul>

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <div class="buttons">

                <a
                    href="{{ url('/admin/guru') }}"
                    class="btn btn-back"
                >
                    Kembali
                </a>

                <button
                    type="submit"
                    class="btn btn-save"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>


<script>

let jumlahPeran = {{ max($guru->peran->count(), 1) }};

function tambahPeran() {

    const container = document.getElementById('peran-container');

    const index = jumlahPeran;

    const box = document.createElement('div');

    box.className = 'peran-box';

    box.innerHTML = `

        <div class="peran-header">

            <strong>
                Peran ${index + 1}
            </strong>

            <button
                type="button"
                class="hapus-peran"
                onclick="this.closest('.peran-box').remove()"
            >
                Hapus
            </button>

        </div>

        <select
            name="peran[${index}][jenis]"
            required
        >

            <option value="">
                -- Pilih Peran --
            </option>

            <option value="Kepala Sekolah">
                Kepala Sekolah
            </option>

            <option value="Wakil Kepala Sekolah">
                Wakil Kepala Sekolah
            </option>

            <option value="Guru Mata Pelajaran">
                Guru Mata Pelajaran
            </option>

            <option value="Wali Kelas">
                Wali Kelas
            </option>

            <option value="Pembina / Koordinator">
                Pembina / Koordinator
            </option>

            <option value="Staff Tata Usaha">
                Staff Tata Usaha
            </option>

            <option value="Staff">
                Staff
            </option>

        </select>

        <br><br>

        <input
            type="text"
            name="peran[${index}][jabatan]"
            placeholder="Contoh: Guru Bahasa Indonesia"
            required
        >

        <br><br>

        <input
            type="text"
            name="peran[${index}][kelas]"
            placeholder="Kelas jika ada"
        >

    `;

    container.appendChild(box);

    jumlahPeran++;
}

</script>

</body>
</html>
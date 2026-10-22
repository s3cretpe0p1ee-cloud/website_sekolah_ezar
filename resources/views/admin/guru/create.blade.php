<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Guru - Admin</title>

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
            box-shadow: 0 5px 20px rgba(0, 0, 0, .06);
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
            margin-bottom: 18px;
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

        .foto-info,
        .field-info {
            color: #6b7280;
            font-size: 13px;
            margin-top: 6px;
        }

        .wajib {
            color: #dc2626;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Tambah Guru & Staff</h1>

        <p class="subtitle">
            Tambahkan data guru, foto, dan satu atau beberapa peran.
        </p>

        <form
            action="{{ url('/admin/guru') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            {{-- NIP --}}
            <div class="form-group">

                <label>NIP</label>

                <input
                    type="text"
                    name="nip"
                    value="{{ old('nip') }}"
                    placeholder="Masukkan NIP"
                >

            </div>


            {{-- NAMA --}}
            <div class="form-group">

                <label>
                    Nama Lengkap <span class="wajib">*</span>
                </label>

                <input
                    type="text"
                    name="nama"
                    value="{{ old('nama') }}"
                    placeholder="Masukkan nama lengkap"
                    required
                >

            </div>


            {{-- EMAIL --}}
            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Contoh: guru@infokom.sch.id"
                >

            </div>


            {{-- FOTO --}}
            <div class="form-group">

                <label>Foto Guru</label>

                <input
                    type="file"
                    name="foto"
                    accept="image/jpeg,image/png,image/jpg,image/webp"
                >

                <div class="foto-info">
                    JPG, JPEG, PNG, WEBP — maksimal 2 MB.
                </div>

            </div>


            {{-- PERAN --}}
            <div class="form-group">

                <label>
                    Peran / Jabatan <span class="wajib">*</span>
                </label>

                <div id="peran-container">

                    {{-- PERAN PERTAMA --}}
                    <div class="peran-box">

                        <div class="peran-header">

                            <strong>Peran 1</strong>

                        </div>


                        {{-- JENIS PERAN --}}
                        <select
                            name="peran[0][jenis]"
                            onchange="ubahPeran(this)"
                            required
                        >

                            <option value="">
                                -- Pilih Peran --
                            </option>

                            <option value="Kepala Sekolah">
                                Kepala Sekolah
                            </option>

                            <option value="Wakasek">
                                Wakasek
                            </option>

                            <option value="Koordinator">
                                Koordinator
                            </option>

                            <option value="Wali Kelas">
                                Wali Kelas
                            </option>

                            <option value="Staff">
                                Staff
                            </option>

                            <option value="Guru BK">
                                Guru BK
                            </option>

                            <option value="Guru Mata Pelajaran">
                                Guru Mata Pelajaran
                            </option>

                        </select>


                        <br><br>


                        {{-- JABATAN --}}
                        <input
                            type="text"
                            name="peran[0][jabatan]"
                            placeholder="Jabatan"
                            class="input-jabatan"
                        >


                        <br><br>


                        {{-- KELAS --}}
                        <input
                            type="text"
                            name="peran[0][kelas]"
                            placeholder="Kelas, contoh: XII PPLG 1"
                            class="input-kelas"
                        >

                        <div class="field-info">
                            Kelas hanya diisi jika peran berkaitan dengan kelas.
                        </div>

                    </div>

                </div>


                <button
                    type="button"
                    class="btn-tambah"
                    onclick="tambahPeran()"
                >
                    + Tambah Peran
                </button>

            </div>


            {{-- ERROR --}}
            @if($errors->any())

                <div class="error">

                    <ul>

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- BUTTON --}}
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
                    Simpan Data
                </button>

            </div>

        </form>

    </div>

</div>


<script>

let jumlahPeran = 1;


/*
|--------------------------------------------------------------------------
| UBAH PERAN
|--------------------------------------------------------------------------
*/

function ubahPeran(select) {

    const box = select.closest('.peran-box');

    const jabatan = box.querySelector('.input-jabatan');

    const kelas = box.querySelector('.input-kelas');

    const jenis = select.value;


    // RESET

    jabatan.required = false;

    kelas.required = false;

    jabatan.readOnly = false;

    jabatan.value = '';

    kelas.value = '';

    jabatan.placeholder = 'Jabatan';

    kelas.placeholder = 'Kelas, contoh: XII PPLG 1';


    /*
    |--------------------------------------------------------------------------
    | KEPALA SEKOLAH
    |--------------------------------------------------------------------------
    */

    if (jenis === 'Kepala Sekolah') {

        jabatan.value = 'Kepala Sekolah';

        jabatan.readOnly = true;

    }


    /*
    |--------------------------------------------------------------------------
    | WAKASEK
    |--------------------------------------------------------------------------
    */

    else if (jenis === 'Wakasek') {

        jabatan.placeholder =
            'Contoh: Wakasek Bidang Kurikulum';

        jabatan.required = true;

    }


    /*
    |--------------------------------------------------------------------------
    | KOORDINATOR
    |--------------------------------------------------------------------------
    */

    else if (jenis === 'Koordinator') {

        jabatan.placeholder =
            'Contoh: Koordinator PPLG';

        jabatan.required = true;

    }


    /*
    |--------------------------------------------------------------------------
    | WALI KELAS
    |--------------------------------------------------------------------------
    */

    else if (jenis === 'Wali Kelas') {

        jabatan.value = 'Wali Kelas';

        jabatan.readOnly = true;

        kelas.required = true;

    }


    /*
    |--------------------------------------------------------------------------
    | STAFF
    |--------------------------------------------------------------------------
    */

    else if (jenis === 'Staff') {

        jabatan.placeholder =
            'Contoh: Staff Administrasi';

        jabatan.required = true;

    }


    /*
    |--------------------------------------------------------------------------
    | GURU MATA PELAJARAN
    |--------------------------------------------------------------------------
    */

    else if (jenis === 'Guru Mata Pelajaran') {

        jabatan.placeholder =
            'Contoh: Guru Bahasa Indonesia';

        jabatan.required = true;

    }

}


/*
|--------------------------------------------------------------------------
| TAMBAH PERAN
|--------------------------------------------------------------------------
*/

function tambahPeran() {

    const container =
        document.getElementById('peran-container');

    const index = jumlahPeran;


    const box =
        document.createElement('div');

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
            onchange="ubahPeran(this)"
            required
        >

            <option value="">
                -- Pilih Peran --
            </option>

            <option value="Kepala Sekolah">
                Kepala Sekolah
            </option>

            <option value="Wakasek">
                Wakasek
            </option>

            <option value="Koordinator">
                Koordinator
            </option>

            <option value="Wali Kelas">
                Wali Kelas
            </option>

            <option value="Staff">
                Staff
            </option>

            <option value="Guru Mata Pelajaran">
                Guru Mata Pelajaran
            </option>

        </select>


        <br><br>


        <input
            type="text"
            name="peran[${index}][jabatan]"
            placeholder="Jabatan"
            class="input-jabatan"
        >


        <br><br>


        <input
            type="text"
            name="peran[${index}][kelas]"
            placeholder="Kelas, contoh: XII PPLG 1"
            class="input-kelas"
        >


        <div class="field-info">
            Kelas hanya diisi jika peran berkaitan dengan kelas.
        </div>

    `;


    container.appendChild(box);

    jumlahPeran++;

}

</script>

</body>

</html>
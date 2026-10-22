<div class="guru-card reveal {{ ($featured ?? false) ? 'guru-card--featured' : '' }}"
    data-search="{{ strtolower($guru->nama . ' ' . $guru->jabatan . ' ' . $guru->peran->pluck('jabatan')->implode(' ')) }}">

    {{-- FOTO --}}
    <div class="guru-photo">

        @if($guru->foto)

            <img
                src="{{ asset('storage/' . $guru->foto) }}"
                alt="{{ $guru->nama }}"
                loading="lazy"
            >

        @else

            {{-- Avatar inisial jika foto belum tersedia --}}
            <div class="avatar-fallback">

                <span>{{ mb_substr($guru->nama, 0, 2) }}</span>

                <small>Foto Belum Tersedia</small>

            </div>

        @endif

    </div>


    {{-- NAMA --}}
    <div class="guru-name">
        {{ $guru->nama }}
    </div>


    {{-- PERAN --}}
    <div class="guru-peran">

        @forelse($guru->peran as $i => $peran)

            {{-- Peran pertama ditampilkan sebagai badge utama --}}
            @if($i === 0)

                <div class="peran-badge {{ $peran->jenis === 'Kepala Sekolah' ? 'peran-badge--gold' : '' }}">
                    {{ $peran->jabatan }}

                    @if($peran->kelas)
                        &middot; Kelas {{ $peran->kelas }}
                    @endif
                </div>

            @else

                <div class="peran-mini">
                    {{ $peran->jabatan }}

                    @if($peran->kelas)
                        &middot; Kelas {{ $peran->kelas }}
                    @endif
                </div>

            @endif

        @empty

            {{-- Untuk data guru lama yang belum punya peran --}}

            @if($guru->jabatan)

                <div class="peran-badge">
                    {{ $guru->jabatan }}
                </div>

            @endif

        @endforelse

    </div>

</div>

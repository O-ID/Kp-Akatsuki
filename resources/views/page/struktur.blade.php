@extends('desain.menu')
@section('halaman', 'Denah')
@section('content')
<style>
.tooltip {
    pointer-events: none;
}
.denah-container {
    overflow: auto;
}
.denah-box .marker {
    width: 175px;
    position: absolute;
    line-height: 16px;
    font-weight: 500;
    font-size: 12px;
}
.pengasuh {
    left: 328px;
    top: 18px;
}
.kepala-sekolah {
    left: 328px;
    top: 71px;
}
.komite-sekolah {
    left: 565px;
    top: 71px;
}
.kepala-tu {
    left: 225px;
    top: 131px;
}
.bendahara {
    left: 435px;
    top: 131px;
}
.bagian-it {
    left: 13px;
    top: 187px;
}
.operator {
    left: 225px;
    top: 187px;
}
.waka-kurikulum {
    left: 13px;
    top: 296px;
}
.waka-kesiswaan {
    left: 225px;
    top: 296px;
}
.waka-humas {
    left: 434px;
    top: 296px;
}
.waka-sarana {
    left: 642px;
    top: 296px;
}
.ka-perpustakaan {
    left: 13px;
    top: 357px;
}
.pembina-osis {
    left: 225px;
    top: 357px;
}
.bkk {
    left: 434px;
    top: 357px;
}
.ka-prog-keahlian-tkj {
    left: 225px;
    top: 448px;
}
.ka-prog-keahlian-tbsm {
    left: 434px;
    top: 448px;
}
</style>
<div class="row ld ld-throw-btt-in">
    <div class="card card-chart">
        <div class="card-header card-header-primary">
            <div class="text-center">
                <h2 class="mb-0 font-weight-bold">Struktur Organisasi</h2>
                <h4 class="mt-0">SMK ISLAM TANJUNG</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <div class="denah-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="denah-box">
                                <img src="{{ asset('assets/img/struktur organisasi.svg') }}" style="width: 800px">
                                <div class="marker pengasuh text-center">{{ $struktur['PENGASUH'] }}</div>
                                <div class="marker kepala-sekolah text-center">{{ $struktur['KEPALA SEKOLAH'] }}</div>
                                <div class="marker komite-sekolah text-center">{{ $struktur['KOMITE SEKOLAH'] }}</div>
                                <div class="marker kepala-tu text-center">{{ $struktur['KEPALA TU'] }}</div>
                                <div class="marker bendahara text-center">{{ $struktur['BENDAHARA'] }}</div>
                                <div class="marker bagian-it text-center">{{ $struktur['BAGIAN IT'] }}</div>
                                <div class="marker operator text-center">{{ $struktur['OPERATOR'] }}</div>
                                <div class="marker waka-kurikulum text-center">{{ $struktur['WAKA KURIKULUM'] }}</div>
                                <div class="marker waka-kesiswaan text-center">{{ $struktur['WAKA KESISWAAN'] }}</div>
                                <div class="marker waka-humas text-center">{{ $struktur['WAKA HUMAS'] }}</div>
                                <div class="marker waka-sarana text-center">{{ $struktur['WAKA SARANA'] }}</div>
                                <div class="marker ka-perpustakaan text-center">{{ $struktur['KA PERPUSTAKAAN'] }}</div>
                                <div class="marker pembina-osis text-center">{{ $struktur['PEMBINA OSIS'] }}</div>
                                <div class="marker bkk text-center">{{ $struktur['BKK'] }}</div>
                                <div class="marker ka-prog-keahlian-tkj text-center">{{ $struktur['KA PROG KEAHLIAN TKJ'] }}</div>
                                <div class="marker ka-prog-keahlian-tbsm text-center">{{ $struktur['KA PROG KEAHLIAN TBSM'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>

</script>
@endsection
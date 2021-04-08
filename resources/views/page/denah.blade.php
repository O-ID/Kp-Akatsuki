@extends('desain.menu')
@section('halaman', 'Denah')
@section('content')
<style>
    .tooltip {
        pointer-events: none;
    }
    .tooltip-inner {
    max-width: 400px; /* set this to your maximum fitting width */
    width: inherit; /* will take up least amount of space */ 
}

    .denah-container {
        overflow: auto;
    }

    .denah-box .marker {
        width: 20px;
        height: 20px;
        background-color: red;
        border-radius: 50%;
        border: 2px solid #000;
        position: absolute;
    }

    .musholla {
        left: 68px;
        top: 155px;
    }

    .kantin {
        left: 297px;
        top: 140px;
    }

    .tempat-parkir {
        left: 420px;
        top: 140px;
    }

    .kantor {
        left: 460px;
        top: 230px;
    }

    .x-tbsm {
        left: 520px;
        top: 230px;
    }

    .xi-tbsm {
        left: 582px;
        top: 230px;
    }

    .xii-tbsm {
        left: 640px;
        top: 230px;
    }

    .ruang-osis {
        left: 695px;
        top: 230px;
    }

    .ruang-ekskul {
        left: 744px;
        top: 230px;
    }

    .bengkel-motor {
        left: 797px;
        top: 230px;
    }

    .halaman-sekolah {
        left: 490px;
        top: 335px;
    }

    .labkom-1 {
        left: 421px;
        top: 535px;
    }
    .labkom-2 {
        left: 482px;
        top: 535px;
    }
    .aula {
        left: 544px;
        top: 535px;
    }
    .kamar-mandi {
        left: 604px;
        top: 550px;
    }
    .x-tkj {
        left: 664px;
        top: 535px;
    }
    .xi-tkj {
        left: 726px;
        top: 535px;
    }
    .xii-tkj {
        left: 786px;
        top: 535px;
    }
</style>
<div class="row ld ld-throw-btt-in">
    <div class="card card-chart">
        <div class="card-header card-header-primary">
            <div class="text-center">
                <h2 class="mb-0 font-weight-bold">Denah Sekolah</h2>
                <h4 class="mt-0">SMK ISLAM TANJUNG</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <div class="denah-container">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="denah-box">
                                <img src="{{ asset('assets/img/denah_sekolah.png') }}">
                                <div class="marker musholla" rel="tooltip" data-html="true" data-title='<b>MUSHOLLA</b> </br> <img src="assets/img/denah/{{ $denah['MUSHOLLA'] }}" style="width:350px">'></div>
                                <div class="marker kantin" rel="tooltip" data-html="true" data-title='<b>KANTIN</b> </br> <img src="assets/img/denah/{{ $denah['KANTIN'] }}" style="width:350px">'></div>
                                <div class="marker tempat-parkir" rel="tooltip" data-html="true" data-title='<b>TEMPAT PARKIR</b> </br> <img src="assets/img/denah/{{ $denah['TEMPAT PARKIR'] }}" style="width:350px">'></div>
                                <div class="marker kantor" rel="tooltip" data-html="true" data-title='<b>KANTOR</b> </br> <img src="assets/img/denah/{{ $denah['KANTOR'] }}" style="width:350px">'></div>
                                <div class="marker x-tbsm" rel="tooltip" data-html="true" data-title='<b>X TBSM</b> </br> <img src="assets/img/denah/{{ $denah['X TBSM'] }}" style="width:350px">'></div>
                                <div class="marker xi-tbsm" rel="tooltip" data-html="true" data-title='<b>XI TBSM</b> </br> <img src="assets/img/denah/{{ $denah['XI TBSM'] }}" style="width:350px">'></div>
                                <div class="marker xii-tbsm" rel="tooltip" data-html="true" data-title='<b>XII TBSM</b> </br> <img src="assets/img/denah/{{ $denah['XII TBSM'] }}" style="width:350px">'></div>
                                <div class="marker ruang-osis" rel="tooltip" data-html="true" data-title='<b>RUANG OSIS</b> </br> <img src="assets/img/denah/{{ $denah['RUANG OSIS'] }}" style="width:350px">'></div>
                                <div class="marker ruang-ekskul" rel="tooltip" data-html="true" data-title='<b>RUANG EKSKUL</b> </br> <img src="assets/img/denah/{{ $denah['RUANG EKSKUL'] }}" style="width:350px">'></div>
                                <div class="marker bengkel-motor" rel="tooltip" data-html="true" data-title='<b>BENGKEL MOTOR</b> </br> <img src="assets/img/denah/{{ $denah['BENGKEL MOTOR'] }}" style="width:350px">'></div>
                
                                <div class="marker halaman-sekolah" rel="tooltip" data-html="true" data-title='<b>HALAMAN SEKOLAH</b> </br> <img src="assets/img/denah/{{ $denah['HALAMAN SEKOLAH'] }}" style="width:350px">'></div>
                                
                                <div class="marker labkom-1" rel="tooltip" data-html="true" data-title='<b>LAB KOMPUTER 1</b> </br> <img src="assets/img/denah/{{ $denah['LABKOM 1'] }}" style="width:350px">'></div>
                                <div class="marker labkom-2" rel="tooltip" data-html="true" data-title='<b>LAB KOMPUTER 2</b> </br> <img src="assets/img/denah/{{ $denah['LABKOM 2'] }}" style="width:350px">'></div>
                                <div class="marker aula" rel="tooltip" data-html="true" data-title='<b>AULA</b> </br> <img src="assets/img/denah/{{ $denah['AULA'] }}" style="width:350px">'></div>
                                <div class="marker kamar-mandi" rel="tooltip" data-html="true" data-title='<b>KAMR MANDI</b> </br> <img src="assets/img/denah/{{ $denah['KAMAR MANDI'] }}" style="width:350px">'></div>
                                <div class="marker x-tkj" rel="tooltip" data-html="true" data-title='<b>X TKJ</b> </br> <img src="assets/img/denah/{{ $denah['X TKJ'] }}" style="width:350px">'></div>
                                <div class="marker xi-tkj" rel="tooltip" data-html="true" data-title='<b>XI TKJ</b> </br> <img src="assets/img/denah/{{ $denah['XI TKJ'] }}" style="width:350px">'></div>
                                <div class="marker xii-tkj" rel="tooltip" data-html="true" data-title='<b>XII TKJ</b> </br> <img src="assets/img/denah/{{ $denah['XII TKJ'] }}" style="width:350px">'></div>
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
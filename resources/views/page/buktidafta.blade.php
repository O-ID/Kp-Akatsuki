<!DOCTYPE html>
<html lang="en">
<head>
{{-- <meta http-equiv="X-UA-Compatible" content="IE=Edge" /> --}}
<meta charset="utf-8" />
{{-- <meta http-equiv="Content-Type" content="charset=utf-8"/> --}}
<link rel="stylesheet" href="{{ asset('assets/css/material-dashboard-pro.min.css?v=2.1.0') }}">
</head>

<body style="margin: 0;" class="d-print-block" onload="window.print()">

<div id="p1" style=" position: relative; background-color: white; width: 935px; height: 1210px;">

<!-- Begin shared CSS values -->
<style class="shared-css" type="text/css" >
.t {
	transform-origin: bottom left;
	z-index: 2;
	position: absolute;
	white-space: pre;
	overflow: visible;
	line-height: 1.5;
}
</style>
<!-- End shared CSS values -->


<!-- Begin inline CSS -->
<style type="text/css" >

#t1_1{left:427px;bottom:1124px;letter-spacing:-0.04px;word-spacing:-0.01px;}
#t2_1{left:383px;bottom:1097px;letter-spacing:0.24px;word-spacing:-0.01px;}
#t3_1{left:399px;bottom:1060px;letter-spacing:0.29px;word-spacing:-0.06px;}
#t4_1{left:286px;bottom:1038px;letter-spacing:0.12px;}
#t5_1{left:335px;bottom:964px;letter-spacing:-0.21px;word-spacing:0.1px;}
#t6_1{left:165px;bottom:896px;letter-spacing:0.13px;word-spacing:0.19px;}
#t7_1{left:110px;bottom:873px;letter-spacing:0.13px;word-spacing:0.07px;}
#t8_1{left:165px;bottom:803px;letter-spacing:0.12px;word-spacing:0.01px;}
#t9_1{left:330px;bottom:803px;}
#ta_1{left:165px;bottom:768px;letter-spacing:0.12px;}
#tb_1{left:330px;bottom:768px;}
#tc_1{left:165px;bottom:733px;letter-spacing:0.13px;word-spacing:0.01px;}
#td_1{left:165px;bottom:698px;letter-spacing:0.13px;word-spacing:0.01px;}
#te_1{left:330px;bottom:698px;}
#tf_1{left:165px;bottom:663px;letter-spacing:0.12px;word-spacing:0.01px;}
#tg_1{left:330px;bottom:663px;}
#th_1{left:393px;bottom:624px;letter-spacing:0.23px;}
#ti_1{left:165px;bottom:484px;letter-spacing:0.15px;word-spacing:2.55px;}
#tj_1{left:110px;bottom:462px;letter-spacing:0.13px;word-spacing:0.01px;}
#tk_1{left:660px;bottom:252px;letter-spacing:0.13px;}
#tl_1{left:649px;bottom:217px;letter-spacing:0.13px;word-spacing:0.04px;}

.s1{font-size:23px;font-family:BerlinSansFBDemi-Bold_1c;color:#000;}
.s2{font-size:21px;font-family:BerlinSansFBDemi-Bold_1c;color:#000;}
.s3{font-size:24px;font-family:Arial-Black_1e;color:#000;}
.s4{font-size:15px;font-family:sub_TimesNewRomanPSMT_lfr;color:#000;}
.s5{font-size:28px;font-family:sub_TimesNewRomanPSMT_lfr;color:#000;}
.s6{font-size:18px;font-family:sub_TimesNewRomanPSMT_lfr;color:#000;}
.s7{font-size:21px;font-family:sub_TimesNewRomanPSMT_lfr;color:#000;}
</style>
<!-- End inline CSS -->

<!-- Begin embedded font definitions -->
<style id="fonts1" type="text/css" >

@font-face {
	font-family: Arial-Black_1e;
	src: url("{{ asset('assets/print/fonts/Arial-Black_1e.woff') }}") format("woff");
}

@font-face {
	font-family: BerlinSansFBDemi-Bold_1c;
	src: url("{{ asset('assets/print/fonts/BerlinSansFBDemi-Bold_1c.woff') }}") format("woff");
}

@font-face {
	font-family: sub_TimesNewRomanPSMT_lfr;
	src: url("{{ asset('assets/print/fonts/sub_TimesNewRomanPSMT_lfr.woff') }}") format("woff");
}

</style>
<!-- End embedded font definitions -->

<!-- Begin page background -->
<div id="pg1Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
<div id="pg1" style="-webkit-user-select: none;"><object width="935" height="1210" data="{{ asset('assets/print/1/1.svg') }}" type="image/svg+xml" id="pdf1" style="width:935px; height:1210px; -moz-transform:scale(1); z-index: 0;"></object></div>
<!-- End page background -->


<!-- Begin text definitions (Positioned/styled in CSS) -->
<div id="t1_1" class="t s1">YAYASAN AL-FURQON </div>
<div id="t2_1" class="t s2">SEKOLAH MENENGAH KEJURUAN </div>
<div id="t3_1" class="t s3">SMK ISLAM TANJUNG </div>
<div id="t4_1" class="t s4">Jl. Idaman No. 01 Dharma Tanjung Kec. Camplong Kab. Sampang Prov. Jawa Timur </div>
<div id="t5_1" class="t s5">Surat Bukti Pendaftaran </div>
<div id="t6_1" class="t s6">Yang bertanda tangan dibawah ini Panitia Pendaftaran Siswa/I Baru SMK Islam Tanjung, </div>
<div id="t7_1" class="t s6">Dengan ini menyatakan bahwa: </div>
<div id="t8_1" class="t s6">No. Pendaftaran </div>
<div id="t9_1" class="t s6">: {{ $registrasi }}</div>
<div id="ta_1" class="t s6">Nama </div>
<div id="tb_1" class="t s6">: {{ $nama }}</div>
<div id="tc_1" class="t s6">Tempat/Tanggal Lahir: {{ $tetala }}</div>
<div id="td_1" class="t s6">Rencana Jurusan </div>
<div id="te_1" class="t s6">: {{ $jurusan }}</div>
<div id="tf_1" class="t s6">Tanggal Daftar </div>
<div id="tg_1" class="t s6">: {{ $tgldaftar }}</div>
<div id="th_1" class="t s7">DINYATAKAN: </div>
<div id="ti_1" class="t s6">Demikian surat Bukti Pendaftaran ini kami buat untuk bukti bahwa calon siswa sudah </div>
<div id="tj_1" class="t s6">melakukan pendaftaran. </div>
<div id="tk_1" class="t s6">Panitia Pelaksana </div>
<div id="tl_1" class="t s6">Pendaftaran Siswa Baru </div>

<!-- End text definitions -->


</div>
<script>
    window.onafterprint = function(e){
        closePrintView();
    };
    function closePrintView() {
        window.location.href = "{{ route('pengunjung.index') }}";
    }
</script>
</body>
</html>

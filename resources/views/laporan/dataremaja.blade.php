<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<meta charset="utf-8" />
</head>

<body style="margin: 0;">

<div id="p1" style="overflow: hidden; position: relative; background-color: white; width: 909px; height: 1285px;">

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
.text-container {
	white-space: pre;
}
@supports (-webkit-touch-callout: none) {
	.text-container {
		white-space: normal;
	}
}
</style>
<!-- End shared CSS values -->


<!-- Begin inline CSS -->
<style type="text/css" >

#t1_1{left:153px;bottom:1192px;letter-spacing:-0.36px;word-spacing:0.08px;}
#t2_1{left:263px;bottom:1173px;letter-spacing:-0.18px;word-spacing:0.09px;}
#t3_1{left:317px;bottom:1142px;letter-spacing:-0.12px;word-spacing:0.03px;}
#t4_1{left:55px;bottom:1101px;letter-spacing:0.3px;}
#t5_1{left:165px;bottom:1101px;}
#t6_1{left:55px;bottom:1075px;letter-spacing:-0.05px;}
#t7_1{left:165px;bottom:1075px;}
#t8_1{left:55px;bottom:1006px;letter-spacing:-0.03px;word-spacing:0.33px;}
#t9_1{left:55px;bottom:971px;letter-spacing:0.19px;}
#ta_1{left:165px;bottom:971px;}
#tb_1{left:55px;bottom:938px;letter-spacing:0.18px;}
#tc_1{left:165px;bottom:938px;}
#td_1{left:55px;bottom:904px;letter-spacing:0.02px;}
#te_1{left:165px;bottom:904px;}
#tf_1{left:55px;bottom:833px;letter-spacing:0.19px;}
#tg_1{left:55px;bottom:798px;letter-spacing:0.15px;}
#th_1{left:165px;bottom:798px;}
#ti_1{left:55px;bottom:764px;letter-spacing:0.14px;}
#tj_1{left:165px;bottom:764px;}
#tk_1{left:55px;bottom:731px;letter-spacing:0.16px;}
#tl_1{left:165px;bottom:731px;}
#tm_1{left:55px;bottom:697px;letter-spacing:0.24px;}
#tn_1{left:165px;bottom:697px;}
#to_1{left:55px;bottom:663px;letter-spacing:0.08px;}
#tp_1{left:165px;bottom:663px;}
#tq_1{left:55px;bottom:630px;letter-spacing:0.19px;}
#tr_1{left:165px;bottom:630px;}

.s0{font-size:28px;font-family:AptosDisplay-Bold_b;color:#000;}
.s1{font-size:17px;font-family:AptosDisplay-Bold_b;color:#000;}
.s2{font-size:21px;font-family:AptosDisplay-Bold_b;color:#000;}
.s3{font-size:18px;font-family:AptosDisplay-Bold_b;color:#000;}
</style>
<!-- End inline CSS -->

<!-- Begin embedded font definitions -->
<style id="fonts1" type="text/css" >

@font-face {
	font-family: AptosDisplay-Bold_b;
	src: url("fonts/AptosDisplay-Bold_b.woff") format("woff");
}

</style>
<!-- End embedded font definitions -->

<!-- Begin page background -->
<div id="pg1Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
<div id="pg1" style="-webkit-user-select: none;"><object width="909" height="1285" data="assetreport/1/1.svg" type="image/svg+xml" id="pdf1" style="width:909px; height:1285px; -moz-transform:scale(1); z-index: 0;"></object></div>
<!-- End page background -->


<!-- Begin text definitions (Positioned/styled in CSS) -->
<div class="text-container"><span id="t1_1" class="t s0"><strong>LAPORAN BULANAN POSYANDU REMAJA MENTARI</strong> </span>
<span id="t2_1" class="t s1"><strong>Jl Cupu No.47b, RW.08, Rancamanyar, Kec. Baleendah</strong> </span>
<span id="t3_1" class="t s1"><strong>Kabupaten Bandung, Jawa Barat 40375</strong> </span>
<span id="t4_1" class="t s2">BULAN </span><span id="t5_1" class="t s2">: {{ \Carbon\Carbon::parse($remaja->Tanggal)->translatedFormat('F') }}</span>
<span id="t6_1" class="t s2">TANGGAL </span><span id="t7_1" class="t s2">: {{ \Carbon\Carbon::parse($remaja->Tanggal)->translatedFormat('d') }}</span>
<span id="t8_1" class="t s2">BIODATA REMAJA </span>
<span id="t9_1" class="t s3">Nama </span><span id="ta_1" class="t s3">: {{ $remaja->Nama }}</span>
<span id="tb_1" class="t s3">NIK </span><span id="tc_1" class="t s3">: {{ $remaja->NIK }}</span>
<span id="td_1" class="t s3">Tgl. Lahir </span><span id="te_1" class="t s3">: {{ $remaja->TanggalLahir }}</span>
<span id="tf_1" class="t s2">KETERANGAN </span>
<span id="tg_1" class="t s3">BB </span><span id="th_1" class="t s3">: {{ $remaja->BB }}</span>
<span id="ti_1" class="t s3">TB </span><span id="tj_1" class="t s3">: {{ $remaja->TB }}</span>
<span id="tk_1" class="t s3">TTD </span><span id="tl_1" class="t s3">: {{ $remaja->TTD }}</span>
<span id="tm_1" class="t s3">LILA </span><span id="tn_1" class="t s3">: {{ $remaja->LILA }}</span>
<span id="to_1" class="t s3">LP </span><span id="tp_1" class="t s3">: {{ $remaja->LP }}</span>
<span id="tq_1" class="t s3">ANEMIA </span><span id="tr_1" class="t s3">: {{ $remaja->Anemia }}</span></div>
<!-- End text definitions -->


</div>
</body>
</html>

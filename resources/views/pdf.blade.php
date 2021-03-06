<!DOCTYPE html>
<html>
<head>
	<title></title>
<style>
	.big{
		font-size:35px;
	}
	.small{
		font-size:25px;
	}
	.xsmall{
		font-size:20px;
	}
	.med{
		font-size:30px;
	}
	.times{
		font-family: "Times New Roman", Georgia, Serif;
	}
	.center{
		text-align: center ;
	}
</style>
</head>
<body>
	<table width="1000" border="0">
	    <tr>
	        <td width="100">
	            {!! Html::image(asset('img/assets/logo.jpg'),null,['class'=>'img-rounded img-responsive','width'=>'100px']) !!}
	        </td>
	        <td class="center">
	            <h3 class="small times"><b>PEMERINTAH PROVINSI LAMPUNG</b></h3>
	            <h3 class="med times">DINAS PARIWISATA DAN EKONOMI KREATIF</b></h3>
	            <p class="small times">Jalan Jenderal Sudirman No. 29 Telp. (0721)261430 Fax. (0721)266184</p>
	            <p class="times small">BANDAR LAMPUNG 35127</p>
	            <p class="xsmall times">Website: pariwisatalampung.com Email: disparekraflampung@gmail.com </p>
	        </td>
	    </tr>
	</table>
	<hr style="margin-bottom:-10;">
	<hr style="margin-bottom:20;">
	<table width="1000" border="0">
		<tr>
			<td class="center">
				<h3 class="big times">Laporan Transaksi Kunjungan Wisata</h3>
				<h3 class="big times">Provinsi Lampung</h3>
			</td>
		</tr>
	</table>
	<br>
	<br>
	<table width="1000" border="0" style="margin-bottom:30;">
		<tr>
			<td width="720">
				<p class="small times"><b>No Laporan : </b>LP/{{ $tahun }}/LTKW/{{ $bulan1 }}/{{ $hari }}</p>
			</td>
			<td>
				<p class="xsmall times">Bandar Lampung, {{ $tanggal }}</p>
			</td>
		</tr>
	</table>
	<table width="1000" border="0">
		<tr>
			<td>
				<br>
				<br>
				<p class="xsmall times"><b>Bulan : </b>{{ $bulan }}</p>
			</td>
		</tr>
	</table>
	<table width="1000" border="1" style="margin-top:30;">
		<tr class="center">
		    <th>No</th>
		    <th>Nama Objek Wisata</th> 
		    <th>Jumlah Kunjungan</th>
	  	</tr>
	  	<?php 
	  		$no = 1 ;

	  		// $test = [];
	  	?>
		{{-- @for ($i = 0; $i < sizeof($wisata_unik); $i++)
			<tr>
				<td>{{ $wisata_unik[$i] }}</td>
			</tr>
		@endfor --}}

	  	@foreach ($objekwisata as $objek)
		  	<tr>
				<td class="center">{{ $no++ }}</td>
				<td class="center">{{ $objek->nama_objekwisata }}</td> 
				<td class="center">{{ $transaksi->where('id_objekwisata',$objek->id)->count() }}</td>
		  	</tr>
	  	@endforeach
	  	{{-- @for ($i = 0; $i < sizeof($wisata); $i++)
	  		<tr>
	  			<td>{{ $wisata[$i] }}</td>
	  		</tr>
	  	@endfor --}}
	</table>
	<br>
	<br>
	<br>

	<table width="1000" border="0">
		<tr>
			<td>
				<p class="med times"><b>Total Kunjungan :</b> {{ $transaksi->count() }} orang</p>
				<br>
				<p class="med times"><b>Jumlah Objek Wisata :</b> {{ $objekwisata->count() }}</p>
			</td>
		</tr>
	</table>
</body>
</html>
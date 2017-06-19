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
				<p class="small times"><b>No Laporan : </b>LP/2017/LTKW/01/21</p>
			</td>
			<td>
				<p class="xsmall times">Bandar Lampung, 21/01/2017</p>
			</td>
		</tr>
	</table>
	<table width="1000" border="0">
		<tr>
			<td>
				<br>
				<br>
				<p class="xsmall times"><b>Bulan : </b>Januari</p>
			</td>
		</tr>
	</table>
	<table width="1000" border="1" style="margin-top:30;">
		<tr class="center">
		    <th>No</th>
		    <th>Nama Objek Wisata</th> 
		    <th>Jumlah Kunjungan</th>
	  	</tr>
	  	<tr>
		    <td class="center">1</td>
		    <td class="center">Pantai Mutun</td> 
		    <td class="center">1000</td>
	  	</tr>
	  	<tr>
		    <td class="center">2</td>
		    <td class="center">Pantai Klara</td> 
		    <td class="center">1000</td>
	  	</tr>
	  	<tr>
		    <td class="center">3</td>
		    <td class="center">Pantai Dewi Mandapa</td> 
		    <td class="center">1000</td>
	  	</tr>
	</table>
	<br>
	<br>
	<br>

	<table width="1000" border="0">
		<tr>
			<td>
				<p class="med times"><b>Total Kunjungan/Bulan :</b> 3000 orang</p>
				<br>
				<p class="med times"><b>Jumlah Objek Wisata yang Dikunjungi :</b> 10</p>
			</td>
		</tr>
	</table>
</body>
</html>
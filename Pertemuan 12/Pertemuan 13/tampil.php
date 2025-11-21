<?php
include ('koneksi.php');
$db = new database();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1">
	<link href="//fonts.googleapis.com/css?family=Roboto" rel="stylesheet"><br>
	<nav style="background:#47C0DB; padding:10px;">
    <a href="tampil.php" >Home</a>
    <a href="tambah_data.php">Kelola Data</a>
    <a href="index.php">Logout</a><br>
</nav>

	<title></title>
	<style type="text/css">
		form#background_border{
			margin: 0px 500px;
			color:black;
		}
		form#print_satuan{
			margin: 0px 250px;
			color:white;
		}
		.posisi_tombol{
			margin: 0px 200px;
		}
		.tombol_login{
			background: #47C0DB;
			color: white;
			font-size: 11pt;
			border: none;
			padding: 5px 20px;
		}
	</style>

    <style type="text/css">
	* {
		font-family: "Trebuchet MS";
	}
	h1 {
		text-transform: uppercase;
		color: #47C0DB;
	}
	table {
		border: solid 1px #DDEEEE;
		border-collapse: collapse;
		border-spacing: 0;
		width: 70%;
		margin: 10px auto 10px auto;
	}
	table thead th {
		background-color: #DDEFEF;
		border: solid 1px #DDEEEE;
		color: #336B6B;
		padding: 10px;
		text-align: left;
		text-shadow: 1px 1px 1px #fff;
		text-decoration: none;
	}
	table tbody td {
		border: solid 1px #DDEEEE;
		color: #333;
		padding: 10px;
		text-shadow: 1px 1px 1px #fff;
	}
	a {
		background-color: #47C0DB;
		color: #fff;
		padding: 10px;
		text-decoration: none;
		font-size: 12px;
	}

    .autocomplete-suggestions {
        border: 1px solid #999;
        background: #FFF;
        overflow: auto;
    }
    .autocomplete-suggestion {
        padding: 2px 5px;
        white-space: nowrap;
        overflow: hidden;
    }
    .autocomplete-selected {
        background: #F0F0F0;
    }
    .autocomplete-suggestions strong {
        font-weight: normal;
        color: #3399FF;
    }
    .autocomplete-group {
        padding: 2px 5px;
    }
    .autocomplete-group strong {
        display: block;
        border-bottom: 1px solid #000;
    }
	.pagination a {
		padding: 5px 10px;
		background: #47C0DB;
		margin: 2px;
		text-decoration: none;
		border-radius: 1px;
	}
	.pagination a.active {
		background: #47C0DB;
		background: orange;
		color: white;
	}
	.dropdown {
    float: left;
    overflow: hidden;
}

.dropdown .dropbtn {
    font-size: 14px;  
    border: none;
    outline: none;
    color: white;
    padding: 10px 15px;
    background-color: inherit;
    font-family: inherit; 
    margin: 0; 
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1000;
}

.dropdown-content a {
    float: none;
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
    background-color: #47C0DB; 
    border: none;
}

.dropdown-content a:hover {
    background-color: #38a5bf; 
}

.dropdown:hover .dropdown-content {
    display: block;
}
	</style>
</style>

<?php
	$jumlahDataPerHalaman = 5;
	$halamanAktif = isset($_GET["hal"]) ? $_GET["hal"] : 1;
	$awalData = ($halamanAktif - 1) * $jumlahDataPerHalaman;

	$totalData = mysqli_num_rows(mysqli_query($db->koneksi, "SELECT * FROM tb_barang"));
	$totalHalaman = ceil($totalData / $jumlahDataPerHalaman);

	$data_pagination = $db->tampil_data_paginated($awalData, $jumlahDataPerHalaman);
	?>

<br>
<body>
	<form id="background_border" method="get">
		Cari Berdasarkan:
		<select name="kriteria">
			<option value="kd_barang">Kode Barang</option>
			<option value="nama_barang">Nama Barang</option>
			<option value="stok">Stok</option>
			<option value="harga_beli">Harga Beli</option>
			<option value="harga_jual">Harga Jual</option>
		</select>
		<input type="text" name="cari" placeholder="Cari Data">
		<input type="submit" class="tombol_login" value="Cari"><br>
		
		<?php
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		echo "<b>Hasil pencarian: ".$cari."</b>";
	}
	?>
	</form>
    <br>
	<div class="posisi_tombol">
		<a href="tambah_data.php">+ Tambah Data</a>&nbsp;&nbsp;
		<a href="cetak.php" target="_BLANK"> Print Data Barang</a><br><br><br>
    	<div class="container">
    <input type="text" id="input_nama_barang" name="nama_barang" class="input-style" placeholder="Masukkan Nama Barang">
    <a href="#" onclick="printSatuan()" class="button-style">Print Satuan Barang</a>
</div>

<script>
function printSatuan() {
    var namaBarang = document.getElementById('input_nama_barang').value;
    
    if (namaBarang.trim() === "") {
        alert("Masukkan Nama Barang terlebih dahulu.");
        return;
    }
    var urlCetak = "cetak_satuan.php?nama_barang=" + encodeURIComponent(namaBarang);
    
    window.open(urlCetak, '_blank');
}
</script>
</body>
</html>

	</div>
	<center><h1>Data Barang</h1><center>
	<table width="65%" border="1">
	<thead>
		<tr>
			<th width="6%">No</th>
			<th width="16%">Kode Barang</th>
			<th width="15%">Nama Barang</th>
			<th width="7%">Stok</th>
			<th width="14%">Harga Beli</th>
			<th width="14%">Harga Jual</th>
			<th width="16%">Gambar Produk</th>
			<th width="13%">Action</th>
		</tr>
	</thead>
		<?php
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$kriteria = $_GET['kriteria'];
		$data_barang = $db->cari_data($cari,$kriteria);
        $no = 1;
        foreach($data_barang as $row){
        $rupiah_harga_beli = "Rp ". number_format($row['harga_beli'],2,',','.');
        $rupiah_harga_jual = "Rp ". number_format($row['harga_jual'],2,',','.');
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row['kd_barang']; ?></td>
			<td><?php echo $row['nama_barang']; ?></td>
			<td><?php echo $row['stok']; ?></td>
			<td><?php echo $rupiah_harga_beli; ?></td>
			<td><?php echo $rupiah_harga_jual; ?></td>
			<td style="text-align: center;"><img src="gambar/<?php echo $row['gambar_produk']; ?>" style="width: 120px;"></td>
			<td>
				<a href="edit_data.php?id_barang=<?php echo $row['id_barang']; ?>">Edit</a>&nbsp;
				<a href="proses_barang.php?id_barang=<?php echo $row['id_barang']; ?>&action=delete">Hapus</a>
			</td>
		</tr>
		<?php
		}
        } else {
		$no = $awalData + 1;
		while($row=mysqli_fetch_array($data_pagination)){
			$rupiah_harga_beli = "Rp ". number_format($row['harga_beli'],2,',','.');
			$rupiah_harga_jual = "Rp ". number_format($row['harga_jual'],2,',','.');
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row['kd_barang']; ?></td>
			<td><?php echo $row['nama_barang']; ?></td>
			<td><?php echo $row['stok']; ?></td>
			<td><?php echo $rupiah_harga_beli; ?></td>
			<td><?php echo $rupiah_harga_jual; ?></td>
			<td style="text-align: center;"><img src="gambar/<?php echo $row['gambar_produk']; ?>" style="width: 120px;"></td>
			<td>
				<a href="edit_data.php?id_barang=<?php echo $row['id_barang']; ?>&action=edit">Edit</a>&nbsp;
				<a href="proses_barang.php?id_barang=<?php echo $row['id_barang']; ?>&action=delete">Hapus</a>
			</td>
		</tr>
		<?php
    }	}?>

	</table>
	
	<br>

        <script src="jquery-3.2.1.min.js"></script>
        <script src="jquery.autocomplete.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#nama_barang").autocomplete({
                    serviceUrl:"source.php",
                    datatype: "JSON",
                    onselect: function (suggestion) {
                        $("#nama_barang").val("" + suggestion.nama_barang);
                    }
                })
            })
        </script>

<div class="pagination">
	<pag style="background:#47C0DB; padding:10px;">
		<?php if($halamanAktif > 1): ?>
			<a href="?hal=<?= $halamanAktif-1; ?>">Prev</a>
		<?php endif; ?>

	<?php for($i=1; $i<= $totalHalaman; $i++): ?>
		<a class="<?= ($halamanAktif == $i)? 'active':''; ?>" 
			href="?hal=<?= $i; ?>"><?= $i; ?></a>
		<?php endfor; ?>

 		<?php if($halamanAktif < $totalHalaman): ?>
 			<a href="?hal=<?= $halamanAktif+1; ?>">Next</a>
		<?php endif; ?>
	</pag>
</div>

</body>
</html>
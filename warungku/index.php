<!DOCTYPE html>
<html>
<head>
	<title>Ini Warungku</title>
</head>
<link rel="stylesheet" type="text/css" href="asset/style.css">
<body>
<nav>
	<ul class="kiri">
		<li><a href="">Ini Warungku</a></li>
	</ul>
	<ul class="kanan">
		<li><a href="">Hello Semua, Belanja apa hariini?</a></li>
		<div style="clear:both"></div>
	</ul>
</nav>
<div class="sidebar">
		<ul>
			<li><a href="form_add.php">Beli Barang</a></li>
			<li><a href="index.php">Jual Barang</a></li>
		</ul>
	</div>
<div class="main">
	<div class="isimain">
		<span class="span"> Selamat berbelanja di Warung Kami</span>
<?php 
include('library.php');
$lib = new Library();
$data_barang = $lib->show();

if(isset($_GET['hapus_barang']))
{
    $noreg = $_GET['hapus_barang'];
    $status_hapus = $lib->delete($id_barang);
    if($status_hapus)
    {
        header('Location: index.php');
    }
}
?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Data Barang</h3>
            </div>
            <div class="card-body">
                <a href="form_add.php" class="btn btn-success">Tambah Barang</a>
                <a href="print.php" class="btn-btn-success">Cetak Data Barang</a><br><br>
                <hr/>
                <table class="table table-bordered" width="60%">
                    <tr>
                        <th>No Daftar</th>
                        <th>Kode barang</th>
                        <th>Nama Barang</th>
                        <th>Keterangan</th>
                        <th>satuan</th>
                    </tr>
                    <?php 
                    $id_barang = 01;
                    foreach($data_barang as $row)
                    {
                        echo "<tr>";
                        echo "<td>".$no."</td>";
                        echo "<td>".$row['id_barang']."</td>";
                        echo "<td>".$row['nama_barang']."</td>";
                        echo "<td>".$row['keterangan']."</td>";
                        echo "<td>".$row['satuan']."</td>";
                        echo "<td><a class='btn btn-info' href='form_edit.php?noreg=".$row['noreg']."'>Update</a>
                        <a class='btn btn-danger' href='index.php?hapus_barang=".$row['noreg']."'>Hapus</a></td>";
                        echo "</tr>";
                        $no++;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    </body>
</html>
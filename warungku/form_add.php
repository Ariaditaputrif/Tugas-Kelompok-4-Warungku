<?php 
include('library.php');
$lib = new Library();
if(isset($_POST['tombol_tambah'])){
    $id_barang   = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $keterangan = $_POST['keterangan'];
    $satuan  = $_POST['satuan'];

    $add_status = $lib->add_data($id_barang, $nama_barang, $keterangan, $satuan);

    if($add_status){
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
                <h3>Tambah Data Barang</h3>
                <div class="card-body">
            <form method="post" action="">
                <div class="form-group row">
                    <label for="nama" class="col-sm-8 col-form-label">Kode Barang</label>
                    <div class="col-sm-10">
                    <input type="text" name="id_barang" class="form-control" id="id_barang">
                    </div><div class="form-group row">
                    <label for="nama" class="col-sm-8 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                    <input type="text" name="nama_barang" class="form-control" id="nama_barang">
                    </div>
                    <div class="form-group row">
                    <label for="nama" class="col-sm-8 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                    <input type="text" name="keterangan" class="form-control" id="keterangan">
                    </div>
                    <div class="form-group row">
                    <label for="nama" class="col-sm-8 col-form-label">Satuan</label>
                    <div class="col-sm-10">
                    <input type="text" name="satuan" class="form-control" id="satuan">
                    <input type="submit" name="tombol_tambah" class="btn btn-primary" value="Tambah">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    </body>
</html>
<?php 
include('library.php');
$lib = new Library();
if(isset($_GET['id_barang'])){
    $noreg = $_GET['id_barang']; 
    $data_siswa = $lib->get_by_id($id_barang);
}
else
{
    header('Location: index.php');
}

if(isset($_POST['tombol_update'])){
    $id_barang   = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $keterangan = $_POST['keterangan'];
    $satuan  = $_POST['satuan'];

    $status_update = $lib->update($id_barang, $nama_barang, $keterangan,$satuan);
    if($status_update)
    {
        header('Location:index.php');
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
                <h3>Update Data Barang</h3>
            </div>
            <div class="card-body">
            <form method="post" action="">
                <input type="hidden" name="id_barang" value="<?php echo $data_siswa['id_barang']; ?>"/>
                <div class="form-group row">
                    <label for="id_barang" class="col-sm-2 col-form-label">Kode Barang</label>
                    <div class="col-sm-10">
                    <input type="text" name="id_barang" class="form-control" id="id_barang" value="<?php echo $id_barang['id_barang']; ?>">
                    </div>
                </div>
                <div class="card-body">
            <form method="post" action="">
                <input type="hidden" name="noreg" value="<?php echo $data_siswa['noreg']; ?>"/>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $data_siswa['nama']; ?>">
                    </div>
                </div>
                <div class="card-body">
            <form method="post" action="">
                <input type="hidden" name="noreg" value="<?php echo $data_siswa['noreg']; ?>"/>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $data_siswa['nama']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group label-floating">
                         <label class="control-label">Jenis Kelamin</label>
                            <select name="gender" class="form-control">
                            <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
							<option value="L" <?php isset($_SESSION['gender']) && $_SESSION['gender'] == "L" ? print("selected") : "" ?>>Laki-laki</option>
                            <option value="P" <?php isset($_SESSION['gender']) && $_SESSION['gender'] == "P" ? print("selected") : "" ?>>Perempuan</option>
                              </select>
                         </div>
                     </div>
                 </div>
                <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                    <input type="text" value="<?php echo $data_siswa['alamat']; ?>" name="alamat" class="form-control" id="alamat">
                    </div>
                </div>
                <div class="form-group-row">
                    <div class="col-md-12">
                    <div class="form-group label-floating">
                         <label class="control-label">Agama</label>
                            <select name="agama" class="form-control">
                            <option value="" disabled selected>-- Pilih Agama --</option>
							<option value="Islam" <?php isset($_SESSION['agama']) && $_SESSION['agama'] == "Islam" ? print("selected") : "" ?>>Islam</option>
                            <option value="Kristen" <?php isset($_SESSION['agama']) && $_SESSION['agama'] == "Kristen" ? print("selected") : "" ?>>Kristen</option>
                            <option value="Hindu" <?php isset($_SESSION['agama']) && $_SESSION['agama'] == "Hindu" ? print("selected") : "" ?>>Hindu</option>
                            <option value="Buddha" <?php isset($_SESSION['agama']) && $_SESSION['agama'] == "Buddha" ? print("selected") : "" ?>>Buddha</option>
                            <option value="Konghuchu" <?php isset($_SESSION['agama']) && $_SESSION['agama'] == "Konghuchu" ? print("selected") : "" ?>>Konghuchu</option>
                              </select>
                         </div>
                     </div>
                 </div>
                <div class="form-group row">
                    <label for="sekolah" class="col-sm-2 col-form-label">Sekolah</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" name="sekolah" id="sekolah"><?php echo $data_siswa['sekolah']; ?></textarea>
                    </div>
                </div>
                <div class="form-group-row">
                    <div class="col-md-12">
                    <div class="form-group label-floating">
                         <label class="control-label">Jurusan</label>
                            <select name="jurusan" class="form-control">
                            <option value="" disabled selected>-- Pilih Jurusan --</option>
							<option value="Tata Boga" <?php isset($_SESSION['jurusan']) && $_SESSION['jurusan'] == "Tata Boga" ? print("selected") : "" ?>>Tata Boga</option>
                            <option value="Tata Busana" <?php isset($_SESSION['jurusan']) && $_SESSION['jurusan'] == "Tata Busana" ? print("selected") : "" ?>>Tata Busana</option>
                            <option value="MMD" <?php isset($_SESSION['jurusan']) && $_SESSION['jurusan'] == "MMD" ? print("selected") : "" ?>>MMD(Multi Media)</option>
                              </select>
                         </div>
                     </div>
                 </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                    <input type="submit" name="tombol_update" class="btn btn-primary" value="Update">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    </body>
</html>
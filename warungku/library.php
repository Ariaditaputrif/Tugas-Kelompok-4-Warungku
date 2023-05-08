<?php
class Library
{
    public function __construct()
    {
        $host = "localhost";
        $dbname = "warung";
        $username = "root";
        $password = "";
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    }
    public function add_data($id_barang, $nama_barang, $keterangan, $satuan)
    {
        $data = $this->db->prepare('INSERT INTO mst_barang (id_barang,nama_barang,keterangan,satuan) VALUES (?, ?, ?,?)');
        
        $data->bindParam(1, $id_barang);
        $data->bindParam(2, $nama_barang);
        $data->bindParam(3, $keterangan);
        $data->bindParam(4, $satuan);

        $data->execute();
        return $data->rowCount();
    }
    public function show()
    {
        $query = $this->db->prepare("SELECT * FROM mst_barang");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function get_by_id($noreg){
        $query = $this->db->prepare("SELECT * FROM mst_barang where id_barang=?");
        $query->bindParam(1, $noreg);
        $query->execute();
        return $query->fetch();
    }

    public function update($id_barang, $nama_barang, $keterangan, $satuan)
    {
        $query = $this->db->prepare('UPDATE mst_barang set nama_barang=?,keterangan=?,satuan=? where id_barang=?');
        
        $query->bindParam(1, $id_barang);
        $query->bindParam(2, $nama_barang);
        $query->bindParam(3, $keterangan);
        $query->bindParam(4, $satuan);


        $query->execute();
        return $query->rowCount();
    }

    public function delete($id_barang)
    {
        $query = $this->db->prepare("DELETE FROM mst_barang where id_barang=?");
        $query->bindParam(1, $id_barang);

        $query->execute();
        return $query->rowCount();
    }  

}
?>
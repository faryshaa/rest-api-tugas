<?php
    //Koneksi ke database mysql
    include "conn.php";

    //Mendapatkan variabel post
    $nama_pegawai = isset($_POST["nama"]) ? $_POST["nama"] : "";
    //echo $nama_pegawai;
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : "";
    //echo $alamat;
    $nik = isset($_POST['nik']) ? $_POST['nik'] : "";

    //Query menambahkan data
    $sql = "INSERT INTO 'pegawai' ('id_pegawai', 'nama_pegawai', 'nik', 'alamat') 
    VALUES ('".$nama_pegawai."', '".$nik."', '".$alamat."');";
    echo $sql;

    //Running Query
    $query = mysqli_query($conn, $sql);
    if($query){
        $msg = "Simpan data pegawai berhasil";
    }else{
        $msg = "Simpan data pegawai gagal";
    }

    //echo $msg;
    //echo 'test';
    $response = array(
        'status'=>'OK',
        'msg'=>$msg
    );
?>
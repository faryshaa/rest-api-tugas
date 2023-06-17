<?php
    //koneksi ke database mysql
    include "conn.php";

    //Membuat query/sql untuk mengambil seluruh data pegawai
    $sql = "SELECT * FROM pegawai";
    $query = mysqli_query($conn, $sql);
    while($data = mysqli_fetch_array($query)){
        //echo $data["nama_pegawai"]." ";

        $item[] = array(
            'nama'=>$data["nama_pegawai"],
            'nik'=>$data["nik"],
            'alamat'=>$data["alamat"],
            'id'=>$data["id_pegawai"]
        );
    }

    $response = array(
        'status'=>'OK',
        'data'=>$item
    );

    echo json_encode($response);
?>
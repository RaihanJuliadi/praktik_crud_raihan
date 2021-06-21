<?php
    $conn = mysqli_connect("localhost", "root", "", "siswasma" );

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }

function tambah($data){
    global $conn;

    $NIS = htmlspecialchars($data["NIS"]);
    $Nama = htmlspecialchars($data["Nama"]);
    $Email = htmlspecialchars($data["Email"]);
    $Jurusan = htmlspecialchars($data["Jurusan"]);
    $Gambar = htmlspecialchars($data["Gambar"]);

    $query = "INSERT INTO siswa_sma
    VALUES
    ('', '$NIS', '$Nama', '$Email', '$Jurusan', '$Gambar')
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($Id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa_sma WHERE Id = $Id");
    return mysqli_affected_rows($conn);
}

function ubah($data, $Id){
global $conn;


    $NIS = htmlspecialchars($data["NIS"]);
    $Nama = htmlspecialchars($data["Nama"]);
    $Email = htmlspecialchars($data["Email"]);
    $Jurusan = htmlspecialchars($data["Jurusan"]);
    $Gambar = htmlspecialchars($data["Gambar"]);

    $query = "UPDATE siswa_sma SET 
                NIS = '$NIS', 
                Nama = '$Nama', 
                Email = '$Email', 
                Jurusan = '$Jurusan', 
                Gambar = '$Gambar'
            WHERE Id = $Id
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function cari($keyword) {
    $query = "SELECT * FROM siswa_sma
                WHERE
                nama LIKE '%$keyword%' OR
                NIS LIKE '%$keyword%' 
                
                ";
    return query($query);
}




?>
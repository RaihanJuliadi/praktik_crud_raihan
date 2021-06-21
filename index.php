<?php

require 'functions.php';
$siswa_sma = query("SELECT * FROM siswa_sma");

if (isset($_POST["cari"]) ) {
    $siswa_sma = cari($_POST["keyword"]);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Halaman admin</title>
</head>
<body>

<h1> Daftar siswa </h1>

<a href="tambah.php">Tambah data siswa</a>
<br><br>

<form action="" method="post">

    <input type="text" name="keyword" size="50" autofocus
    placeholder="masukan keyword pencarian.." autocomplete="off">
    <button type="submit" name="cari">Cari</button>
</form>

<br>
<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No.</th>
        <th>Foto</th>
        <th>NIS</th>
        <th>NAMA</th>
        <th>E-mail</th>
        <th>Jurusan</th>
        <th>Aksi</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach( $siswa_sma as $row ) : ?>
    <tr>
        <td> <?= $i ?> </td>

        <td> <img src="asset/profile.png" width="50"> </td>
        <td> <?= $row["NIS"]; ?> </td>
        <td> <?= $row["Nama"]; ?> </td>
        <td> <?= $row["Email"]; ?> </td>
        <td> <?= $row["Jurusan"]; ?> </td>
        <td>
            <a href="ubah.php?Id=<?= $row["Id"]; ?>">ubah</a> / 
            <a href="hapus.php?Id=<?= $row["Id"]; ?>" onclick="
            return confirm('Yakin anda ingin menghapus?');">hapus</a>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</body>
</html>
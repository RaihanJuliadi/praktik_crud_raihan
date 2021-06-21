<?php
require 'functions.php';

$Id = $_GET["Id"];

$sws = query("SELECT * FROM siswa_sma WHERE Id = $Id")[0];




if( isset($_POST["submit"]) ) {

        if( ubah($_POST, $Id)>0){
            echo "
                <script>
                    alert('data berhasil diupdate!');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
            <script>
                alert('data gagal diupdate!');
                document.location.href = 'index.php';
            </script>
        ";
          
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update data siswa</title>
</head>
<body>
    <h1> Update data siswa</h1>

    <form action="" method="post">
        <input type="hidden" name="Id" value="<?= $sws["Id"]; ?>">
        <ul>
            <li>
                <label for="NIS">NIS : </label>
                <input type="text" name="NIS" id="NIS" required
                value="<?= $sws["NIS"]; ?>">
            </li>
             <li>
                <label for="Nama">Nama : </label>
                <input type="text" name="Nama" id="Nama"
                value="<?= $sws["Nama"]; ?>">
            </li>
            <li>
                <label for="Email">Email : </label>
                <input type="text" name="Email" id="Email"
                value="<?= $sws["Email"]; ?>">
            </li>
            <li>
                <label for="Jurusan">Jurusan : </label>
                <input type="text" name="Jurusan" id="Jurusan"
                value="<?= $sws["Jurusan"]; ?>">
            </li>
            <li>
                <label for="Gambar">Gambar : </label>
                <input type="text" name="Gambar" id="Gambar"
                value="<?= $sws["Gambar"]; ?>">
            </li>
            <li>
               <button type="submit" name="submit">Update Data </butto>
            </li>
        </ul>

    </form>
</body>
</html>
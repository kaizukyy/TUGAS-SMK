<?php 
    include 'koneksi.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Peserta</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <script>
        window.print();
    </script>
</head>
<body>

    <h2>Laporan Calon Siswa</h2><br><br>
    <table class="table" border="1">
                <thead>
                    <tr>
                         <th>No</th>
                         <th>ID Pendaftaran</th>
                         <th>Tahun Ajaran</th>
                         <th>Jurusan</th>
                         <th>Nama</th>
                         <th>Tempat, Tanggal Lahir</th>
                         <th>Jenis Kelamin</th>
                         <th>Agama</th>
                         <th>Alamat</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        $list_peserta = mysqli_query($conn, "SELECT * FROM tb_pendaftaran");
                        while($row = mysqli_fetch_array($list_peserta)){
                    ?>
                    <tr>
                         <td><?php echo $no++ ?></td>
                         <td><?php echo $row['id_pendaftaran'] ?></td>
                         <td><?php echo $row['th_ajaran'] ?></td>
                         <td><?php echo $row['jurusan'] ?></td>
                         <td><?php echo $row['nm_peserta'] ?></td>
                         <td><?php echo $row['tmp_lahir'].', '.$row['tgl_lahir'] ?></td>
                         <td><?php echo $row['jk'] ?></td>
                         <td><?php echo $row['agama'] ?></td>
                         <td><?php echo $row['almt_peserta'] ?></td>
                        >
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
    

</body>
</html>
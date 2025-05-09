<?php 
    include 'koneksi.php';

    if(isset($_POST['submit'])){
        
        // ambil 1 id terbesar di kolom id_pendaftaran, lalu ambil 5 karakter aja dari sebelah kanan
        $getMaxId = mysqli_query($conn, "SELECT MAX(RIGHT(id_pendaftaran, 5)) AS id FROM tb_pendaftaran");
        $d = mysqli_fetch_object($getMaxId);
        $generateId = 'P'.date('Y').sprintf("%05s", $d->id + 1);
        
        //proses insert
        $insert = mysqli_query($conn, "INSERT INTO tb_pendaftaran VALUES (
            '".$generateId."',
            '".date('y-m-d')."',
            '".$_POST['th_ajaran']."',
            '".$_POST['jurusan']."',
            '".$_POST['nm_peserta']."',
            '".$_POST['tmp_lahir']."',
            '".$_POST['tgl_lahir']."',
            '".$_POST['jk']."',
            '".$_POST['agama']."',
            '".$_POST['alamat']."'
            )");

    if($insert){
            echo '<script>window.location="berhasil.php?id='.$generateId.'"</script>';
    }else {
            echo 'aduhh' .mysqli_error($conn);
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSB Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <section class="bg-white shadow-lg rounded-lg p-8 w-full max-w-2xl">
        <h2 class="text-2xl font-bold text-center mb-6">Formulir Pendaftaran Siswa Baru SMK</h2>
        
        <form action="" method="post" class="space-y-4">
            <div>
                <label class="block font-semibold">Tahun Ajaran</label>
                <input type="text" name="th_ajaran" class="w-full border rounded-lg p-2 mt-1" value="2025/2026" readonly>
            </div>
            
            <div>
                <label class="block font-semibold">Jurusan</label>
                <select class="w-full border rounded-lg p-2 mt-1" name="jurusan">
                    <option value="">--Pilih--</option>
                    <option value="Teknik Otomotif">Teknik Otomotif</option>
                    <option value="Teknik Mesin">Teknik Mesin</option>
                    <option value="Teknik Elektronika">Teknik Elektronika</option>
                </select>
            </div>

            <h3 class="text-xl font-bold mt-6">Data Diri Calon Siswa</h3>

            <div>
                <label class="block font-semibold">Nama Lengkap</label>
                <input type="text" name="nm_peserta" class="w-full border rounded-lg p-2 mt-1">
            </div>
            
            <div>
                <label class="block font-semibold">Tempat Lahir</label>
                <input type="text" name="tmp_lahir" class="w-full border rounded-lg p-2 mt-1">
            </div>
            
            <div>
                <label class="block font-semibold">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="w-full border rounded-lg p-2 mt-1">
            </div>
            
            <div>
                <label class="block font-semibold">Jenis Kelamin</label>
                <div class="mt-1">
                    <label class="inline-flex items-center">
                        <input type="radio" name="jenis_kelamin" value="Laki-laki" class="mr-2"> Laki-Laki
                    </label>
                    <label class="inline-flex items-center ml-4">
                        <input type="radio" name="jenis_kelamin" value="Perempuan" class="mr-2"> Perempuan
                    </label>
                </div>
            </div>
            
            <div>
                <label class="block font-semibold">Agama</label>
                <select class="w-full border rounded-lg p-2 mt-1" name="agama">
                    <option value="">--Pilih--</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Kongkucu">Konghucu</option>
                </select>
            </div>
            
            <div>
                <label class="block font-semibold">Alamat Lengkap</label>
                <textarea class="w-full border rounded-lg p-2 mt-1" name="alamat"></textarea>
            </div>
            
            <div class="text-center">
                <input type="submit" name="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 cursor-pointer" value="Daftar Sekarang">
            </div>
        </form>
    </section>
</body>
</html>

<?php
include("koneksi.php"); //pemanggilan file "koneksi.php"
?>

<!doctype html>
<html>
<head>
<title>Insert Data</title>
</head>

<body>

<form method="post"> <!--fungsi untuk menambah tiket-->
<table width = "30%", align = "center", border = "8", bgcolor = "cyan">
<tr>
<td bgcolor = "red" colspan = "3" align = "center" ><h1>Insert Data<h1></td>
</tr>
<tr>
<td>Nama Pemesan</td>
<td>:</td>
<td><input type="text" name="nama_pemesan" autofocus required placeholder = "Ketikan Nama Pemesan"/></td>
</tr>
<tr>
<td>Alamat Pemesan</td>
<td>:</td>
<td><input type="text" name="alamat_pemesan" autofocus required placeholder = "Ketikan Alamat Pemesan"/></td>
</tr>
<tr>
<td>Tanggal Pesan</td>
<td>:</td>
<td><input type="date" name="tanggal_pesan" required/></td>
</tr>
<tr>
<td>Jenis Tiket</td>
<td>:</td>
<td>
<input type = "radio" name = "jenis_kereta" value="Ekonomi">Ekonomi<br/>
<input type = "radio" name = "jenis_kereta" value="Executive">Executive
</td>
</tr>
<tr>
<td>Kota Tujuan</td>
<td>:</td>
<td><input type="text" name="tujuan" autofocus required placeholder = "Ketikan Kota Tujuan"/></td>
</tr>
<tr>
<td>Tanggal Berangkat</td>
<td>:</td>
<td><input type="date" name="tanggal_operasi" /></td>
</tr>
<tr>
<td>Waktu Berangkat</td>
<td>:</td>
<td><input type="time" name="tanggal_operasi" /></td>
</tr>
<tr>
<td align = "center" colspan = "3" ><input type="submit" name="submit"/></td>
</tr>
</table>
<?php
if (isset($_POST['submit'])){ //isset untuk menyatakan variable sudah diset atau tidak // memberikan action pada button submit
$nama_pemesan = $_POST['nama_pemesan'];
$alamat_pemesan = $_POST['alamat_pemesan'];
$tanggal_pesan = $_POST['tanggal_pesan'];
$jenis_kereta = $_POST['jenis_kereta'];
$tujuan = $_POST['tujuan'];
$tanggal_operasi = $_POST['tanggal_operasi'];
$waktu_operasi = $_POST['waktu_operasi'];

$insertkereta = "INSERT INTO kereta (nama_pemesan, alamat_pemesan, tanggal_pesan, jenis_kereta, tujuan, tanggal_operasi, waktu_operasi)values
('$nama_pemesan','$alamat_pemesan','$tanggal_pesan','$jenis_kereta','$tujuan','$tanggal_operasi','$waktu_operasi')"; // query database untuk insert data ke database
mysql_query($insertkereta) or die ('Error!!'.mysql_error()); // pemberitahuan terjadi error bahwa gagal menambahkan data
echo"<script>window.location.href='indek.php';</script>"; // fungsi untuk mengembalikan secara otomatis ke halaman indek.php
exit; // exit halaman
}
?>
</form>
</body>
</html>


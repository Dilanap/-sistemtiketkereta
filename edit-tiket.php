<?php
include ("koneksi.php"); //pemanggilan file "koneksi.php"
$id_tiket = $_GET['id_tiket']; //variabel untuk memanggil id_buku
?>

<!Doctype HTML>
<html>		
<head>
<title>Update Data</title>
</head>

<body>
<form method = "post" border = '1'>
<?php
$selectkereta = "SELECT * FROM kereta WHERE id_tiket=$id_tiket"; // variabel untuk memanggil query select dari database
$resultselectkereta = mysql_query($selectkereta) or die ('Error, load data ticket failed.' . mysql_error()); // pemberitahuan terjadi error jika kesalahan membuka data
$rowedit = mysql_fetch_assoc($resultselectkereta);
?>

<table width='30%' border = "8", align = "center", bgcolor = "#f0f0f0"> <!--membuat tabel edit data-->
<tr>
<td bgcolor = "#b4b4b4" colspan = "3" align = "center" ><h1>Update Data<h1></td>
</tr>
<tr>
<td>Nama Pemesan</td>
<td> : </td>
<td><input type="text" name = "nama" value ="<?php echo $rowedit['nama_pemesan']; ?>" autofocus required placeholder = "Ketikan Nama Pemesan"/></td>
</tr>
<tr>
<td>Alamat Pemesan</td>
<td>:</td>
<td><input type="text" name = "alamat" value ="<?php echo $rowedit['alamat_pemesan']; ?>" autofocus required placeholder = "Ketikan Alamat Pemesan"/></td>
</tr>
<tr>
<td>Tanggal Pesan</td>
<td>:</td>
<td><input type="date" name = "pesan" value ="<?php echo $rowedit['tanggal_pesan']; ?>" /></td>
</tr>
<tr>
<td>Jenis Tiket</td>
<td>:</td>
<td>
<input type = "radio" name = "jenis" value="Ekonomi">Ekonomi<br/>
<input type = "radio" name = "jenis" value="Executive">Executive
</td>
</tr>
<tr>
<td>Kota Tujuan</td>
<td>:</td>
<td><input type="text" name = "tujuan" value ="<?php echo $rowedit['tujuan']; ?>" autofocus required placeholder = "Ketikan Kota Tujuan"/></td>
</tr>
<tr>
<td>Tanggal Berangkat</td>
<td>:</td>
<td><input type="date" name = "tanggal" value ="<?php echo $rowedit['tanggal_operasi']; ?>" /></td>
</tr>
<tr>
<td>Waktu Berangkat</td>
<td>:</td>
<td><input type="time" name = "waktu" value ="<?php echo $rowedit['waktu_operasi']; ?>" /></td>
</tr>
<tr>
<td colspan = "3" align = "center"><input type = "submit" name ="submit"/></td>
</tr>
</table>

<?php
if(isset($_POST['submit'])){ //isset untuk menyatakan variable sudah diset atau tidak // memberikan action pada button submit
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$pesan = $_POST['pesan'];
$jenis = $_POST['jenis'];
$tujuan = $_POST['tujuan'];
$tanggal = $_POST['tanggal'];
$waktu = $_POST['waktu'];

$editkereta = "UPDATE kereta SET nama_pemesan='$nama', alamat_pemesan='$alamat', tanggal_pesan = '$pesan',
jenis_kereta = '$jenis', tujuan = '$tujuan', tanggal_operasi = '$tanggal', waktu_operasi = '$waktu'
WHERE id_tiket='$id_tiket'"; // membuat query edit data ke database
mysql_query($editkereta) or die ('Error!!'.mysql_error()); // pemberitahuan terjadi error jika salah mengedit data
echo "<script>window.location.href='indek.php';</script>"; // fungsi untuk mengembalikan secara otomatis ke halaman indek.php
exit; // keluar halaman
}
?>
</form>
</body>
</html>


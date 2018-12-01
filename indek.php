<html>
 <head>
 <title>Pemesanan Tiket KA</title> <!--memberikan judul HTML-->
 </head>
 <body bgcolor="f0f0f0">
 <h1 align = "center">PT. Kereta Api Indonesia Persero.tbk</h1>

 <table align = "center", border = "2">
 <tr>
 <td align = 'center'><a href='tambah-tiket.php?id_tiket=$id_tiket'>Tambah Pemesan</a></td> <!--memberikan link untuk menambah pemesan tiket-->
 </tr>
 </table>

</html>
 <script language="javascript" type="text/javascript"> <!--Script javascript-->
 function deleteKereta(id_tiket){ <!--fungsi untuk menghapus kolom pemesan tiket-->
 if (confirm('Are you sure to delete this Ticket?')) { window.location.href = '?delete&id_tiket=' + id_tiket;
 } <!--mengkonfirmasikan apakah yakin mau hapus atau tidak-->
 }
 </script>

<?php

 include("koneksi.php"); //pemanggilan file "koneksi.php"

 if(isset($_GET['delete']) && isset($_GET['id_tiket'])){ // fungsi isset untuk menyatakan variable sudah diset atau tidak
 $sqldelete = 'DELETE FROM kereta WHERE id_tiket="'.$_GET['id_tiket'].'"';
 mysql_query($sqldelete) or die('Delete kereta failed. ' . mysql_error()); // pemberitahuan bahwa delete gagal
 echo "<script>window.location.href='indek.php';</script>";
 }

 $selectkereta = 'select *from kereta order by id_tiket asc'; // variabel untuk memanggil query select ke database
 $resultselectkereta = mysql_query($selectkereta) or die ('error, load data kereta failed.'.mysql_error()); // pemberitahuan error bahwa gagal membuka data

 if(mysql_num_rows($resultselectkereta)==0){echo "Data tidak tersedia";} // pengeccekan ketersediaan data

 else {
 echo "<table width='75%' align = 'center' border = '10'>
 <br></br>
 <td height = '40' colspan = '10' align = 'center' bgcolor = 'red'><font size = '5'><strong>Daftar Pemesanan Tiket Kereta Api</strong></td>
 <tr height = '30' >
 <td align = 'center' bgcolor = 'white'= 'center'>Nomor Tiket</td>
 <td align = 'center' bgcolor = 'white'= 'center'>Nama Pemesan</td>
 <td align = 'center' bgcolor = 'white'= 'center'>Alamat Pemesan</td>
 <td align = 'center' bgcolor = 'white'= 'center'>Tanggal Pesan</td>
 <td align = 'center' bgcolor = 'white'= 'center'>Jenis Tiket</td>
 <td align = 'center' bgcolor = 'white'= 'center'>Kota Tujuan</td>
 <td align = 'center' bgcolor = 'white'= 'center'>Tanggal Berangkat</td>
 <td align = 'center' bgcolor = 'white'= 'center'>Waktu</td>
 <td align = 'center' bgcolor = 'white'= 'center' colspan = '2'>Action</td>
 </tr>";
 while($row = mysql_fetch_array($resultselectkereta)){ // mysql_fetch_array : fungsi untuk menyimpan data menjadi array
 extract($row); // extract() : mengkonversi nama array menjadi variabel
 echo
 "<tr>
 <td align = 'center' bgcolor = 'silver'>".$id_tiket."</td>
 <td align = 'center' bgcolor = 'silver'>".$nama_pemesan."</td>
 <td align = 'center' bgcolor = 'silver'>".$alamat_pemesan."</td>
 <td align = 'center' bgcolor = 'silver'>".$tanggal_pesan."</td>
 <td align = 'center' bgcolor = 'silver'>".$jenis_kereta."</td>
 <td align = 'center' bgcolor = 'silver'>".$tujuan."</td>
 <td align = 'center' bgcolor = 'silver'>".$tanggal_operasi."</td>
 <td align = 'center' bgcolor = 'silver'>".$waktu_operasi."</td>
 <td align = 'center' bgcolor = 'silver'><a href='edit-tiket.php?id_tiket=$id_tiket'>Update</a></td> <!-- memberikan link untuk mengedit data tiket-->
 <td align = 'center' bgcolor = 'silver'><a href=javascript:deleteKereta($id_tiket)>Delete</a></td> <!-- memberikan link untuk menghapus data tiket-->
 </tr>";
 }
 echo "</table>";
 }
?>
 </body>
</html>

 

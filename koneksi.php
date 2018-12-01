<!DocTYPE html>

<html>
 <?php

 // membuat koneksi ke database
 $servername= "localhost"; // nama server
 $username = "root"; // nama user
 $password = ""; // password
 $databasename = "web_kereta"; // nama database

 $db = mysql_connect("$servername","$username","$password") or die ("I cannot connect to the database because: ".mysql_error());
 //membuat koneksi ke mysql_affected_rows

 mysql_select_db("$databasename",$db) or die ("I cannot select the database '$databasename' because: ".mysql_error());
 //memanggil nama database
 ?>
</html>

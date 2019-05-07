<?php
	include("connect.php");
 	error_reporting(0);
?>

<br>
<style>
    body{background: url('https://s2.ax1x.com/2019/04/07/Af66K0.jpg') no-repeat fixed center left / cover !important;}
</style>
<br><br><br><br><br><br><br><br>

<?php
  	$sql="select * from shipment where confnumber='{$_GET[id]}'";
    $sql2="select * from reader where id='{$_GET[reader]}'";
    $query=$dbh->query($sql);
    $query2=$dbh->query($sql2);
    $row=$query->fetch();
    $row2=$query2->fetch();
    echo "<table width=\"50%\" height=\"45%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">";
  	echo "	<tr align=\"center\"><td>Confirmation number：</td><td>{$row[7]}</td></tr>
  			<tr align=\"center\"><td>Book ISBN：</td><td>{$row[3]}</td></tr>
  			<tr align=\"center\"><td>Publisher ID：</td><td>{$row[0]}</td></tr>
  			<tr align=\"center\"><td>Branch：</td><td>{$row[1]}</td></tr>
        <tr align=\"center\"><td>Date：</td><td>{$row[2]}</td></tr>
        <tr align=\"center\"><td>Receiver name：</td><td>{$row2[1]}</td></tr>
        <tr align=\"center\"><td>Address：</td><td>{$row2[6]}</td></tr>
        <tr align=\"center\"><td>Email：</td><td>{$row2[5]}</td></tr>
        <tr align=\"center\"><td>Phone：</td><td>{$row2[3]}</td></tr> ";

  	echo "</table>";
  	if($_GET[type1]=="list")
  		echo "<p align=\"center\" ><a href='shipment.php?page=1'>
  			<img src=\"img/return1.gif\" border=\"0\" height=\"25px\" width=\"70px\"/></a></p>";
  	else echo "<p align=\"center\" ><a href='main.php'>
  			<img src=\"img/return1.gif\" border=\"0\" height=\"25px\" width=\"70px\"/></a></p>";
 ?>
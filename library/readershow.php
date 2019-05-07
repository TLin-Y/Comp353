<?php
	include("connect.php");
 	error_reporting(0);
?>

<br>
<style>
	img{  
	    width: auto;  
	    height: auto;  
	    max-width: 100%;  
	    max-height: 100%;     
	}
</style>

<?php
  	$sql="select * from reader where id='{$_GET[id]}'";
    $query=$dbh->query($sql);
    $row=$query->fetch();
    echo "<table width=\"50%\" height=\"65%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">";
  	echo "	<tr align=\"center\"><td>ID：</td><td>{$row[0]}</td></tr>
  			<tr align=\"center\"><td>Name：</td><td>{$row[1]}</td></tr>
  			<tr align=\"center\"><td>gender：</td><td>{$row[2]}</td></tr>
  			<tr align=\"center\"><td>Phone：</td><td>{$row[3]}</td></tr>
        <tr align=\"center\"><td>Email：</td><td>{$row[5]}</td></tr>
        <tr align=\"center\"><td>Address：</td><td>{$row[6]}</td></tr>
  			<tr align=\"center\"><td>Photo：</td><td><img src=\"{$row[4]}\" alt=\"{$row[1]}\" /></td></tr>";
  	echo "</table>";

  	if($_GET[type1]=="list")
  		echo "<p align=\"center\" ><a href='reader.php?page=1'>
  			<img src=\"img/return1.gif\" border=\"0\" height=\"25px\" width=\"70px\"/></a></p>";
  	else echo "<p align=\"center\" ><a href='main.php'>
  			<img src=\"img/return1.gif\" border=\"0\" height=\"25px\" width=\"70px\"/></a></p>";

    if($_GET[type2]=="show"){
      $sql2="select * from sale where customer = '{$_GET[name]}' ";
      $query2 = $dbh->query($sql2);
      echo "<table align=\"center\" border=\"1\" width=\"400px\">";
      echo "  <tr><th>$_GET[name] shopping history</th></tr>";
      while ($row2=$query2->fetch()) {
              echo "<tr><td>Date:$row2[1]  ISBN:$row2[4]  Quantity:$row2[5]  Price:$row2[6]</td></tr>";
      }
    }
 ?>
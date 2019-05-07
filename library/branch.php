<?php
	include("connect.php");
	$pageNum=10;
	error_reporting(0);
?>
<style>
	tr{ text-align: center; }
	a{text-decoration:none;color:#000}
	a:hover{color:#f00}
		body{background: url('https://s2.ax1x.com/2019/04/07/Af1pTO.jpg') no-repeat fixed center left / cover !important;}
</style>

<?php 
	echo "<br><br><br>";
	$sql="select * from branch ";
  	$query = $dbh->query($sql);
	echo "<table align=\"center\" border=\"1\" width=\"1000px\">";
	echo "	<tr>
				<th>Branch</th><th>Manager</th><th>PublisherID</th><th>Phone</th><th>Email</th><th>Address</th><th>Operate</th>
			</tr>";
	while ($row=$query->fetch()) {
		echo "	<tr>
					<td width=\"150px\">$row[0]</td>
					<td width=\"150px\">$row[1]</td>
					<td width=\"150px\">$row[2]</td>
					<td width=\"150px\">$row[3]</td>
					<td width=\"150px\">$row[4]</td>
					<td width=\"150px\">$row[5]</td>
					
					<td width=\"150px\">
						<a href=\"branch.php?branch={$row[0]}&type1=show\">Check order</a>&nbsp;&nbsp;&nbsp;
						<a href=\"branch.php\">Hide order</a>
						<a href=\"branchadd.php?id={$row[2]}&type=del\">Delete</a>&nbsp;&nbsp;&nbsp;
					</td>
				</tr>";
	}
	echo "</table>";

	if($_GET[type1]=="show"){
		$sql="SELECT onumber FROM orderbranch WHERE branch='{$_GET[branch]}'";
  		$query = $dbh->query($sql);
  		echo "<table align=\"center\" border=\"1\" width=\"300px\">";
  		echo "	<tr><th>$_GET[branch]</th></tr>";
  		while ($row=$query->fetch()) {
		echo "	<tr>					
					<td>
						<a href=\"Order.php?page=1\">Order number:</a>
					</td>
					<td width=\"150px\">$row[0]</td>
					

				</tr>";
	}

	}


 ?>
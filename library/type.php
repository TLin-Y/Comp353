<?php
	include("connect.php");
	$pageNum=10;
	error_reporting(0);
?>
<style>
	tr{ text-align: center; }
	a{text-decoration:none;color:#000}
	a:hover{color:#f00}
		body{background: url('https://s2.ax1x.com/2019/04/06/AWdEkt.jpg') no-repeat fixed center left / cover !important;}
</style>

<?php 
	echo "<br><br><br>";
	$sql="select * from type ";
  	$query = $dbh->query($sql);
	echo "<table align=\"center\" border=\"1\" width=\"400px\">";
	echo "	<tr>
				<th>Number</th><th>Publisher</th><th>Branch</th><th>Phone</th><th>Email</th><th>Address</th><th>Operate</th>
			</tr>";
	while ($row=$query->fetch()) {
		echo "	<tr>
					<td width=\"150px\">$row[0]</td>
					<td width=\"150px\">$row[1]</td>
					<td width=\"150px\">$row[3]</td>
					<td width=\"150px\">$row[4]</td>
					<td width=\"150px\">$row[5]</td>
					<td width=\"150px\">$row[6]</td>
					
					<td>
						<a href=\"type.php?type={$row[1]}&type1=show\">Check</a>&nbsp;&nbsp;&nbsp;
						<a href=\"type.php\">Hide</a>
						<a href=\"typeadd.php?id={$row[0]}&type=del\">Delete</a>&nbsp;&nbsp;&nbsp;
					</td>
				</tr>";
	}
	echo "</table>";

	if($_GET[type1]=="show"){
		$sql="select title from book where type='{$_GET[type]}' ";
  		$query = $dbh->query($sql);
  		echo "<table align=\"center\" border=\"1\" width=\"400px\">";
  		echo "	<tr><th>$_GET[type]</th></tr>";
  		while ($row=$query->fetch()) {
  			$s="select id from book where title='{$row[0]}' ";
  			$q = $dbh->query($s);
  			$id = $q->fetch();
  			echo "<tr><td><a href=\"bookshow.php?id={$id[0]}&type1=typeshow\">$row[0]</a></td></tr>";
  		}
  		
	}
 ?>
<?php
	include("connect.php");
	error_reporting(0);
?>
<style type="text/css">
	.title{font-family: verdana, tahoma, sans-serif;FONT-SIZE: 12px;font-weight:bold}
	body{background: url('https://s2.ax1x.com/2019/04/06/AWdplD.jpg') no-repeat fixed center left / cover !important;}
	.STYLE1 {
		font-size: 24px;
		font-weight: bold;
	}
	a{text-decoration:none;color:#000}
	a:hover{color:#f00}
	/*a:visited{color:#03f}*/
</style>
<body>
	<br><br><br><br><br><br><br><br>
	<table width="80%"  border="1" cellspacing="0" cellpadding="0" align="center" class="title">
	  <tr>
	    <th colspan="6"><p align="center" class="STYLE1">Employee&nbsp;&nbsp;</p></th>
	  </tr>
	  <tr>
	    <th width="9%"><div align="center">ID Number</div></th>
	    <th width="14%"><div align="center">Name</div></th>
	    <th width="17%"><div align="center">SSN</div></th>
	    <th width="14%"><div align="center">Email</div></th>
	    <th width="14%"><div align="center">Phone</div></th>
	    <th width="10%"><div align="center">Operate</div></th>
	  </tr>
	  <?php
	  		$sql="SELECT id, name, SSN, email, phone FROM login";
			$query=$dbh->query($sql);
			while($row=$query->fetch())
				{
					if(!$a)
					{
						$a="a";
					}
					else
					{
						$a="";
					}
					echo "<tr class=\"{$a}\">
								
								<td>
									<div align=\"center\">{$row[0]}</div>
								</td>
								<td>
									<div align=\"center\">{$row[1]}</div>
								</td>
								<td>
									<div align=\"center\">{$row[2]}</div>
								</td>
								<td>
									<div align=\"center\">{$row[3]}</div>
								</td>
								<td>
									<div align=\"center\">{$row[4]}</div>
								</td>

						<td>
							<div align=\"center\">
								<a href=\"employee.php?name={$row[1]}&type1=show\">Sale</a>&nbsp;&nbsp;&nbsp;
								<a href=\"employeeresult.php?id={$row[0]}&type=del\">Delete</a>&nbsp;&nbsp;&nbsp;
							</div>
						</td>


						</tr>";
				}
		if($_GET[type1]=="show"){
		$sql="select * from sale where employee='{$_GET[name]}' ";
  		$query = $dbh->query($sql);
  		echo "<table align=\"center\" border=\"1\" width=\"400px\">";
  		echo "	<tr><th>$_GET[name] Sale history</th></tr>";
  		while ($row=$query->fetch()) {
  			$s="select snumber from sale where SSN='{$row[0]}' ";
  			$q = $dbh->query($s);
  			$id = $q->fetch();
  			echo "<tr><td><a href=\"employeeshow.php?id={$id[0]}&type1=typeshow\">Date:$row[1]  ISBN:$row[4]  Quantity:$row[5]  Price:$row[6]</a></td></tr>";
  		}
  		
	}
	    ?>
		<tr>
			<td colspan="6" align="center"></td>
		</tr>
	</table>
	<br>

</body>

<?php
	include("connect.php");
	$pageNum=5;
	error_reporting(0);
?>


<style type="text/css">
	.title{font-family: verdana, tahoma, sans-serif;FONT-SIZE: 12px;font-weight:bold}
	body{background: url('https://s2.ax1x.com/2019/04/06/AWaWoq.jpg') no-repeat fixed center left / cover !important;}
	.STYLE1 {
		font-size: 24px;
		font-weight: bold;
	}
	a{text-decoration:none;color:#000}
	a:hover{color:#f00}
</style>
<body>
	<br><br><br><br><br><br><br><br>
	<table width="90%"  border="1" cellspacing="0" cellpadding="0" align="center" class="title">
	  <tr>
	    <th colspan="7"><p align="center" class="STYLE1">Reader&nbsp;&nbsp;</p></th>
	  </tr>
	  <tr>
	  	<th width="20%"><div align="center">ID</div></th>
	    <th width="10%"><div align="center">Name</div></th>
	    <th width="10%"><div align="center">Gender</div></th>
	    <th width="10%"><div align="center">Phone</div></th>
	    <th width="15%"><div align="center">Email</div></th>
	    <th width="20%"><div align="center">Address</div></th>
	  </tr>
	  <?php
	  		$sql="SELECT * FROM reader where name='reader'";
			$query=$dbh->query($sql);
			while($row=$query->fetch())
			{
				echo "<tr>
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
							<div align=\"center\">{$row[5]}</div>
						</td>
						<td>
							<div align=\"center\">{$row[6]}</div>
						</td>
					</tr>";
			}
	    ?>
		<tr>
			<td colspan="7" align="center"></td>
		</tr>
	</table>
	<br>
	
</body>

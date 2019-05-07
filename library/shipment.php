<?php
	include("connect.php");
	$pageNum=5;
	error_reporting(0);
?>
<style type="text/css">
	.title{font-family: verdana, tahoma, sans-serif;FONT-SIZE: 12px;font-weight:bold}
	body{background: url('https://s2.ax1x.com/2019/04/07/Af66K0.jpg') no-repeat fixed center left / cover !important;}
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
	    <th colspan="9"><p align="center" class="STYLE1">Shipment history&nbsp;&nbsp;</p></th>
	  </tr>
	  <tr>
	  	<th width="15%"><div align="center">Confirmation number</div></th>
	    <th width="10%"><div align="center">Publisher number</div></th>
	    <th width="10%"><div align="center">Branch</div></th>
	    <th width="10%"><div align="center">date</div></th>
	    <th width="5%"><div align="center">Book ISBN</div></th>
	    <th width="10%"><div align="center">Quantity</div></th>
	    <th width="10%"><div align="center">SSN</div></th>
	    <th width="10%"><div align="center">Reader ID</div></th>
	    <th width="10%"><div align="center">Operate</div></th>

	  </tr>
	  <?php
	  		$offset=($_GET[page]-1)*$pageNum;
	  		$sql="SELECT * FROM shipment LIMIT {$offset} , {$pageNum} ";
			$query=$dbh->query($sql);
			while($row=$query->fetch())
			{
				echo "<tr>
						<td>
							<div align=\"center\">{$row[7]}</div>
						</td>
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
							<div align=\"center\">{$row[5]}</div>
						</td>
						<td>
							<div align=\"center\">{$row[6]}</div>
						</td>
						<td>
							<div align=\"center\"> 
								<a href=\"shipmentshow.php?id={$row[7]}&reader={$row[6]}&type1=list\">Detial</a>&nbsp;&nbsp;&nbsp;
								<a href=\"shipmentadd.php?cnumber={$row[7]}&ISBN={$row[3]}&quantity={$row[4]}&type=del\">Delete</a>&nbsp;&nbsp;&nbsp;

							</div>
						</td>
					</tr>";
			}
	    ?>
		<tr>
			<td colspan="9" align="center"></td>
		</tr>
	</table>
	<br>
	<p class="title" align="center">Current Page
	<?php 
	echo "{$_GET[page]}";
	 ?>/
	<?php
		$sql="select count(*) from shipment";
		$query=$dbh->query($sql);
		$row=$query->fetch();
		$total=ceil($row[0]/$pageNum);
		echo $total;

		if($_GET[page]>1){
			echo "<a href='shipment.php?page=1'>Top</a>&nbsp;";
			echo "<a href='shipment.php?page=".($_GET[page]-1)."'>Prev</a>&nbsp;";
		}
		if ($_GET[page]<$total) {
			echo "<a href='shipment.php?page=".($_GET[page]+1)."'>Next</a>&nbsp;";
			echo "<a href='shipment.php?page=$total'>End</a>&nbsp;";
		}
		?>
	<?php
		for($i=1;$i<=$total;$i++)
		{
			echo "<a href='shipment.php?page={$i}'>[{$i}]</a>&nbsp;";
		}
	?>
	</p>
</body>

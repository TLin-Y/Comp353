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
	    <th width="5%"><div align="center">Operation</div></th>
	  </tr>
	  <?php
	  		$offset=($_GET[page]-1)*$pageNum;
	  		$sql="SELECT * FROM reader LIMIT {$offset} , {$pageNum} ";
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
						<td>
							<div align=\"center\">
								<a href=\"readershow.php?id={$row[0]}&name={$row[1]}&type1=list&type2=show\">Detial</a>&nbsp;&nbsp;&nbsp;
								<a href=\"readerresult.php?id={$row[0]}&type=del\">Delete</a>&nbsp;&nbsp;&nbsp;
								<a href=\"readeredit.php?id={$row[0]}&type=edit\">Modify</a>
							</div>
						</td>
					</tr>";
			}

	    ?>

		<tr>
			<td colspan="7" align="center"></td>
		</tr>
	</table>
	<br>
	<p class="title" align="center">Current Page
	<?php 
	echo "{$_GET[page]}";
	 ?>/
	<?php
		$sql="select count(*) from reader";
		$query=$dbh->query($sql);
		$row=$query->fetch();
		$total=ceil($row[0]/$pageNum);
		echo $total;

		if($_GET[page]>1){
			echo "<a href='reader.php?page=1'>Top</a>&nbsp;";
			echo "<a href='reader.php?page=".($_GET[page]-1)."'>Prev</a>&nbsp;";
		}
		if ($_GET[page]<$total) {
			echo "<a href='reader.php?page=".($_GET[page]+1)."'>Next</a>&nbsp;";
			echo "<a href='reader.php?page=$total'>End</a>&nbsp;";
		}
		?>
	<?php
		for($i=1;$i<=$total;$i++)
		{
			echo "<a href='reader.php?page={$i}'>[{$i}]</a>&nbsp;";
		}

	?>
	</p>
</body>

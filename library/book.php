<?php
	include("connect.php");
	$pageNum=5;
	error_reporting(0);
?>
<style type="text/css">
	.title{font-family: verdana, tahoma, sans-serif;FONT-SIZE: 12px;font-weight:bold}
	body{background: url('https://s2.ax1x.com/2019/04/06/AWa4YV.jpg') no-repeat fixed center left / cover !important;}
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
	    <th colspan="3"><p align="center" class="STYLE1">Book&nbsp;&nbsp;</p></th>
	  </tr>
	  <tr>
	    <th width="9%"><div align="center">ISBN Number</div></th>
	    <th width="74%"><div align="center">Title</div></th>
	    <th width="17%"><div align="center">Operate</div></th>
	  </tr>
	  <?php
	  		$offset=($_GET[page]-1)*$pageNum;
	  		$sql="SELECT id, title FROM book LIMIT {$offset} , {$pageNum} ";
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
							<div align=\"center\">
								<a href=\"bookshow.php?id={$row[0]}&type1=list&page1={$_GET[page]}\">《{$row[1]}》</a>
							</div>
						</td>
						<td>
							<div align=\"center\">
								<a href=\"bookresult.php?id={$row[0]}&type=del\">Delete</a>&nbsp;&nbsp;&nbsp;
								<a href=\"bookedit.php?id={$row[0]}&type=edit\">Edit</a>
							</div>
						</td>
					</tr>";
			}
	    ?>
		<tr>
			<td colspan="3" align="center"></td>
		</tr>
	</table>
	<br>
	<p class="title" align="center">Current Page
	<?php 
	echo "{$_GET[page]}";
	 ?>/

	<?php
		$sql="select count(*) from book";
		$query=$dbh->query($sql);
		$row=$query->fetch();
		$total=ceil($row[0]/$pageNum);
		echo $total;
	
	if($_GET[page]>1){
		echo "<a href='book.php?page=1'>Top</a>&nbsp;";
		echo "<a href='book.php?page=".($_GET[page]-1)."'>Prev</a>&nbsp;";
	}
	if ($_GET[page]<$total) {
		echo "<a href='book.php?page=".($_GET[page]+1)."'>Next</a>&nbsp;";
		echo "<a href='book.php?page=$total'>Last</a>&nbsp;";
	}
?>
	&nbsp;&nbsp;
	<?php
		for($i=1;$i<=$total;$i++)
		{
			echo "<a href='book.php?page={$i}'>[{$i}]</a>&nbsp;";
		}
	?>
	</p>
</body>

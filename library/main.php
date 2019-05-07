<?php
	include("connect.php");
	error_reporting(0);
?>

<style type="text/css">
	.STYLE1 {
		font-size: 24px;
		font-weight: bold;
	}
	a{text-decoration:none;color:#000}
	/*td{ background-color:#CCCCCC}*/
	/*.a td{background-color:#FFFFFF}*/ 
	body{background: url('https://s2.ax1x.com/2019/04/06/AWwYVA.jpg') no-repeat fixed center left / cover !important;}
</style>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
	$(document).ready(function(){
		$("input").focus(function(){
			if($("#aa").val()==" Please input book name！")
    			$("#aa").val("");
  		});
		$("input").blur(function(){
			if($("#aa").val()=="")
				$("#aa").val(" Please input book name！");
		});

  		});


</script>

<body>
<script src="http://open.sojson.com/common/js/canvas-nest.min.js" count="100" zindex="-2" opacity="0.6" color="47,135,193" type="text/javascript">
    </script>

    <!-- Searching Engine -->
    <form action="http://www.google.com/search" target="_blank" id="form1" method="get">
    	<p align="center" style=" margin-right:500px">Search: Book User</p>
    	<p align="center">
    		<input id="radio1" type="radio" name="radio1" onclick="t();" value="1"/> &nbsp;&nbsp;&nbsp;
    		<input id="radio2" type="radio" name="radio1" onclick="t();" value="2" />  
			<input type=text name=q size=30 style="width:345px; height:25px;border-radius:2em;" value=" Please input book name！" id="aa">
			<input type="submit" onclick="return a();" value="Local" style="border-radius:2em;">	
			<input type="submit" value="Google" style="border-radius:2em;">
		</p>
	</form>
	<?php 

		if (!empty($_POST[q])) {
			
			// echo "<script>alert($_POST[q].$row[0]);</script>";
			if($_POST[radio1]==1){
				$sql="SELECT id FROM book where title='{$_POST[q]}'";
				$query = $dbh->query($sql);
				$row=$query->fetch();
				if($row[0])
					echo "<script>document.location = \"bookshow.php?id={$row[0]}\";</script>";
				else echo "<script>alert('Currently no this book！');</script>";
				}
			
			elseif ($_POST[radio1]==2) {
				$sql="SELECT id FROM reader where name='{$_POST[q]}'";
				$query = $dbh->query($sql);
				$row=$query->fetch();
				if($row[0])
					echo "<script>document.location = \"readershow.php?id={$row[0]}\";</script>";
				else echo "<script>alert('No this reader！！');</script>";
				}
			}

	 ?>
	<script>
		function a(){
			if(document.getElementById('form1').action=="http://www.google.com/search"){
				alert('Choose the type！');return false;
			}
			else{
				document.getElementById('form1').method="post";
				document.getElementById('form1').target="mainFrame";
			}
		}
		function t(){
			// alert('aaa');
		 var va=$("input[type=radio]").val();
		 if(va=="1"){
			document.getElementById('form1').action="main.php?";
		 }
		 else if(va=="2"){
		 	document.getElementById('form1').action="main.php?";
		 }
	}
	</script>

<p align="center" style=" margin-right:500px">Welcome, My dear friend!</p>
<p align="center" style=" margin-right:100px">This is the 353-Library manage system, dont forget check the order today.
Good luck have fun!</p>
<br>
<p align="center" style=" margin-right:100px">Our Team member:</p>
<p align="center" style=" margin-right:100px">Tianlin Yang</p>
<p align="center" style=" margin-right:100px">Haitun Liao</p>
<p align="center" style=" margin-right:100px">Gaoshuo Cui</p>
<p align="center" style=" margin-right:100px">Jiuxiang Chen</p>
	<br><br><br>
	<table width="80%"  border="1" cellspacing="0" cellpadding="0" align="right" class="title">
		<tr>
			<th colspan="8">
				<p align="center" class="STYLE1" >Our Best Books&nbsp;&nbsp;</p>
			</th>
		</tr>
		<tr>
			<th width="15%">
				<div align="ISBN Number">ISBN Number</div>
			</th>
			<th width="20%">
				<div align="center">Title</div>
			</th>
			<th width="10%">
				<div align="center">Type</div>
			</th>
			<th width="15%">
				<div align="center">Author</div>
			</th>
			<th width="10%">
				<div align="center">edition</div>
			</th>
			<th width="10%">
				<div align="center">Price</div>
			</th>
			<th width="10%">
				<div align="center">Quantity</div>
			</th>
			<th width="10%">
				<div align="center">Sold</div>
			</th>
		</tr>
		<?php
				$sql="SELECT * FROM book order by id asc LIMIT 5";
				$query = $dbh->query($sql);
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
									<div align=\"center\">
										<a href=\"bookshow.php?id={$row[0]}&type1=index\">{$row[0]}</a>
									</div>
								</td>
								<td>
									<div align=\"center\">{$row[2]}</div>
								</td>
								<td>
									<div align=\"center\">{$row[1]}</div>
								</td>
								<td>
									<div align=\"center\">{$row[3]}</div>
								</td>
								<td>
									<div align=\"center\">{$row[7]}</div>
								</td>
								<td>
									<div align=\"center\">{$row[5]}$</div>
								</td>
								<td>
									<div align=\"center\">{$row[8]}</div>
								</td>
								<td>
									<div align=\"center\">{$row[9]}</div>
								</td>
						</tr>";
				}
		?>
		<tr>
			<th colspan="8" align="center"><a href="book.php?page=1">Click HERE to find more</a></th>
		</tr>
	</table>
<?php
	include("connect.php");
  error_reporting(0);
?>
<style type="text/css">
img{  
      width: auto;  
      height: auto;  
      max-width: 30%;  
      max-height: 30%;     
  }
  a{text-decoration:none;color:#000}
  a:hover{color:#f00}
  .title{font-family: verdana, tahoma, sans-serif;FONT-SIZE: 25px;font-weight:bold}
  body{background: url('https://s2.ax1x.com/2019/04/06/AWuJWq.jpg') no-repeat fixed center left / cover !important;}
</style>
<p>&nbsp;</p>
<p align="center" />
  <?php
  	$sql="select * from book where id={$_GET[id]}";
    $query=$dbh->query($sql);
    $row=$query->fetch();
  	echo "<p align=\"center\">ISBN Number：{$row[0]}</p>
          <p align=\"center\">Publisher：{$row[1]}</p>
          <p class=\"title\" align=\"center\">Name：《{$row[2]}》</p>
          <img src=\"{$row[6]}\" alt=\" {$row[2]}\"  style=\"float: center; margin-left:330px\" />";
  ?>
  
</p><img src="" alt="">
<br>
<table width="539" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td >Introduction：</td>
    <td><?php echo $row[4];?></td>
  </tr>
  <tr>
    <td>Writer： </td>
    <td><?php echo $row[3];?></td>
  </tr>
  <tr>
    <td>Price(CDN$)： </td>
    <td><?php echo $row[5];?></td>
  </tr>
  <tr>
    <td>Edition： </td>
    <td><?php echo $row[7];?></td>
  </tr>  
  <tr>
    <td>Quantity(available)： </td>
    <td><?php echo $row[8];?></td>
  </tr>
  <tr>
    <td>Sold(up-to-date)： </td>
    <td><?php echo $row[9];?></td>
  </tr>
</table>
<br>
<?php
	if($_GET[type1]=="index")
	{
		echo "<p class=\"title1\" align=\"center\" ><a href='main.php'><img src=\"img/return1.gif\" border=\"0\"/></a></p>";
	}
	elseif($_GET[type1]=="list")
	{
		echo "<p class=\"title1\" align=\"center\" ><a href='book.php?page={$_GET[page1]}'><img src=\"img/return1.gif\" border=\"0\"/></a></p>";
	}
  elseif($_GET[type1]=="typeshow")
  {
    echo "<p class=\"title1\" align=\"center\" ><a href='type.php'><img src=\"img/return1.gif\" border=\"0\"/></a></p>";
  }
	else
	{
    echo "<p class=\"title1\" align=\"center\" ><a href='bookedit.php?id={$row[0]}&type=edit'>Modify this</a></p>";
		echo "<p class=\"title1\" align=\"center\" ><a href='main.php'><img src=\"img/return1.gif\" border=\"0\"/></a></p>";
	}
?>

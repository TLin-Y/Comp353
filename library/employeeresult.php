<?php 
	include("connect.php");
	error_reporting(0);
?>
<style type="text/css">
	.title{font-family: verdana, tahoma, sans-serif;FONT-SIZE: 20px;font-weight:bold}
	body{background: url('https://s2.ax1x.com/2019/04/06/AWdplD.jpg') no-repeat fixed center left / cover !important;}
	a{ text-decoration:none}
	a:hover{color:#f00}
</style>

<br><br><br><br><br>
 <p align="center"><?php
			if($_GET[type]=="add")    	
			{
	    		$sql="INSERT INTO `login` (`id`,`name`,`SSN`,`email` ,`phone`,`password`) VALUES ('$_POST[id]','$_POST[name]','$_POST[SSN]','$_POST[email]','$_POST[phone]','$_POST[password]')";
	    		$aff = $dbh->exec($sql);
	    		$aff1 = $dbh->exec($sql);
	    		if($aff != $aff1)
	    		{
	    			
	    			echo "<div align=\"center\" class=\"title\">Add employee finish！<br><br><a href='employee.php?page=1'>Check employee</a></div>";
	    		}
	    		else 
	    		{
	    			echo "<div align=\"center\" class=\"title\">Add fail! re-add click<a href='employeeadd.php'><img src=\"img/return1.gif\" border=\"0\"/></a></div>";
	    		}
			}



			elseif ($_GET[type]=="del")
			{

				$sql="delete from login where id ={$_GET[id]}";
				if($dbh->exec($sql))
				{
					echo "<div align=\"center\" class=\"title\">Delete employee finish！<br><br><a href='employee.php?page=1'> >>Check employee</a></div>";
				}
				else 
				{
					echo "<div align=\"center\" class=\"title\">Delete fail! re-del click<a href='employee.php?page=1'><img src=\"img/return1.gif\" border=\"0\"/></a></div>";
				}
			}


    	?>
</p>

<?php 
	include("connect.php");
	error_reporting(0);
?>
<style type="text/css">
	.title{font-family: verdana, tahoma, sans-serif;FONT-SIZE: 20px;font-weight:bold}
	body{background: url('https://s2.ax1x.com/2019/04/06/AWuJWq.jpg') no-repeat fixed center left / cover !important;}
	a{ text-decoration:none}
	a:hover{color:#f00}
</style>
<br><br><br><br><br>
 <p align="center"><?php
			if($_GET[type]=="add")    	
			{
				move_uploaded_file($_FILES['img']['tmp_name'],'./img/book/'.$_FILES['img']['name']);
    			$imgname='./img/book/'.$_FILES['img']['name'];
				$profile=nl2br($_POST[profile]);
	    		$sql="INSERT INTO `book` (`id`,`type`,`title`,`author` ,`profile` ,`price`,`img`,`edition`,`quantity`,`sold`)VALUES ('$_POST[id]','$_POST[type]','$_POST[title]','$_POST[author]','$_POST[profile]','$_POST[price]','$imgname','$_POST[edition]','$_POST[quantity]','$_POST[sold]')";
	    		$aff = $dbh->exec($sql);
	    		$sql="update `type` set number=number+1 where type='{$_POST[type]}'";
	    		$aff1 = $dbh->exec($sql);
	    		if($aff&&$aff1)
	    		{
	    			
	    			echo "<div align=\"center\" class=\"title\">Add book finish！<br><br><a href='book.php?page=1'>Check book</a></div>";
	    		}
	    		else 
	    		{
	    			echo "<div align=\"center\" class=\"title\">Add fail! re-add click<a href='bookadd.php'><img src=\"img/return1.gif\" border=\"0\"/></a></div>";
	    		}
			}
			elseif ($_GET[type]=="del")
			{
				$sql1="select img from book where id=$_GET[id]";
				$query = $dbh->query($sql1);
				$row = $query->fetch();
				if(file_exists($row[0]))
				{
					@unlink($row[0]);
				}

				$sql="select type from book where id={$_GET[id]}";
				$query = $dbh->query($sql);
				$row = $query->fetch();
				$sql="update `type` set number=number-1 where type='{$row[0]}'";
	    		$aff = $dbh->exec($sql);

				$sql="delete from book where id ={$_GET[id]}";
				if($dbh->exec($sql))
				{
					echo "<div align=\"center\" class=\"title\">Delete book finish！<br><br><a href='book.php?page=1'> >>Check book</a></div>";
				}
				else 
				{
					echo "<div align=\"center\" class=\"title\">Delete fail! re-del click<a href='book.php?page=1'><img src=\"img/return1.gif\" border=\"0\"/></a></div>";
				}
			}
			elseif ($_GET[type]=="edit")
			{
				$sql="select img from book where id=$_GET[id]";
				$query = $dbh->query($sql);
				$row = $query->fetch();
				if(file_exists($row[0]))
				{
					@unlink($row[0]);
				}
				
				move_uploaded_file($_FILES['img']['tmp_name'],'./img/book/'.$_FILES['img']['name']);
    			$imgname='./img/book/'.$_FILES['img']['name'];

				if ($_FILES['img']['name']=="")
    				$sql1="update book set type='{$_POST[type]}',title='{$_POST[title]}',author='{$_POST[author]}',profile='{$_POST[profile]}',price='{$_POST[price]}',edition='{$_POST[edition]}',quantity='{$_POST[quantity]}',sold='{$_POST[sold]}' where id = {$_GET[id]}";
				else 
					$sql1="update book set type='{$_POST[type]}',title='{$_POST[title]}',author='{$_POST[author]}',profile='{$_POST[profile]}',price='{$_POST[price]}',img='{$imgname}',edition='{$_POST[edition]}',quantity='{$_POST[quantity]}',sold='{$_POST[sold]}' where id = {$_GET[id]}";
    			if($dbh->exec($sql1))
    			{
    				echo "<div align=\"center\" class=\"title\">Modify finish！<br><br><a href='book.php?page=1'><img src='img/return1.gif' border=\"0\"/></a></div>";
    			}
    			else 
    			{
    				"<div align=\"center\" class=\"title\">Modify fail! re-mod click<a href='bookedit.php?id={$_GET[id]}><img src=\"img/return1.gif\" border=\"0\"/></a></div>";
    			}
			}
    	?>
</p>

<?php 
	include("connect.php");
	error_reporting(0);
?>

<style>
	a{text-decoration:none;color:#000}
	a:hover{color:#f00}
</style>
<br><br><br><br><br>
	<?php 
		if($_GET[type]=="add")    	
			{
				move_uploaded_file($_FILES['img']['tmp_name'],'./img/reader/'.$_FILES['img']['name']);
    			$imgname='./img/reader/'.$_FILES['img']['name'];
	    		$sql="INSERT INTO `reader` (`id` ,`name` ,`sex` ,`phone`,`zp`, `email`, `address`)VALUES ('$_POST[id]','$_POST[name]','$_POST[sex]', '$_POST[phone]', '$imgname', '$_POST[email]','$_POST[address]')";
	    		$aff = $dbh->exec($sql);
	    		if($aff)
	    		{
	    			
	    			echo "<div align=\"center\" class=\"title\">Add reader sucess！<br><br><a href='loginreader.php?page=1'>View reader</a></div>";
	    		}
	    		else 
	    		{
	    			echo "<div align=\"center\" class=\"title\">Add reader fail！Re-add click<a href='loginreader.php'><img src=\"img/return1.gif\" border=\"0\"/></a></div>";
	    		}
			}
		elseif ($_GET[type]=="del")
			{
				$sql="select zp from reader where id='$_GET[id]'";
				$query = $dbh->query($sql);
				$row = $query->fetch();
				if(file_exists($row[0]))
				{
					@unlink($row[0]);
				}
				$sql="delete from reader where id ='{$_GET[id]}'";
				if($dbh->exec($sql))
				{
					echo "<div align=\"center\" class=\"title\">Delete reader finish！<br><br><a href='reader.php?page=1'> View reader</a></div>";
				}
				else 
				{
					echo "<div align=\"center\" class=\"title\">Delete reader fail! <a href='reader.php?page=1'><img src=\"img/return1.gif\" border=\"0\"/></a></div>";
				}
			}
		elseif ($_GET[type]=="edit")
			{
				$sql="select zp from reader where id='$_GET[id]'";
				$query = $dbh->query($sql);
				$row = $query->fetch();
				if(file_exists($row[0]))
				{
					@unlink($row[0]);
				}
				
				move_uploaded_file($_FILES['img']['tmp_name'],'./img/reader/'.$_FILES['img']['name']);
    			$imgname='./img/reader/'.$_FILES['img']['name'];

				if ($_FILES['img']['name']=="")
    				$sql1="update reader set id='{$_POST[id]}',name='{$_POST[name]}',sex='{$_POST[sex]}',phone='{$_POST[phone]}', email='$_POST[email]',address='$_POST[address]' where id = '{$_GET[id]}'";
				else 
					$sql1="update reader set id='{$_POST[id]}',name='{$_POST[name]}',sex='{$_POST[sex]}',phone='{$_POST[phone]}',zp='{$imgname}', email='$_POST[email]',address='$_POST[address]' where id = '{$_GET[id]}'";
    			if($dbh->exec($sql1))
    			{
    				echo "<div align=\"center\" class=\"title\">Modify info ok！<br><br><a href='reader.php?page=1'><img src='img/return1.gif' border=\"0\"/></a></div>";
    			}
    			else 
    			{
    				"<div align=\"center\" class=\"title\">Modiy fail! please click <a href='readeredit.php?id={$_GET[id]}><img src=\"img/return1.gif\" border=\"0\"/></a></div>";
    			}
			}
	?>
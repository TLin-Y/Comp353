<?php
	include("connect.php");
	session_start();
	error_reporting(0);
?>

<style type="text/css">
.title{font-family: verdana, tahoma, sans-serif;FONT-SIZE: 12px;font-weight:bold}

a{text-decoration:none}
.p{cursor: hand}
-->
</style>
<form method="get">
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<table width="100%" border="0" class="title" align="center">
	  <tr>
	    <td></td>
	  </tr>
	  <tr>
	    <td align="center">
			<?php
				if($_SESSION["page"]=="login")
				{
				    $name = $_POST['name']; $pwd = $_POST['pwd'];
					$sql="SELECT count(*) FROM `login` WHERE name='$name' and password='$pwd'";
                    $row = $dbh->query($sql);
                    $a=$row->fetch();
					if($a[0]==1)
					{
						$_SESSION[username]=$_POST[name];
						// $_SESSION[aa]=1;
						echo "Welcome,{$_POST[name]}. Now Loading....... <br>";
						echo "<a href=\"index.php\">If your broswer do nothing，click here</a>";
						echo "<script>window.setTimeout(\"location.href='index.php';\",3000)</script>";
					}
					else 
					{
						echo "Wrong Username or Password，click<a href=\"login.php\" target=\"_top\">To Retry<br>";
					}
				}
			?>
		</td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	  </tr>
	</table>
</form>

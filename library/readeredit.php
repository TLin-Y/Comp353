<?php
	include("connect.php");
  error_reporting(0);
?>

<?php
	$sql="select * from reader where id='{$_GET[id]}'";
  $query=$dbh->query($sql);
  $row=$query->fetch();
?>

<style>
img{  
      width: auto;  
      height: auto;  
      max-width: 100%;  
      max-height: 100%;     
  }
	tr{ text-align: center; }	
</style>
<form method="post" action="readerresult.php?type=edit&id=<?php echo $_GET[id];?>" enctype="multipart/form-data">
	<div style="float: left;/*border:4px solid blue;*/width:230px; height:300px ; ">
    	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    	<img src="<?php echo $row[4]; ?>" height="100%" width="100%" style="border:2px solid red; margin-left: 300px;" name="yt" />
  	</div>
  	<br><br><br><br><br><br>
  	<table height="45%" border="1" cellspacing="0" cellpadding="0" align="center">
  		<tr>
  			<td colspan="2">Modify reader info</td>
  		</tr>
  		<tr>
  			<td>ID：</td>
  			<td>
  				<input type="text" name="id" value="<?php echo $row[0];?>" style="height:100%; width:100%" />
  			</td>
  		</tr>
  		<tr>
  			<td>Name：</td>
  			<td>
  				<input type="text" name="name" value="<?php echo $row[1];?>" style="height:100%; width:100%" />
  			</td>
  		</tr>
  		<tr>
  			<td>Gender：</td>
  			<td>
	         	<span>
	             	<select name="sex" tabindex="6" style="margin:-1px width: 150px">
	                <option value="<?php echo $row[2];?>">——choose gender——</option>
                  <?php 
                      if($row[2]=='Male')
                            echo "<option value=\"Male\" selected=\"selected\">Male</option>
                              <option value=\"Female\">Female</option>";
                      else  echo "<option value=\"Male\">Male</option>
                              <option value=\"Female\" selected=\"selected\">Female</option>";
                   ?>
	             	</select>
	        	</span>
	        </td>
	    </tr>
  		<tr>
  			<td>Phone：</td>
  			<td>
  				<input type="text" name="phone" value="<?php echo $row[3];?>" style="height:100%; width:100%" />
  			</td>
  		</tr>
      <tr>
        <td>Email：</td>
        <td>
          <input type="text" name="email" value="<?php echo $row[5];?>" style="height:100%; width:100%" />
        </td>
      </tr>
      <tr>
        <td>Address：</td>
        <td>
          <input type="text" name="Address" value="<?php echo $row[6];?>" style="height:100%; width:100%" />
        </td>
      </tr>
  		<tr>
  			<td><--Photo：</td>
  			<td> 
  				<input type="file" name="img" value="<?php echo $row[4];?>" style="height:100%; width:100%" />
  			</td>
  		</tr>
  		<tr>
	     	<td colspan="2" class="title1">
	          	<input name="submit" type="image" src="img/ok1.gif"/>&nbsp;
	          	<a href="reader.php?page=1">
	          		<img src="img/return1.gif" border="0" />
	          	</a>
	      	</td>
    	</tr>
  	</table>
  </form>
<?php
	include("connect.php");
  error_reporting(0);
?>

<style type="text/css">
  .title{font-family: verdana, tahoma, sans-serif;FONT-SIZE: 20px;font-weight:bold}
</style>


<?php
	$sql="select * from book where id={$_GET[id]}";
  $query=$dbh->query($sql);
  $row=$query->fetch();
?>

<form method="post" action="bookresult.php?type=edit&id=<?php echo $_GET[id];?>" enctype="multipart/form-data">
  <div style="float: left;/*border:4px solid blue;*/width:200px; height:300px">
    <br><br><br><br>
    <img src="<?php echo $row[6]; ?>" height="100%" width="100%" style="border:2px solid red;" name="yt" />
  </div>
  
  <table width="71%" height="148" border="0" align="left" cellpadding="2" cellspacing="0">
    <tr>
      <td colspan="2"><div align="center" class="title">Modify book info</td>
    </tr>
    <tr>
      <td>Name：</td>
      <td>
          <input type="text" name="title" size="50" value="<?php echo $row[2];?>"/>        
      </td>
    </tr>
    <tr>
      <td>Publisher：</td>
      <td>
          <input type="text" name="type" size="50" value="<?php echo $row[1];?>" readonly="readonly"/>
      </td>
    </tr>
    <tr>
      <td>Context：</td>
      <td>
          <textarea name="profile" cols="50" rows="10" /><?php echo $row[4];?></textarea>
      </td>
    </tr>
    <tr>
      <td>Author：</td>
      <td>
          <input type="text" name="author" value="<?php echo $row[3];?>"/>
      </td>
    </tr>
    <tr>
      <td>Price：</td>
      <td>
          <input type="text" name="price" value="<?php echo $row[5];?>"/>
      </td>
    </tr>
    <tr>
      <td><--Photo-：
      </td>
      <td>
        <input type="file" name="img" value="<?php echo $row[6];?>">
      </td>
    </tr>
    <tr>
      <td>Edition：</td>
      <td>
          <input type="text" name="edition" value="<?php echo $row[7];?>"/>
      </td>
    </tr>
      <tr>
      <td>Quantity：</td>
      <td>
          <input type="text" name="quantity" value="<?php echo $row[8];?>"/>
      </td>
    </tr>
      <tr>
      <td>Sold：</td>
      <td>
          <input type="text" name="sold" value="<?php echo $row[9];?>"/>
      </td>
    </tr>

    <tr align="center">
      <td colspan="2">
          <input name="submit" type="image" src="img/ok1.gif"/>&nbsp;
          <a href="book.php?page=1"><img src="img/return1.gif" border="0"</a>
        
      </td>
    </tr>
  </table>
</form>
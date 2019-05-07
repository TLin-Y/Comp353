<?php
	include("connect.php");
  error_reporting(0);
?>

<style type="text/css">
  .title{font-family: verdana, tahoma, sans-serif;FONT-SIZE: 20px;font-weight:bold}
</style>

<?php
  $sql="select * from orderbranch where onumber={$_GET[onumber]}";
  $query=$dbh->query($sql);
  $row=$query->fetch();
?>

<form method="post" action="orderadd.php?type=edit&onumber=<?php echo $_GET[onumber];?>" enctype="multipart/form-data">
  <div style="float: left;/*border:4px solid blue;*/width:200px; height:300px">
    <br><br><br><br>
  </div>

  <table width="71%" height="148" border="0" align="left" cellpadding="2" cellspacing="0">
    <tr>
      <td colspan="2"><div align="center" class="title">Modify order info</td>
    </tr>

    <tr>
      <td>Date：</td>
      <td>
          <input type="date" name="date" size="50" value="<?php echo $row[1];?>"/>        
      </td>
    </tr>

    <tr>
      <td>Publisher number：</td>
      <td>
          <input type="text" name="pubnumber" size="50" value="<?php echo $row[2];?>"/>   
      </td>
    </tr>

    <tr>
      <td>Branch：</td>
      <td>
          <input type="text" name="branch" value="<?php echo $row[3];?>"/>
      </td>
    </tr>

    <tr>
      <td>ISBN：</td>
      <td>
          <input type="text" name="ISBN" value="<?php echo $row[4];?>"/>
      </td>
    </tr>

    <tr>
      <td>Quantity：</td>
      <td>
          <input type="text" name="quantity" value="<?php echo $row[5];?>" readonly="true" style="background:#CCCCCC"/>
      </td>
    </tr>

    <tr align="center">
      <td colspan="2">
          <input name="submit" type="image" src="img/ok1.gif"/>&nbsp;
          <a href="order.php?page=1"><img src="img/return1.gif" border="0"</a>
        
      </td>
    </tr>
  </table>
</form>

<style>
	.title{font-family: verdana, tahoma, sans-serif;FONT-SIZE: 20px;font-weight:bold}
    body{background: url('https://s2.ax1x.com/2019/04/07/Af66K0.jpg') no-repeat fixed center left / cover !important;}
</style>

<?php 
  include("connect.php");
  error_reporting(0);
?>

<form action="shipmentadd.php?type1=add" method="post" accept-charset="utf-8" onSubmit="return aa()">

  <br><br><br>  <br>
<table width="71%" height="148" bshipment="0" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <td colspan="2">
        <div align="center" class="title">Add shipment</div>
      </td>
    </tr>
     <tr>
      <td class="title1">
        <div align="right">Confirmation number：</div>
      </td>
      <td>
        <div align="left">
          <label>
            <input type="text" name="confnumber" />
          </label>
        </div>
      </td>
    </tr>

    <tr>
        <td class="title1">
          <div align="right">Publisher number：</div>
        </td>
        <td>
          <span>
              <select name="pubnumber" tabindex="6" style="margin:-1px width: 150px">
                <option value="">Choose publisher id</option>
                <?php 
                    $sqlname = "SELECT * FROM type ";
                    $queryn = $dbh->query($sqlname);
                    while ($row = $queryn->fetch()) {
                     echo "<option value=\"{$row[0]}\">{$row[0]}</option>";
                    }
                 ?>
              </select>
          </span>
        </td>
      </tr>

    <tr>
        <td class="title1">
          <div align="right">Branch name：</div>
        </td>
        <td>
          <span>
              <select name="branch" tabindex="6" style="margin:-1px width: 150px">
                <option value="">Choose branch</option>
                <?php 
                    $sqlname = "SELECT * FROM branch ";
                    $queryn = $dbh->query($sqlname);
                    while ($row = $queryn->fetch()) {
                     echo "<option value=\"{$row[0]}\">{$row[0]}</option>";
                    }
                 ?>
              </select>
          </span>
        </td>
      </tr>
    <tr>
      <td class="title1">
        <div align="right">Date：</div>
      </td>
      <td>
        <div align="left">
          <label>
            <input type="date" name="date" />
          </label>
        </div>
      </td>
    </tr>

   <tr>
        <td class="title1">
          <div align="right">Book ISBN：</div>
        </td>
        <td>
          <span>
              <select name="ISBN" tabindex="6" style="margin:-1px width: 150px">
                <option value="">Choose book</option>
                <?php 
                    $sqlname = "SELECT * FROM book ";
                    $queryn = $dbh->query($sqlname);
                    while ($row = $queryn->fetch()) {
                     echo "<option value=\"{$row[0]}\">{$row[0]}</option>";
                    }
                 ?>
              </select>
          </span>
        </td>
      </tr>

    <tr>
      <td class="title1">
        <div align="right">Quantity：</div>
      </td>
      <td>
        <div align="left">
          <label>
            <input type="text" name="quantity" />
          </label>
        </div>
      </td>
    </tr>

    <tr>
        <td class="title1">
          <div align="right">Employee SSN：</div>
        </td>
        <td>
          <span>
              <select name="SSN" tabindex="6" style="margin:-1px width: 150px">
                <option value="">Choose SSN</option>
                <?php 
                    $sqlname = "SELECT * FROM login ";
                    $queryn = $dbh->query($sqlname);
                    while ($row = $queryn->fetch()) {
                     echo "<option value=\"{$row[2]}\">{$row[2]}</option>";
                    }
                 ?>
              </select>
          </span>
        </td>
      </tr>

    <tr>
        <td class="title1">
          <div align="right">Reader ID：</div>
        </td>
        <td>
          <span>
              <select name="log" tabindex="6" style="margin:-1px width: 150px">
                <option value="">Choose reader ID</option>
                <?php 
                    $sqlname = "SELECT * FROM reader ";
                    $queryn = $dbh->query($sqlname);
                    while ($row = $queryn->fetch()) {
                     echo "<option value=\"{$row[0]}\">{$row[0]}</option>";
                    }
                 ?>
              </select>
          </span>
        </td>
      </tr>

  <tr>
      <td colspan="2" class="title1">
        <div align="center">
          <input name="submit" type="image" src="img/ok1.gif"/>
          <a href="shipment.php?page=1">
            <img src="img/return1.gif" bshipment="0">
          </a>
        </div>
      </td>
    </tr>
  </table>
</form>


<?php 
	if($_GET[type1]=="add"){
		$sql="INSERT INTO shipment (`pubnumber`,`branch`,`date`,`ISBN`,`quantity`,`SSN`,`confnumber`,`log`)VALUES ('$_POST[pubnumber]','$_POST[branch]','$_POST[date]','$_POST[ISBN]','$_POST[quantity]','$_POST[SSN]','$_POST[confnumber]','$_POST[log]')";
    $sql1="UPDATE book SET quantity = quantity+{$_POST[quantity]} WHERE id = {$_POST[ISBN]}";
		if($dbh->exec($sql)&$dbh->exec($sql1)){

			echo "<script>alert('Add shipment finish！');</script>";
			echo "<script>document.location = \"shipment.php?page=1\";</script>";
		}
		else {
			echo "<script>alert('Add fail！');</script>";
		}
	}

	elseif ($_GET[type]=="del")
      {
        
        $sql="delete from shipment where confnumber ={$_GET[cnumber]}";
        $sql1="UPDATE book SET quantity = quantity-{$_GET[quantity]} WHERE id = {$_GET[ISBN]}";
        if($dbh->exec($sql1)&$dbh->exec($sql))
        {
          echo "<div align=\"center\" class=\"title\">Delete shipment finish！<br><br><a href='shipment.php?page=1'> >>Check shipment</a></div>";
        }
        else 
        {
          echo "<div align=\"center\" class=\"title\">Delete fail! re-del click<a href='shipment.php?page=1'><img src=\"img/return1.gif\" bshipment=\"0\"/></a></div>";
        }
      }  
 ?>


<script>
  	function aa()
  	{
  		if(document.getElementsByName("type")[0].value=="")
  		{
  			alert('Please write publisher name！');
  			return false;
  		}
  		else
  		{ 
  			return true;
  		}
  	}
  </script>
<style>
  .title{font-family: verdana, tahoma, sans-serif;FONT-SIZE: 20px;font-weight:bold}
    body{background: url('https://s2.ax1x.com/2019/04/07/AfJuKs.jpg') no-repeat fixed center left / cover !important;}
</style>

<?php 
  include("connect.php");
  error_reporting(0);
  $sql="select `type` from type ";
  $query = $dbh->query($sql);
  $i=1;
?>

<form action="orderadd.php?type1=add" method="post" accept-charset="utf-8" onSubmit="return aa()">

  <br><br><br>  <br>
<table width="71%" height="148" border="0" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <td colspan="2">
        <div align="center" class="title">Add order</div>
      </td>
    </tr>
     <tr>
      <td class="title1">
        <div align="right">Order number：</div>
      </td>
      <td>
        <div align="left">
          <label>
            <input type="text" name="onumber" />
          </label>
        </div>
      </td>
    </tr>
    <tr>
      <td class="title1">
        <div align="right">Order date：</div>
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
          <div align="right">Employee name：</div>
        </td>
        <td>
          <span>
              <select name="employee" tabindex="6" style="margin:-1px width: 150px">
                <option value="">Choose name</option>
                <?php 
                    $sqlname = "SELECT * FROM login ";
                    $queryn = $dbh->query($sqlname);
                    while ($row = $queryn->fetch()) {
                     echo "<option value=\"{$row[1]}\">{$row[1]}</option>";
                    }
                 ?>
              </select>
          </span>
        </td>
      </tr>

    <tr>
        <td class="title1">
          <div align="right">Customer name：</div>
        </td>
        <td>
          <span>
              <select name="customer" tabindex="6" style="margin:-1px width: 150px">
                <option value="">Choose customer</option>
                <?php 
                    $sqlname = "SELECT * FROM reader ";
                    $queryn = $dbh->query($sqlname);
                    while ($row = $queryn->fetch()) {
                     echo "<option value=\"{$row[1]}\">{$row[1]}</option>";
                    }
                 ?>
              </select>
          </span>
        </td>
      </tr>

      <tr>
      <td class="title1">
        <div align="right">Sale number：</div>
      </td>
      <td>
        <div align="left">
          <label>
            <input type="text" name="snumber" />
          </label>
        </div>
      </td>
    </tr>

  <tr>
      <td colspan="2" class="title1">
        <div align="center">
          <input name="submit" type="image" src="img/ok1.gif"/>
          <a href="order.php?page=1">
            <img src="img/return1.gif" border="0">
          </a>
        </div>
      </td>
    </tr>
  </table>
</form>


<?php 
  if($_GET[type1]=="add"){
    $sql="INSERT INTO orderbranch (`onumber`,`date`,`pubnumber`,`branch`,`ISBN`,`quantity`,`SSN`)VALUES ('$_POST[onumber]','$_POST[date]','$_POST[pubnumber]','$_POST[branch]','$_POST[ISBN]','$_POST[quantity]','$_POST[SSN]')";
    $sql1="UPDATE book SET quantity = quantity-{$_POST[quantity]} WHERE id = {$_POST[ISBN]}";
    $sql2="UPDATE book SET sold = sold+{$_POST[quantity]} WHERE id = {$_POST[ISBN]}";

    if($dbh->exec($sql2)&$dbh->exec($sql1)&$dbh->exec($sql)){

      echo "<script>alert('Add order finish！');</script>";
      echo "<script>document.location = \"order.php?page=1\";</script>";
      $sqlname = "SELECT '$_POST[quantity]'*price FROM book ";
      $queryn = $dbh->query($sqlname);
      $row = $queryn->fetch();
      $sql3="INSERT INTO sale (`SSN`,`date`,`employee`,`customer`,`ISBN`,`quantity`,`tprice`,`snumber`)VALUES ('$_POST[SSN]','$_POST[date]','$_POST[employee]','$_POST[customer]','$_POST[ISBN]','$_POST[quantity]','$row[0]',$_POST[snumber])";
      if($dbh->exec($sql3)){
    
      echo "<script>alert('Add sale information finish！');</script>";
      echo "<script>alert('Calculate total price finish！');</script>";
      echo "<script>document.location = \"sale.php?page=1\";</script>";
    }
      else {
      echo "<script>alert('Add price fail！');</script>";
      echo "<script>alert('Add fail！');</script>";
      }

    }
    else {
      echo "<script>alert('Add fail！');</script>";
    }
  }

  elseif ($_GET[type]=="del")
      {
        
        $sql1="UPDATE book SET quantity = quantity+{$_GET[quantity]} WHERE id = {$_GET[ISBN]}";
        $sql2="UPDATE book SET sold = sold-{$_GET[quantity]} WHERE id = {$_GET[ISBN]}";
        $sql="delete from orderbranch where onumber ={$_GET[onumber]}";
        if($dbh->exec($sql1)&$dbh->exec($sql2)&$dbh->exec($sql))
        {
          echo "<div align=\"center\" class=\"title\">Delete order finish！<br><br><a href='order.php?page=1'> >>Check order</a></div>";
        }
        else 
        {
          echo "<div align=\"center\" class=\"title\">Delete fail! re-del click<a href='order.php?page=1'><img src=\"img/return1.gif\" border=\"0\"/></a></div>";
        }
      }  
  elseif ($_GET[type]=="edit")
      {
          $sql="UPDATE orderbranch SET date='{$_POST[date]}',pubnumber='{$_POST[pubnumber]}',branch='{$_POST[branch]}',ISBN='{$_POST[ISBN]}' WHERE onumber = {$_GET[onumber]}";
          if($dbh->exec($sql))
          {
            echo "<div align=\"center\" class=\"title\">Modify finish！<br><br><a href='order.php?page=1'><img src='img/return1.gif' border=\"0\"/></a></div>";
          }
          else 
          {
            "<div align=\"center\" class=\"title\">Modify fail! re-mod click<a href='orderedit.php?onumber={$_GET[onumber]}><img src=\"img/return1.gif\" border=\"0\"/></a></div>";
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
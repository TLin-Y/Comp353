<style>
	.title{font-family: verdana, tahoma, sans-serif;FONT-SIZE: 20px;font-weight:bold}
    body{background: url('https://s2.ax1x.com/2019/04/06/AWdEkt.jpg') no-repeat fixed center left / cover !important;}
</style>

<?php 
  include("connect.php");
  error_reporting(0);
  $sql="select `type` from type ";
  $query = $dbh->query($sql);
  $i=1;
?>

<form action="typeadd.php?type1=add" method="post" accept-charset="utf-8" onSubmit="return aa()">

  <br><br><br>  <br>
	<p class="title" align="center">Add book publisher</p>
		<p align="center">Current publishers：
          <span>
              <select tabindex="6" style="margin:-1px width: 150px">
                <option value="">Check all book publishers</option>
                <?php 
                    while ($row = $query->fetch()) {
                     echo "<option value=\"{$row[0]}\">$i . {$row[0]}</option>";
                     $i++;
                    }
                 ?>
              </select>
          </span>
     </p>

<table width="71%" height="148" border="0" align="center" cellpadding="5" cellspacing="0">

     <tr>
      <td class="title1">
        <div align="right">ID Number：</div>
      </td>
      <td>
        <div align="left">
          <label>
            <input type="text" name="id" />
          </label>
        </div>
      </td>
    </tr>
    <tr>
      <td class="title1">
        <div align="right">Publisher name：</div>
      </td>
      <td>
        <div align="left">
          <label>
            <input type="text" name="type" />
          </label>
        </div>
      </td>
    </tr>
    <tr>
      <td class="title1">
        <div align="right">Branch name：</div>
      </td>
      <td>
        <div align="left">
          <label>
            <input type="text" name="branch" />
          </label>
        </div>
      </td>
    </tr>
    <tr>
      <td class="title1">
        <div align="right">Phone：</div>
      </td>
      <td>
        <div align="left">
          <label>
            <input type="text" name="phone" />
          </label>
        </div>
      </td>
    </tr>
    <tr>
      <td class="title1">
        <div align="right">Email：</div>
      </td>
      <td>
        <div align="left">
          <label>
            <input type="text" name="email" />
          </label>
        </div>
      </td>
    </tr>
    <tr>
      <td class="title1">
        <div align="right">Address：</div>
      </td>
      <td>
        <div align="left">
          <label>
            <input type="text" name="address" />
          </label>
        </div>
      </td>
    </tr>

  <tr>
      <td colspan="2" class="title1">
        <div align="center">
          <input name="submit" type="image" src="img/ok1.gif"/>
          <a href="type.php?page=1">
            <img src="img/return1.gif" border="0">
          </a>
        </div>
      </td>
    </tr>
  </table>
</form>


<?php 
	if($_GET[type1]=="add"){
		$sql="INSERT INTO type (`id`,`type`,`branch`,`phone`,`email`,`address`)VALUES ('$_POST[id]','$_POST[type]','$_POST[branch]','$_POST[phone]','$_POST[email]','$_POST[address]')";
		if($dbh->exec($sql)){
			echo "<script>alert('Add finish！');</script>";
			echo "<script>document.location = \"type.php\";</script>";
		}
		else {
			echo "<script>alert('Add fail！');</script>";
		}
	}
	elseif ($_GET[type]=="del")
      {
        $sql="delete from type where id ={$_GET[id]}";
        if($dbh->exec($sql))
        {
          echo "<div align=\"center\" class=\"title\">Delete publisher finish！<br><br><a href='type.php?page=1'> >>Check publisher</a></div>";
        }
        else 
        {
          echo "<div align=\"center\" class=\"title\">Delete fail! re-del click<a href='type.php?page=1'><img src=\"img/return1.gif\" border=\"0\"/></a></div>";
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
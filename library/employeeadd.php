
<style type="text/css">
  .title{font-family: verdana, tahoma, sans-serif;FONT-SIZE: 20px;font-weight:bold}
  .title1{font-family: verdana, tahoma, sans-serif;FONT-SIZE: 12px;font-weight:bold}
  body{background: url('https://s2.ax1x.com/2019/04/06/AWdplD.jpg') no-repeat fixed center left / cover !important;}
</style>

<?php 
  include("connect.php");
  $sql="select `type` from type ";
  $query = $dbh->query($sql);
?>

<form method="post" action="employeeresult.php?type=add" enctype="multipart/form-data">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="71%" height="148" border="0" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <td colspan="2">
        <div align="center" class="title">Add employee</div>
      </td>
    </tr>
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
        <div align="right">employee Name：</div>
      </td>
      <td>
        <div align="left">
          <label>
            <input type="text" name="name" />
          </label>
        </div>
      </td>
    </tr>

    <tr>
        <td class="title1">
          <div align="right">SSN：</div>
        </td>
      <td>
        <div align="left">
          <label>
            <input type="text" name="SSN" />
          </label>
        </div>
      </td>
    </tr>

    <tr>
      <td class="title1">
        <div align="right">Email address：</div>
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
        <div align="right">Phone：</div>
      </td>
      <td>
        <div align="left">
          <input type="text" name="phone" />
        </div>
      </td>
    </tr>
    <tr>
      <td class="title1">
        <div align="right">Login password：</div>
      </td>
      <td>
        <div align="left">
          <input type="text" name="password" />
        </div>
      </td>
    </tr>
    
    <tr>
      <td colspan="2" class="title1">
        <div align="center">
          <input name="submit" type="image" src="img/ok1.gif"/>
          <a href="employee.php?page=1">
            <img src="img/return1.gif" border="0">
          </a>
        </div>
      </td>
    </tr>
  </table>
</form>

<?php
	session_start();
	$_SESSION["page"]="add";
?>
<style type="text/css">
  .title{font-family: verdana, tahoma, sans-serif;FONT-SIZE: 12px;font-weight:bold}
    body{background: url('https://s2.ax1x.com/2019/04/06/AWaWoq.jpg') no-repeat fixed center left / cover !important;}
  .grey{FONT-SIZE: 12px;color:#666666}
</style>

<title>Add reader</title>

<body>
  <br><br><br><br>
  <form method="post" action="readerresult.php?type=add" enctype="multipart/form-data" onSubmit="return namecheck()">
    <table width="208" border="0" align="center" cellpadding="5" cellspacing="0">
      <tr>
        <td bgcolor="#F4F4F4" class="title">
          <div align="center" class="STYLE3 STYLE1">Add reader</div>
        </td>
      </tr>
      <tr>
        <td class="grey">
          <strong>Please fill all information</strong>
        </td>
      </tr>
      <tr>
        <td class="title">ID number</td>
      </tr>
      <tr>
        <td>
          <input name="id" type="text" size="30">    
        </td>
      </tr>
      <tr>
        <td class="title">Name（Username）</td>
      </tr>
      <tr>
        <td>
          <input name="name" type="text"size="30">    
        </td>
      </tr>
      <tr>
        <td class="title">Gender &nbsp;
          <span>
              <select name="sex" tabindex="6" style="margin:-1px width: 150px">
                <option value="">Choose your gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
          </span>
        </td>
      </tr>
      <tr>
        <td class="title">Phone</td>
      </tr>
      <tr>
        <td><input name="phone" type="text"size="30"></td>
      </tr>
       <tr>
        <td class="title">Email</td>
      </tr>
      <tr>
        <td><input name="email" type="text"size="30"></td>
      </tr>
       <tr>
        <td class="title">Address</td>
      </tr>
      <tr>
        <td><input name="address" type="text"size="30"></td>
      </tr>
      <tr>
        <td class="title">Photo：<input type="file" name="img" style="margin:-1px">
        </td>
      </tr>
      <tr>
        <td align="right">
          <input type="image" name="login" src="img/ok1.gif">
          <a href="main.php">
            <img src="img/return1.gif" border="0">
          </a>
        </td>
      </tr>
  </table>
  </form>
  <script>
  	function namecheck()
  	{
  		if(document.getElementsByName("id")[0].value=="")
  		{
  			alert('Please write SIN！');
  			return false;
  		}
      else if(document.getElementsByName("name")[0].value=="")
      {
        alert('Please write username！');
        return false;
      }
      else if(document.getElementsByName("sex")[0].value=="")
      {
        alert('Please choose gender！');
        return false;
      }
  		else if(document.getElementsByName("phone")[0].value=="")
  		{
  			alert('Please write phone number！');
  			return false;
  		}
  		else
  		{ 
  			return true;
  		}
  	}
  </script>
</body>
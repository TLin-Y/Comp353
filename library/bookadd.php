<style type="text/css">
  .title{font-family: verdana, tahoma, sans-serif;FONT-SIZE: 20px;font-weight:bold}
  .title1{font-family: verdana, tahoma, sans-serif;FONT-SIZE: 12px;font-weight:bold}
  body{background: url('https://s2.ax1x.com/2019/04/06/AWa4YV.jpg') no-repeat fixed center left / cover !important;}
</style>

<?php 
  include("connect.php");
  $sql="select `type` from type ";
  $query = $dbh->query($sql);
?>
<form method="post" action="bookresult.php?type=add" enctype="multipart/form-data">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="71%" height="148" border="0" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <td colspan="2">
        <div align="center" class="title">Add Book</div>
      </td>
    </tr>
    <tr>
      <td class="title1">
        <div align="right">ISBN Number：</div>
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
        <div align="right">Book Name：</div>
      </td>
      <td>
        <div align="left">
          <label>
            <input type="text" name="title" />
          </label>
        </div>
      </td>
    </tr>
    <tr>
        <td class="title1">
          <div align="right">Publisher：</div>
        </td>
        <td>
          <span>
              <select name="type" tabindex="6" style="margin:-1px width: 150px">
                <option value="">Choose publisher</option>
                <?php 
                    while ($row = $query->fetch()) {
                     echo "<option value=\"{$row[0]}\">{$row[0]}</option>";
                    }
                 ?>
              </select>
          </span>
        </td>
      </tr>
    <tr>
      <td class="title1">
        <div align="right">Introduction：</div>
      </td>
      <td>
        <div align="left">
          <textarea name="profile" cols="46" rows="10"></textarea>
        </div>
      </td>
    </tr>
    <tr>
      <td class="title1">
        <div align="right">Author：</div>
      </td>
      <td>
        <div align="left">
          <input type="text" name="author" />
        </div>
      </td>
    </tr>
    <tr>
      <td class="title1">
        <div align="right">Price：</div>
      </td>
      <td>
        <div align="left">
          <input type="text" name="price" />
        </div>
      </td>
    </tr>
    <tr>
      <td class="title1">
        <div align="right">Edition：</div>
      </td>
      <td>
        <div align="left">
          <input type="text" name="edition" />
        </div>
      </td>
    </tr>
    <tr>
      <td class="title1">
        <div align="right">Quantity available：</div>
      </td>
      <td>
        <div align="left">
          <input type="text" name="quantity" />
        </div>
      </td>
    </tr>
    <tr>
      <td class="title1">
        <div align="right">Sold out：</div>
      </td>
      <td>
        <div align="left">
          <input type="text" name="sold" />
        </div>
      </td>
    </tr>
    <tr>
      <td class="title1">
        <div align="right">Cover：</div>
      </td>
      <td>
        <input type="file" name="img">
      </td>
    </tr>
    <tr>
      <td colspan="2" class="title1">
        <div align="center">
          <input name="submit" type="image" src="img/ok1.gif"/>
          <a href="book.php?page=1">
            <img src="img/return1.gif" border="0">
          </a>
        </div>
      </td>
    </tr>
  </table>
</form>

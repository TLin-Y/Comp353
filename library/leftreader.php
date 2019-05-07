<?php
  session_start();
  $username=$_SESSION["username"];
  error_reporting(0);
  if ( $username==null) {
    echo "<script>alert('Please Log-In First！');</script>";
    echo "<script>top.location = \"login.php\";</script>";
  }
?>
<!DOCTYPE>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <style type="text/css">
    	a{text-decoration:none;color:#000}
		  a:hover{color:#f00}
    	.STYLE1 {font-size: 14px}
      	/*li{list-style: none; text-align: left;}*/
      	ul{margin:0;padding:0px 30px;}

      	.menu{ float:left; /*border:1px solid #333;*/ } 
      	/*.foot{ border:4px solid blue;} */
    </style>
  </head>

 
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <SCRIPT language=JavaScript>

    $(document).ready(function(){
    	$("ul").slideToggle(1);
    	$(".menu img").click(function(){
      	$(this).next("ul").slideToggle(500).siblings("ul").slideUp("fast");
      	});
    });

// $(document).ready(function(){
// if($("#div1").is(":hidden")){
// $("#div1").slideDown();
// }else{
// $("#div1").slideUp();
// }
// });

    function The_date()
    {
      var Today = new Date();
      var year = Today.getYear();
      year=(year<1900?(1900+year):year);
      var month= Today.getMonth();
      var date  = Today.getDate();
      var day  = Today.getDay();
    switch(day)
    {
      case 1:day="Mon";break;
      case 2:day="Tue";break;
      case 3:day="Wed";break;
      case 4:day="Thu";break;
      case 5:day="Fri";break;
      case 6:day="Sat";break;
      case 0:day="Sun";break;
    }
    document.write(year+"/");
    document.write(month+1);
    document.write("/"+date+"/  ");
    document.write(day);
  }
  </SCRIPT>
  <body>    
    <script src="http://open.sojson.com/common/js/canvas-nest.min.js" count="200" zindex="-2" opacity="0.5" color="47,135,193" type="text/javascript">
    </script>
    <br/><br/>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="title">
      <tr>
        <td>
          <div align="center">
            <!-- <img src="img/loginfont.jpg" width="115" height="26" /> --><h2>353-Library</h2>
          </div>
        </td>
      </tr>
    <tr></tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>
        <div align="center"><SCRIPT>The_date()</SCRIPT></div>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>
        <div align="center">Welcome:  <?php echo $username;?></div>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>  
    <tr>
      <td>
        <div align="center">
          <span class="STYLE1">
            <a href="indexreader.php" target="mainFrame">HomePage</a>
            <a href="loginreader.php" target="_top">LogOut</a>
          </span>
        </div>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>

<div class="menu">
  	<img src="img/left/Bookinfo.png" width="110" height="29" id="img/left/Bookinfo1.png" />
  	<ul style="text-align: left;">
  		<li><div style="background-color:rgba(0,0,0,0.0);"><a href="bookreader.php?page=1" target="mainFrame">Check book</a></div></li>
  	</ul>

  	<img src="img/left/inforeader1.png" width="110" height="29" id="zp2"/>
    <ul>
  		<li><div style="background-color:rgba(0,0,0,0.0);"><a href="readerprofile.php?page=1" target="mainFrame">Check reader</a></div></li>
  	</ul>

    <img src="img/left/order.png" width="110" height="29" id="zp5"/>
    <ul>
      <li><div style="background-color:rgba(0,0,0,0.0);"><a href="orderreader.php?page=1" target="mainFrame">Order history</a></div></li>
      <li><div style="background-color:rgba(0,0,0,0.0);"><a href="orderaddreader.php" target="mainFrame">Add order</a></div></li>
    </ul>

    
</div> 

</body>
</html>
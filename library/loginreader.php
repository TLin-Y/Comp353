<?php
session_start();
$_SESSION["page"]="reader";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Log-In</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <form method="post" action="resultreader.php" class="login">

    <p>
      <label for="login">Name:</label>
      <input type="text" name="name" id="login" value="">
    </p>

    <p>
      <label for="password">ID number:</label>
      <input type="password" name="pwd" id="password" value="">
    </p>

    <p class="login-submit">
      <button type="submit" class="login-button" name="login">Login</button>
    </p>

    <p class="forgot-password"><a href="login.php">Log in as a employee</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="readerregister.php" target="mainFrame">Register</a></p>
  </form>

  <section class="about">
    <p class="about-author">
      &copy; 2019&ndash;2020 <a href="Tianlin Yang" target="_blank">tianlinyang303@gmail.com</a> -
      <a href="Concordia University" target="_blank">COMP353</a><br>
      Main Project ：<a href="40010303" target="_blank">2019 Winter</a>
  </section>
</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Document</title>
<h2>Reader Register</h2>
<hr>
<form action="register.php" method="POST" enctype="multipart/form-data">
    Username：
    <input type="text" name="userName" size="20" maxlength="15" placeholder="Please enter a valid name">
    <br>

    Password：
    <input type="password" name="password" size="20" maxlength="15">
    <br>

    Confirm Password：
    <input type="password" name="confirmPassword" size="20" maxlength="15">
    <br>

    E-mail：
    <input type="email" name="email" size="20" maxlength="20" placeholder="Please enter a valid email address">
    @
    <select name="domain" id="">
        <option value="@gmail.com" selected>gmail.com</option>
        <option value="@hotmail.com">hotmail.com</option>
    </select>
    <br>

    Phone number：
    <input type="number" name="phonenumber" size="20" maxlength="20">
    <br>

    Address:
    <input type="text" name="adress" size="20" maxlength="30" placeholder="Please enter a valid adress">
    <br>

    <input type="submit" name="submit" value="Register">
    <input type="reset" name="cancel" value="Refill">
</form>

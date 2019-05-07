<?php
include_once("function/database.php");
// $userName = $_POST['userName'];
// $password = $_POST['password'];
$userName = addslashes($_POST['userName']);
$password = addslashes($_POST['password']);
getConnect();
$loginSQL = "select * from users where userName='$userName' and password='$password'";
echo $loginSQL;
$resultLogin = mysql_query($loginSQL);
if (mysql_num_rows($resultLogin) > 0) {
    echo "Successfully logged in";
} else {
    echo "Login failed";
}
closeConnect();
?>
<?php
    $databaseConnection = null;
    function getConnect() {
        $hosthome = "localhost";
        $database = "register";
        $userName = "root";
        $password = "123456";
        global $databaseConnection;
        $databaseConnection = @mysql_connect($hosthome, $userName, $password) or die (mysql_error());
        mysql_query("set names gbk");
        @mysql_select_db($database, $databaseConnection) or die (mysql_error());
    }

    function closeConnect() {
        global $databaseConnection;
        if ($databaseConnection) {
            @mysql_close($databaseConnection) or die (mysql_error());
        }
    }
?>
<?php
    include_once("function/database.php");
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    if ($password != $confirmPassword) {
        exit("Invalid！");
    }

    $userName = $_POST['userName'];
    $domain = $_POST['domain'];
    $userName = $userName . $domain;

    $userNameSQL = "select * from users where userName = '$userName'";
    getConnect();
    $resultSet = mysql_query($userNameSQL);
    if (mysql_num_rows($resultSet) > 0) {
        exit("The user name already exists");
    }
    closeConnect();

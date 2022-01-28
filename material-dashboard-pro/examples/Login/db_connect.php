<?php
session_start();
$servername = "localhost";
$user = "root";
$pwd = "";
$dbname = "sportingclub";

$con = mysqli_connect($servername, $user, $pwd, $dbname) or die("Connection failed: " . mysqli_connect_error());

if(isset($_POST['submit'])) {
    $username = htmlspecialchars($_POST['username']);
    $useremail = htmlspecialchars($_POST['useremail']);
    $passwd = htmlspecialchars($_POST['password']);


    $sql = "SELECT username, passwd, email FROM admin WHERE email='$useremail'";
    $resultset = mysqli_query($con, $sql) or die("database error:" . mysqli_error($con));
    $row = mysqli_fetch_assoc($resultset);
    if (($passwd) == $row['passwd'] and $username == $row['username']) {
        echo "1";
        $_SESSION['username']=$username;
        $_SESSION['useremail']=$useremail;
        $_SESSION['passwd']=$passwd;
        $_SESSION['error']=null;
        echo "good";
        header("Location: ../Dashboard.php");
    } else {
        $_SESSION['error']="Réessayer s'il vous plaît!";
        echo "error";
        header("Location: login.php");
    }
    $resultset->close();
}else{
    header("Location: ../Dashboard.php");
}

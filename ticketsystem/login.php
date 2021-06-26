<?php
session_start();
$server = "localhost";
$username = "iwp";
$password = "iwp";

$conn = new mysqli($server, $username, $password, "trainticket");

if($conn->connect_error) {
    die("Connection Failed" . $conn->connect->error);
}
if(isset($_POST))
{
    $username = clean_input($_POST['username']);
    $password = clean_input($_POST['password']);
    
    $fetchpassword = "SELECT `password` from `users` WHERE `username`='" . $username . "'";
    $matchpass = $conn->query($fetchpassword);
    if($matchpass->num_rows > 0)
    {
        while($pass = $matchpass->fetch_assoc()){
            $savedpass = $pass['password'];
        }
    }
    if($savedpass == $password){
        $_SESSION['loginsuccess'] = true;
        $_SESSION['loggedinuser'] = $username;
        unset( $_SESSION['errorMessage'] );
        if(isset($_SESSION['loginsuccess'])){ echo 'setted'; header('Location: index.php', true, 303); }
        else {  echo 'not setted'; }
        //header('Location: index.php', true, 303);
    }
    else {
        $_SESSION['errorMessage'] = true;
        header('Location: loginfront.php', true, 303);
    }
}
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$conn->close();
?>

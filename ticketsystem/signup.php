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
    $email = clean_input($_POST['email']);
    $username = clean_input($_POST['username']);
    $password = clean_input($_POST['password']);
    $checkusername = FALSE;
    $checkemail = FALSE;
    
    $fetchusername = "SELECT `username` from `users` WHERE `username`='" . $username . "'";
    $fetchemail = "SELECT `email` from `users` WHERE `email`='" . $email . "'";
    $matchusername = $conn->query($fetchusername);
    if($matchusername->num_rows > 0)
    {
        while($user = $matchusername->fetch_assoc()){
            $savedusername = $user['username'];
        }
        $checkusername = TRUE;
    }
    if($checkusername == FALSE){
        unset( $_SESSION['errorUser'] );
            //check email
        $matchemail = $conn->query($fetchemail);
        if($matchemail->num_rows > 0)
        {
           while($mail = $matchemail->fetch_assoc()){
               $savedmail = $mail['email'];
           }
           $checkemail = TRUE;
        }
        if($checkemail == FALSE){
            //email not found good to add to db
            unset( $_SESSION['errorEmail'] );
            $addvalues = 'INSERT INTO `users`(`username`, `password`, `role`, `email`) VALUES ("'.$username.'","'.$password.'","general","'.$email.'")';
            $conn->query($addvalues);
            $_SESSION['signupsuccess'] = TRUE;
            header('Location: loginfront.php', true, 200);
        }
        else{
            //email found return error
            $_SESSION['errorEmail'] = true;
            $_SESSION['foundEmail'] = $savedmail;
            header('Location: signupfront.php', true, 303);
        }
    }
    else {
        $_SESSION['errorUser'] = true;
        $_SESSION['foundUser'] = $savedusername;
        header('Location: signupfront.php', true, 303);
    }
    
    
    
   /* if($matchpass->num_rows > 0)
    {
        while($pass = $matchpass->fetch_assoc()){
            $savedpass = $pass['password'];
        }
    }
    if($savedpass == $password){
        echo "Login Success";
        unset( $_SESSION['errorMessage'] );
    }
    else {
        $_SESSION['errorMessage'] = true;
        header('Location: loginfront.php', true, 303);
    }*/
}
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$conn->close();
?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./css/flaticon.css">
<?php 

$server = "localhost";
$username = "iwp";
$password = "iwp";

$conn = new mysqli($server, $username, $password, "trainticket");

if($conn->connect_error) {
    die("Connection Failed" . $conn->connect->error);
}

if(isset($_POST)) {
    $from_station = clean_input($_POST['from_station']);
    $to_station = clean_input($_POST['to_station']);
    $adult = clean_input($_POST['adult']);
    $child = clean_input($_POST['child']);
    
    //Finding the existing value
    $findtrain = "SELECT `Train No`,`from_station`, `to_station` FROM `train` WHERE `from_station`='" . $from_station . "' AND `to_station`='" . $to_station . "'";
    //echo $findtrain;
    $trains = $conn->query($findtrain); 
?>
<nav class="navbar navbar-dark bg-primary">
             <div class="container">
             <h1 class="navbar-brand">RAILWAY BOOKING</h1>
             <div class="form-inline">
               <?php  
                 if(isset($_SESSION['loginsuccess'])){
                    echo 'LOGGED IN AS '.$_SESSION["loggedinuser"].'&nbsp;&nbsp;';
                    echo '<a class="btn btn-danger" href="signout.php">Log Out</a>';
                 }
                 else {
                    echo '<a class="btn btn-secondary" href="loginfront.php">Log In</a>&nbsp;&nbsp;';
                    echo '<a class="btn btn-success" href="signupfront.php">Sign Up</a>';
                 }    
               ?>        
             </div>
             </div>
</nav>
<div class="container">
<table class="table table-hover"> 
    <thead>
      <tr>
        <th scope="col">#</th>  
        <th scope="col">Train No.</th>
        <th scope="col">From</th>
        <th scope="col">To</th>
      </tr>  
    </thead>
    <tbody>
<?php
    if($trains->num_rows > 0){
      $x = 1;  
      while($train_found = $trains->fetch_assoc()){ 
          ?>
    <tr> 
         <th scope="row"> <?php echo $x; $x+=1; ?> </th>
         <td> <?php echo $train_found['Train No']; ?> </td>
         <td> <?php echo $train_found['from_station']; ?> </td>
         <td> <?php echo $train_found['to_station']; ?> </td>
    </tr>     
    <?php  }  
    }
    else {?> <tr> <td> <?php echo "No trains found :("; ?> </td></tr> <?php } ?>
    <?php
    /*$newseats = $currentseats - $nooftickets;
    echo $newseats;
    if($newseats >= 0){
        $changeseats = "UPDATE `train` SET `".$class."`=".$newseats." WHERE `Train No`=".$trainno;
        echo $changeseats;
        if($conn->query($changeseats) === TRUE){
            echo "Record Updated";
        }
        else { 
            echo "Record update failed miserably";
        }    
    } elseif ($newseats < 0){
        echo "Train is already full please try some other class";
    }*/
    $conn->close();
}
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
    </tbody>
</table>
</div>    

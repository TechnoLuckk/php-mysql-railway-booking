<div  class="container">
   <form action="book.php" method="POST">
      <table>
        <tr><td>Train No</td><td><input type="text" id="trainno" name="trainno" placeholder="Train no."/><td></tr>
        <tr><td>Class</td><td><input type="text" id="class" name="class" placeholder="Class" /></td></tr>
        <tr><td>No. of Tickets</td><td><input type="number" id="nooftickets" name="nooftickets" placeholder="No. of Tickets" /></td></tr>
      </table>
      <input type="submit" />
    </form>
</div>
<?php 

$server = "localhost";
$username = "iwp";
$password = "iwp";

$conn = new mysqli($server, $username, $password, "trainticket");

if($conn->connect_error) {
    die("Connection Failed" . $conn->connect->error);
}

if(isset($_POST)) {
    $trainno = clean_input($_POST['trainno']);
    $class = clean_input($_POST['class']);
    $nooftickets = clean_input($_POST['nooftickets']);
    
    //Finding the existing value
    $findval = "SELECT `" . $class ."` FROM `train` WHERE `Train No`=" . $trainno;
    $seats = $conn->query($findval);
    if($seats->num_rows > 0){
      while($seat = $seats->fetch_assoc()){
          $currentseats = $seat[$class];
      }  
    }
    $newseats = $currentseats - $nooftickets;
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
    }
    $conn->close();
}
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
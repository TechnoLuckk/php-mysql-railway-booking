<?php session_start() ?> 
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Train Booking System</title>
    </head>
    <style>
        img{
            background-color: rgba(0,0,0,0.7);
        }
        .link {
            text-decoration: none;
        }
        .car-left{
            height: 300px;
            width: 500px;
            margin: 30px;
            display: inline-block;
        }
        .car-right{
            border: 2px solid black;
            display: inline-block;
            border-radius: 10px;
            margin-top: 20px;
            margin-bottom: 50px;
            background-color: white;
            width: 40%;
        }
        .car-right input{
            margin: 15px;
            width: 90%;
        }
        .container.car{
            background-color: #ededed;
            border: 2px solid #ededed;
            display: flex;
            justify-content: space-around;
        }
        .tickets{
            display: flex;
        }
        .tickets input{
            width: 80%; 
            display: inline-block;
        }
        .tickets tickets-inner{
            display: inline-block;
        }
        .arrows{
            display: inline-block;
            margin-left: 34%;
            margin-right: 50%;
        }
        #btn-mine{
            background-color: white;  
        }
        i{
            padding-left: 20px;
            padding-right:35px;
        }
        .car-bottom{
            display: inline-block;
            background-color: white;
            margin-top: 20px;
            padding: 10px;
        }
        .footer{
            background: #DEDEE4;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/flaticon.css">
    <body>
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
        <div class="container car">
          <div class="car-left">   
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
               <ol class="carousel-indicators">
                 <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                 <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                 <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
               </ol>
               <div class="carousel-inner">
                 <div class="carousel-item active">
                     <img class="d-block w-100" src="./img/train1.jpg" alt="First slide">
                 </div>
                 <div class="carousel-item">
                     <img class="d-block w-100" src="./img/train2.jpg" alt="Second slide">
                 </div>
                 <div class="carousel-item">
                     <img class="d-block w-100" src="./img/train3.jpg" alt="Third slide">
                 </div>
               </div>
               <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                 <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                 <span class="sr-only">Next</span>
               </a>
             </div>
             <div class="car-bottom">
             Welcome to the new site for new train booking experience. Be sure to provide feedback through the link in the footer to 
             help us better your experience.         
             </div>   
          </div> 
          <div class="car-right">
              <div class="container">
                  <form action="booknew.php" method="POST">
                  <h2>CHOOSE TRAIN</h2>
                  <div class="upper">
                      
                  <h4>From</h4>
                  <input type="text" id="from_station" name="from_station" placeholder="eg. New Delhi"/><br>
                  <h4>To</h4>
                  <input type="text" id="to_station" name="to_station" placeholder="eg. Chennai Central"/><br>
                  </div>
                  <div class="tickets">
                  <div class="tickets-inner">    
                  <h5>Adult</h5>
                  <input type="text" id="adult" name="adult"/></div>
                  <div class="tickets-inner">    
                  <h5>Child</h5>
                  <input type="text" id="child" name="child"/></div>
                  </div>
                  <input class="btn btn-primary" type="Submit" />
                  </form>
              </div>
          </div>
        </div>   
        <div class="footer">
            <div>Designed and Made by Lakshit Dua 18BCE0824</div>
            <div>Please provide your valueable feedback <a href="feedback.php">here</a><div>
        </div>
             
    </body>
</html>

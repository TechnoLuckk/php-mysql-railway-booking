<?php  session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Sign Up</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
.signup-form {
    width: 500px;
    margin: 50px auto;
    font-size: 15px;
}
.signup-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.signup-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
</style>
</head>
<body>
<?php if(isset($_SESSION['errorUser'])) 
      { 
          echo '<br><br>'; 
          echo '<div class="container">';
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
          echo 'There is some error with your credentials. Username ' . $_SESSION['foundUser'] . ' already exists';
          echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
          echo '<span aria-hidden="true">&times;</span>';
          echo '</button>';
          echo '</div>';
          echo '</div>';
          unset( $_SESSION['errorUser'] );
          unset( $_SESSION['foundUser'] );
      }
      if(isset($_SESSION['errorEmail'])){
          echo '<br><br>'; 
          echo '<div class="container">';
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
          echo 'There is some error with your credentials. Email ' . $_SESSION['foundEmail'] . ' already exists';
          echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
          echo '<span aria-hidden="true">&times;</span>';
          echo '</button>';
          echo '</div>';
          echo '</div>';
          unset( $_SESSION['errorEmail'] );
          unset( $_SESSION['foundEmail'] );
      }
?> 
<div class="signup-form">
    <form action="signup.php" method="post">
        <h2 class="text-center">Sign Up</h2>
        <hr>
        <div class="form-group">
            <h4>Email</h4>
            <input type="email" class="form-control" placeholder="Email" id="email" name="email" required="required">
        </div>
        <div class="form-group">
            <h4>Username</h4>
            <input type="text" class="form-control" placeholder="Username" id="username" name="username" required="required">
        </div>
        <div class="form-group">
            <h4>Password</h4>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
        </div> 
    </form>
    <p class="text-center"><a href="loginfront.php">Have an account? Login here.</a></p>
</div>
</body>
</html>



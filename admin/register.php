<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="../resorce/css/style.css" rel="stylesheet">

    <title>Employee Management System</title>
    <style>
    body, html {
    height: 100%;
    margin: 0;
    }

.bg {
  background-image: url("../background.jpg");
  height: 100%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  
}

</style>
  </head>
  <body >


<?php
 // database connection
  require_once "../connection.php";

if(isset($_POST['register'])){

    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
    $user_type = $_POST['user_type'];

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

    $result = mysqli_query($conn,$select);

    if(mysqli_num_rows($result) > 0){

        $error[] = 'Sorry, this user already exists!';


    } else{
        if($pass !=$cpass){
            $error[] = 'The password does not match, try again!';
        } else{
            $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name', '$email','$pass','$user_type')";
            mysqli_query($conn, $insert);
            header('location:login.php');
        }
    }
};





?>


<div class="bg">
  <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5 shadow">
                              
                                    <h4 class="text-center">Hello, Admin</h4>
                                    <!-- <div class="text-center my-5"> <?php echo $login_Err; ?> </div> -->

                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">

                                    <div class="form-group">
                                        <label >Username :</label>
                                        <input type="name" class="form-control" name="name"> 
                                        <!-- <?php echo $name_err; ?>             -->
                                    </div>
                                
                                    <div class="form-group">
                                        <label >Email :</label>
                                        <input type="email" class="form-control" name="email"> 
                                        <!-- <?php echo $email_err; ?>             -->
                                    </div>

                                    <div class="form-group">
                                        <label >Password :</label>
                                        <input type="password" class="form-control" name="password" >
                                        <!-- <?php echo $pass_err; ?>             -->

                                    </div>

  <div class="form-group">
                                        <label >Confirm password :</label>
                                        <input type="password" class="form-control" name="cpassword" >
                                        <!-- <?php echo $pass_err; ?>             -->

                                    </div>

                                    <div class="form-group">
                                    <select name="user_type">
                                    <option disabled selected value="">--Select Role--</option>
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" value="Register" class="btn btn-primary btn-lg w-100 " name="register" >
                                    </div>
                                <!-- <p class=" login-form__footer">Not a admin? <a href="../employee/login.php" class="text-primary">Log-In </a>as Employee now</p> -->
                                <p class="login-form__footer">Already have an account? <a href="login.php" class="text-primary">Login Here!</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="./resorce/plugins/common/common.min.js"></script>
    <script src="./resorce/js/custom.min.js"></script>
    <script src="./resorce/js/settings.js"></script>
    <script src="./resorce/js/gleek.js"></script>
    <script src="./resorce/js/styleSwitcher.js"></script>

  </body>
</html>
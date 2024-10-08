<?php 
$showalert=false;
$showerror=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
  include 'partials/dbconnect.php';

  $username=$_POST["username"];
  $password=$_POST["password"];
  $cpassword=$_POST["cpassword"];
  $exists=false;
  if($password==$cpassword && $exists==false)
  {
    $sql="INSERT INTO user (username, password, date) VALUES ('$username', '$password', current_timestamp())";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        $showalert=true;
    }
  }
  else{
    $showerror="passwords do not match";
  }
}
  ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Sign up</title>
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if($showalert){
        echo  '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Succes!</strong> You can log in.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
    }
    if($showerror)
    {
        echo  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong>' .$showerror.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>';
    }
    ?>
    <div class="container my-4">
        <h1 class="text-center">Sign up to website</h1>
        
        <form action="/mini/signup.php"style="align-items:center;" method="post">
            <div class="form-group col-md-6 mb-3">
                <label for="username" class="form-label">username</label> 
                <input type="text" class="form-control text-center" id="username" name="username" aria-describedby="emailHelp">
            </div>
            <div class="form-group col-md-6">
                <label for="password" class="form-label">password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group col-md-6">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
                <div id="emailHelp" class="form-text">Make sure you enter same password.</div>
            </div>
           
            <button type="submit" class="btn btn-primary">Sign up</button>
            </form>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
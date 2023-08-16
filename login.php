<?php 
session_start();
require 'config.php';

if(isset($_POST['submit']) ){
   $username = $_POST["username"];
   $password = ($_POST ["password"]);

   $result = mysqli_query($conn, "SELECT * FROM login WHERE username = '$username'");

   //cek username
   if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      
      if ($password == $row['password']) {
         $_SESSION['username'] = $_POST['username'];

         header('location: dashboard.php');
      }
   }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    
   <div class="container">
         <form action="" method="post" class="form">
            <h1 class="text-center mb-5">Login</h1>

            <div class="form-floating mb-3">
               <input type="text" class="form-control" id="username" name="username" placeholder="username">
               <label for="username" class="form-label" >username</label>
            </div>
            <div class="form-floating mb-3">
               <input type="password" class="form-control" id="password" name="password" placeholder="Password">
               <label for="password" class="form-label">Password</label>
            </div>
            <div class="mb-3">
               <button type="submit" name="submit" class="btn btn-primary w-100">Login</button>
            </div>
            <a href="register.php" class="link-underline link-underline-opacity-0 text-light-emphasis">Belum memiliki akun? <span class="text-primary">Register sekarang</span></a>
         </form>
   </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
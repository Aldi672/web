<?php

$server = 'localhost';
$user = 'root';
$password = '';
$database = 'coc';

$conn = mysqli_connect($server, $user, $password, $database);

function query($query){
   global $conn;

   $result = mysqli_query($conn, $query);
   $rows = [];
   while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
   }
   return $rows;
}

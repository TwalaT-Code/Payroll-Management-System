<?php 
$conn= mysqli_connect("localhost","root","","payroll_db");
if(!$conn){
    die("Could not connect to mysql.".mysqli_connect_error());
}
?>
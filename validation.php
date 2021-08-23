<?php
include("db_connect.php");
$error="";
$allowance =mysqli_real_escape_string($conn,$_POST['allowance']);

//duplicates check
$data_check="SELECT id FROM allowances where allowance = $allowance LIMIT 1";
$results = mysqli_query($conn,$data_check);
$dataResults = mysqli_fetch_assoc($results);

if($dataResults){
    if($dataResults["allowance"] == $data){
        array_push($error,"'.$data.' + exist!");
}
    }
    //end
    ?>
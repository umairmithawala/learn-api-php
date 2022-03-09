<?php

//Define Additional Info
header ('Content-Type: application/json'); //define response type...(JSON)
header ('Access-Control-Allow-Origin: *');   //define who can acsess this api..
//this header method is very sensitive so make sure proper syntax otherwise you get error


require 'config.php';

// Get All data from database
// with JSON format
$query = "SELECT * FROM `student`";
$run_query = mysqli_query($con, $query);

if ($run_query == TRUE) {

    $output = mysqli_fetch_all ($run_query, MYSQLI_ASSOC);
    //convert result into JSON format
    echo json_encode($output);

} else {

}
?>
<!-- 

* How to run this APIs ?
-> Go to postman
-> enter this file url in postman
-> select method GET
-> click send

-->
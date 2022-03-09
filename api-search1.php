<?php
//WITH POST METHOD

require 'config.php';

//Define Additional Info
header ('Content-Type: application/json'); //define response type...(JSON)
header ('Access-Control-Allow-Origin: *');   //define who can acsess this api..


//Output convert json to php format
$data = json_decode(file_get_contents("php://input"),TRUE);

//set variable
$search_result = $data['search'];


?>
<?php

// Insert data into database using API
$query = "SELECT * FROM `student` WHERE `name` LIKE '%$search_result%'";
$run_query = mysqli_query($con, $query);

if ($run_query) {

    $output = mysqli_fetch_all($run_query,MYSQLI_ASSOC);
    echo json_encode($output);

} else {

    echo json_encode(array("message" => "Oops! Data Not Insert", "status" => false));
}
?>
<!-- 

* How to run this APIs ?
-> Goto postman
-> enter this file url in postman
-> select method POST
-> Goto Headers 
-> enter key : Content-Type
-> eneter key value : application/json
-> Goto Body
-> select row
-> enter json format like this => "Here enter id name which is you create id key for api"
{
    "sid" : "1"
}
->click send 

-->
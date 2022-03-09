<?php
//WITH GET METHOD

require 'config.php';

//Define Additional Info
header ('Content-Type: application/json'); //define response type...(JSON)
header ('Access-Control-Allow-Origin: *');   //define who can acsess this api..


//Output convert json to php format
// $data = json_decode(file_get_contents("php://input"),TRUE);

//set variable
// $search_result = $data['search'];

$search_result = isset($_GET['search']) ? $_GET['search'] : die();

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
-> select method GET
-> enter in URL -> http://localhost/api/api-search2.php?search=k
->click send 

-->
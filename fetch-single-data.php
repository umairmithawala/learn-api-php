<?php

//Define Additional Info
header ('Content-Type: application/json'); //define response type...(JSON)
header ('Access-Control-Allow-Origin: *');   //define who can acsess this api..


//Output convert json to php format
$data = json_decode(file_get_contents("php://input"),TRUE);
//create student-id key which is used in api -> "sid"
$student_id = $data['sid'];

require 'config.php';

?>
<?php

// Get All data from database
// with JSON format
$query = "SELECT * FROM `student` WHERE `id` = $student_id";
$run_query = mysqli_query($con, $query);

if ($run_query == TRUE) {

    $output = mysqli_fetch_all ($run_query, MYSQLI_ASSOC);
    //convert result into JSON format
    echo json_encode($output);

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
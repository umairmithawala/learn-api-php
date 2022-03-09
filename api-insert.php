<?php

require 'config.php';

//Define Additional Info
header ('Content-Type: application/json'); //define response type...(JSON)
header ('Access-Control-Allow-Origin: *');   //define who can acsess this api..
header ('Access-Control-Allow-Methods: POST'); //define in this api used post method..
header ('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');// define which header methods are allow


//Output convert json to php format
$data = json_decode(file_get_contents("php://input"),TRUE);

//set variable
$name = $data['sname'];
$age = $data['sage'];
$phone = $data['sphone'];


?>
<?php

// Insert data into database using API
$query = "INSERT INTO `student`(`name`, `age`, `phone`) VALUES ('{$name}',{$age},{$phone})";

if (mysqli_query($con, $query)) {

    echo json_encode(array("message" => "Successfully Data Insert", "status" => true));
    
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
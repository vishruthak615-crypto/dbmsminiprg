<?php

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "tourist_medicare"
);

if($conn->connect_error){
    die("Connection Failed");
}

$data = json_decode(
    file_get_contents("php://input"),
    true
);

$latitude = $data["latitude"];
$longitude = $data["longitude"];

$sql = "INSERT INTO user_location
(latitude, longitude)
VALUES
('$latitude','$longitude')";

if($conn->query($sql)){
    echo json_encode([
        "status"=>"success"
    ]);
}
else{
    echo json_encode([
        "status"=>"error"
    ]);
}

$conn->close();

?>
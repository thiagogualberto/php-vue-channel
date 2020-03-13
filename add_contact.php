<?php

require './database/connection.php';

$data = file_get_contents("php://input");

$request = json_decode($data);

echo "DATA: ".$data;
echo $request;

$query = "INSERT INTO cars (name,tel) VALUES ('$request->name','$request->tel')";

if(mysqli_query($con,$query)){
    $contact = [
        'name' => $request->name,
        'tel' => $request->tel,
        'id' => mysqli_insert_id($con)
    ];
    echo json_encode($contact);
}
echo "SQL: ".$query;

?>
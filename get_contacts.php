<?php

require('./database/connection.php');
$query = "SELECT * FROM cars";

if($result = mysqli_query($con, $query)){
    $i = 0;
    $contacts = [];
    while($row = $result->fetch_assoc()){
        $contacts[$i]['id'] = $row['id'];
        $contacts[$i]['name'] = $row['name'];
        $contacts[$i]['tel'] = $row['tel'];
        $i++;
    }
    echo json_encode($contacts);
}

?>
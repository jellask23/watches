<?php
//if latitude and longitude are submitted
// echo $_POST['latitude'];
if (!empty($_POST['latitude']) && !empty($_POST['longitude'])) {
    //send request and receive json data by latitude and longitude
    $latitude = trim($_POST['latitude']);
    $longitude = trim($_POST['longitude']);
    $user = trim($_POST['user']);
    include_once "db.php";

    $sql = "SELECT * from user_information WHERE Device = '" . $user . "' AND Latitude IS NOT NULL AND Longitude IS NOT NULL;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        date_default_timezone_set('Asia/Kolkata');
        $current_date =  date("Y-m-d h:i:sa");
        $sql = "UPDATE user_information SET Longitude = '" . $longitude . "', Latitude= '" . $latitude . "', LastVisited= '" . $current_date . "' WHERE Device = '" . $user . "';";
        $result = mysqli_query($conn, $sql);
        echo $result;
    } else {
        $sql = "UPDATE user_information SET Longitude = '" . $longitude . "', Latitude= '" . $latitude . "' WHERE Device = '" . $user . "';";
        $result = mysqli_query($conn, $sql);
        echo $result;
    }
}

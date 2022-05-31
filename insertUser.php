<?php
//if latitude and longitude are submitted
// echo $_POST['latitude'];
if (!empty($_POST['user'])) {
    $user = trim($_POST['user']);
    include_once "db.php";

    $sql = "SELECT * from user_information WHERE Device = '" . $user . "';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        date_default_timezone_set('Asia/Kolkata');
        $current_date =  date("Y-m-d h:i:sa");
        $sql = "UPDATE user_information SET LastVisited= '" . $current_date . "' WHERE Device = '" . $user . "';";
        $result = mysqli_query($conn, $sql);
        echo $result;
    }
    else{
        $sql = "INSERT INTO `user_information`(`Device`) VALUES ('".$user."');";
        $result = mysqli_query($conn, $sql);
        echo $result;
    }
}

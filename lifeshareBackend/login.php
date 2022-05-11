<?php

include 'DatabaseConfig.php';
include 'functions/get_user.php';
// Creating MySQL Connection.
$con = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);
if (isset($_POST['username']) && isset($_POST['password'])) //check is token is sent by the user
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users where username = '$username'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {

        while ($row[] = $result->fetch_assoc()) {

            $tem = $row;
        }

        $dbPWD = $tem[0]['password'];

        if (password_verify($password, $dbPWD)) {
            $userid = $tem[0]['id'];
            getuser($userid);
        } else {

            $data = ['success' => false, 'message' => ['Password you entered was incorrect.']];
            echo json_encode($data);
        }
    } else {

        $data = ['success' => false, 'message' => ['The user is not registered.']];
        echo json_encode($data);
    }
} else {
    $data = ['success' => false, 'message' => ['Username and Password are required.']];

    echo json_encode($data);
}


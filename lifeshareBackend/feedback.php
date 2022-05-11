<?php
header("Access-Control-Allow-Origin: *");
include 'DatabaseConfig.php';
$con = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);

if (isset($_POST['id']) && isset($_POST['message'])){
    $userId = $_POST['id'];
    $message = $_POST['message'];

    $query = "INSERT INTO feedback (id, message) VALUES ('$userId', '$message')";
    $result = mysqli_query($con, $query);
    if ($result){
        $data = [
            'success' => true,
            'message' => 'Feedback sent successfully'
        ];
        echo json_encode($data);
    }else{
        $data = [
            'success' => false,
            'message' => 'Something went wrong'
        ];
        echo json_encode($data);
    }
}else{
    $data = [
        'success' => false,
        'message' => 'Something went wrong'
    ];
    echo json_encode($data);
}

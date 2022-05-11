<?php
header("Access-Control-Allow-Origin: *");
include 'DatabaseConfig.php';
$con = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);

if (isset($_POST['id'])
&& isset($_POST['place'])
&& isset($_POST['time'])
&& isset($_POST['information'])
)
    {
    $userId = $_POST['id'];
    $place = $_POST['place'];
    $time = $_POST['time'];
	$information = $_POST['information'];
    


    $query = "INSERT INTO donorcampinfo (id, time, place, information) VALUES ('$userId', '$time', '$place', '$information')";
    $result = mysqli_query($con, $query);
    if ($result){
        $data = [
            'success' => true,
            'message' => 'Donorcamp added successfully'
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

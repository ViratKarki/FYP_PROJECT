<?php
header("Access-Control-Allow-Origin: *");
include 'DatabaseConfig.php';

$con = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);

$query = "SELECT * FROM donor";
$result = mysqli_query($con, $query);
$checkResult = mysqli_num_rows($result);

if ($checkResult > 0) {
    while ($row = mysqli_fetch_assoc($result)){
        $resultset[] = $row;
    }
    $data =[
        'success' => true,
        'message' =>'Donor list fetched successfully',
        'data' => $resultset
    ];
    echo json_encode($data);
   
}else{
    $data =[
        'success' => false,
        'message' =>'Something went wrong'
        
    ];
    echo json_encode($data);
}

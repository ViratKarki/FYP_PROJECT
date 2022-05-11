<?php
header("Access-Control-Allow-Origin: *");
include 'DatabaseConfig.php';

// Creating MySQL Connection.
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

if (
    isset($_POST['id']) && 
    isset($_POST['name']) &&
    isset($_POST['email']) &&
    isset($_POST['address']) &&
    isset($_POST['contact']) &&
	isset($_POST['bloodgroup']) &&
    isset($_POST['username']) 
    ) //check is token is sent by the user
{

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
	$bloodgroup = $_POST['bloodgroup'];
    $username = $_POST['username'];

    $checkQuery = "SELECT * FROM USERS WHERE ID='$id'";
    $sendingQuery = mysqli_query($con, $checkQuery);
    $checkQuery = mysqli_num_rows($sendingQuery);
  
    if ($checkQuery > 0){
        updateUser();
    }else{
        $data = [
            'success' => false,
            'message' => 'User not found'

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

function updateUser(){
    global $id;
    global $name;
    global $email;
    global $contact;
    global $address;
    global $bloodgroup;
	global $username;
    global $con;
    $query = "UPDATE USERS SET NAME = '$name', EMAIL= '$email', CONTACT='$contact', ADDRESS='$address', BLOODGROUP='$bloodgroup' WHERE ID='$id'";
    $sendingQuery = mysqli_query($con, $query);
    if ($sendingQuery){
        $resultset[] = array(
            "id" => $id,
            "name" => $name,
            "username" => $username,
            "email" => $email,
            "contact" => $contact,
            "address" => $address,
			"bloodgroup" => $bloodgroup,
        );
        $data = [
            'success' => true,
            'message' => 'User details updated successfully',
            'data'=>$resultset,
            

        ];
        echo json_encode($data);
    }else{
        $data = [
            'success' => false,
            'message' => 'Failed to update details'

        ];
        echo json_encode($data);
    }
}
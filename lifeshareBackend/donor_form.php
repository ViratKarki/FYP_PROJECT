<?php
header("Access-Control-Allow-Origin: *");
 include 'DatabaseConfig.php';
 // Creating MySQL Connection.
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
 if( isset($_POST['id'])
 && isset($_POST['email']) 	 
 && isset($_POST['bloodgroup']) 
 && isset($_POST['address'])
 && isset($_POST['contactno'])
 && isset($_POST['age'])
 && isset($_POST['fullname'])	
 ) 
    {
	$id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $bloodgroup = $_POST['bloodgroup'];
	$address = $_POST['address'];
    $contactno =$_POST['contactno'];
    $age = $_POST['age'];
	$email = $_POST['email'];
	
    $message=[];

    if(userIdChecker($id)){
        $message[]="You're already a donor";
    }
    if((!userIdChecker($id))){
        tryDonor();
    }else{
        $data=[
            'id'=>$id,
            'success'=>false,
            'message'=>$message
        ];
        echo json_encode($data);
    }
    }else{
    $data=['success'=>false, 'message'=>['Please fill all the fields']];

    echo json_encode($data);
}


function userIdChecker($id)
{
    global $con;
    $userQuery = "SELECT * FROM donor WHERE id ='$id'";
    $sendingQuery = mysqli_query($con, $userQuery);
    $checkQuery = mysqli_num_rows($sendingQuery);

    if ($checkQuery > 0) {
        // if id is already registered
       
       return true;
    } else {
        return false;
    }
}


function tryDonor()
{
    global $con;
	global $id;
    global $email;
    global $contactno;
    global $fullname;
	global $bloodgroup;
    global $address;
    global $age;

    $query = "INSERT INTO donor (fullname,bloodgroup,address,contactno,age,id,email)VALUES('$fullname','$bloodgroup','$address','$contactno','$age','$id','$email')";
     $result = mysqli_query($con, $query);
    if ($result){
        //after the query is sucessfully executed!
        $data=[
            'success'=>true,
            'message'=>['Congrats! Now, you become a donor.']
        ];
        echo json_encode($data);

    } else {

        $data=[
            'success'=>false,
            'message'=>['Something went wrong']
        ];
        echo json_encode($data);
    }	
}

?>

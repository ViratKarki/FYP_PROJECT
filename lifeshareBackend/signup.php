<?php

 include 'DatabaseConfig.php';
 // Creating MySQL Connection.
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
 if( isset($_POST['email']) 
 && isset($_POST['password']) 
 && isset($_POST['contact']) 
 && isset($_POST['name']) 
 && isset($_POST['address'])
 && isset($_POST['bloodgroup'])
 && isset($_POST['username'])) //check is token is sent by the user
    {

    $email = $_POST['email'];
    $username = $_POST['username'];
    $contact =$_POST['contact'];
    $name = $_POST['name'];
    $address = $_POST['address'];
	$bloodgroup = $_POST['bloodgroup'];
    $password = $_POST['password'];
    $message=[];

    if(emailChecker($email)){
        $message[]="Email is already exist";
    }
    if(usernameChecker($username)){
        $message[]="Username is already exist";
    }
    if((!emailChecker($email)) && (!usernameChecker($username))){
        trySignup();
    }else{
        $data=[
            'email'=>$email,
            'success'=>false,
            'message'=>$message
        ];
        echo json_encode($data);
    }
    //Applying User Login query with email and password.
 
    }else{
    $data=['success'=>false, 'message'=>['Please fill all the fields']];

    echo json_encode($data);
}
function emailChecker($email)
{
    global $con;
    $userQuery = "SELECT * FROM users WHERE email ='$email'";
    $sendingQuery = mysqli_query($con, $userQuery);
    $checkQuery = mysqli_num_rows($sendingQuery);

    if ($checkQuery > 0) {
        // if email is already registered
       
       return true;
    } else {
        return false;
    }
}

function usernameChecker($username){
    global $con;
    $userQuery = "SELECT * FROM users WHERE username ='$username'";
    $sendingQuery = mysqli_query($con, $userQuery);
    $checkQuery = mysqli_num_rows($sendingQuery);

    if ($checkQuery > 0) {
        // if Username is already registered
       return true;
    } else {
        return false;
    }
}

function trySignup()
{
    global $con;
    global $email;
    global $contact;
    global $name;
    global $address;
    global $password;
	global $bloodgroup;
    global $username;

    $hashPwd = password_hash($password, PASSWORD_DEFAULT);

    $insert = "INSERT INTO users (username,contact,name,address,email,password,bloodgroup)VALUES('$username','$contact','$name','$address','$email','$hashPwd','$bloodgroup')";
    $query = mysqli_query($con, $insert);
    
    if ($query) {
        //after the query is sucessfully executed!
        $data=[
            'email'=>$email,
            'success'=>true,
            'message'=>['Signup Successful.']
        ];
        echo json_encode($data);

    } else {

        $data=[
            'email'=>$email,
            'success'=>false,
            'message'=>['Something went wrong']
        ];
        echo json_encode($data);
    }
}

?>

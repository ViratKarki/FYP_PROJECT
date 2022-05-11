<?php
function chekifUserExist($userid)
{
    global $con;
    $sql = "SELECT * FROM users where id = '$userid'";
    // $sql = "SELECT * FROM categories";
    $result = mysqli_query($con, $sql);
    if ($result) {
        //after the query is sucessfully executed!
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    } else {
        $data = [
            'success' => false,
            'message' => ['Something went wrong.']
        ];
        echo json_encode($data);
        return false;
    }
}
 function checkIfUserIsAdmin($userid)
{
    # code...
    global $con;
    $sql = "SELECT * FROM users where id = '$userid'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        //after the query is sucessfully executed!
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($row['isAdmin'] == 1) {
                return true;
            } else {
                return false;
            }
        } else {
            //user not found
            $data = [
                'success' => false,
                'message' => ['User Not found.']
            ];
            echo json_encode($data);
            return false;
        }
    } else {
        $data = [
            'success' => false,
            'message' => ['Something went wrong.']
        ];
        echo json_encode($data);
        return false;
    }
}

?>
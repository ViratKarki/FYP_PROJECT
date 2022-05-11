<?php
function getUser($userid)
{
    global $con;
    $sql = "SELECT * FROM users where id = '$userid'";
    // $sql = "SELECT * FROM categories";
    $query = mysqli_query($con, $sql);
    if ($query) {
        //after the query is sucessfully executed!
        while ($row = mysqli_fetch_assoc($query)) {
            $resultset[] = array(
                "id" => $row['id'],
                "name" => $row['name'],
                "username" => $row['username'],
                "email" => $row['email'],
                "contact" => $row['contact'],
                "address" => $row['address'],
				"bloodgroup" => $row['bloodgroup'],
            );
        }
        if (!empty($resultset)) {
            $data = [
                'success' => true,
                'message' => ['Login Successful.'],
                'data' => $resultset

            ];
            echo json_encode($data);
        }
    } else {
        $data = [
            'success' => false,
            'message' => ['Something went wrong.']
        ];
        echo json_encode($data);
    }
}

?>
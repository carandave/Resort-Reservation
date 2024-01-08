<?php 

include('../database/connect.php');

if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $sql = "SELECT * FROM people WHERE people_Id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'User not found']);
    }
}

?>
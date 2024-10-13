<?php


include('func/connect.php'); 


session_start();
$current_user_id = $_SESSION['id'];


$query = "SELECT * FROM users WHERE id = $current_user_id";
$result = mysqli_query($conn, $query);
$current_user = mysqli_fetch_assoc($result);
$current_user_privilege = $current_user['privilege'];

$target_user_id = $_GET['id']; 
$query = "SELECT * FROM users WHERE id = $target_user_id";
$result = mysqli_query($conn, $query);
$target_user = mysqli_fetch_assoc($result);
$target_user_privilege = $target_user['privilege'];


if ($current_user_privilege > $target_user_privilege) {
    $delete_query = "DELETE FROM users WHERE id = $target_user_id";
    if (mysqli_query($conn, $delete_query)) {
        echo "deleting user is completed";
    } else {
        echo "error " . mysqli_error($conn);
    }
} else {
    
    echo "You do not have permission to delete this user";
}

mysqli_close($conn);
?>


?>
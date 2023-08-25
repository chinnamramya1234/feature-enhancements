<?php
session_start();
include 'bootstrap.php';
$conn = new mysqli("localhost", "root", "", "task3");


if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM cart WHERE id='$id'";

    $result = $conn->query($sql);

    if($result == TRUE) {
        //header('Location : view_cart.php');
        echo "Record deleted successfully.";
        //exit();
    }else{
        echo "Error: " . $sql . "<br>" .$conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
    <p><a href="view_cart.php">Back to viewing cart details</a></p>
</html>
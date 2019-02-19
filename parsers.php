<?php
if (isset($_POST['send_uname'])) {
    $uname = $_POST['send_uname'];
    if ($uname == "") {
        echo "Pleass fill this area!";
    } else {
        require "connection.php";
        $sql = "SELECT `user_id` FROM admin WHERE user_email = '$uname'";
        $query = mysqli_query($con,$sql);
        $rows = mysqli_num_rows($query);
        if ($rows > 0) {
            echo "taken";
        } else {
            echo "ok";
        }
        
    }
}
?>
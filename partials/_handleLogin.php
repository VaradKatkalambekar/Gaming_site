<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $username = $_POST['username'];
    $password = $_POST['loginPassword'];

    $sql = "SELECT * from `organizations` WHERE org_username='$username' ";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
        $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['org_password'])){
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['org_id'] = $row['org_id'];
                $_SESSION['username'] = $username;
                echo "loggedin". $username;
            }
            header("Location: /app/index.php");
        }
    }


?>
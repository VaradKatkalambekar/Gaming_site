<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $org_name = $_POST['Org_name'];
    $org_owner = $_POST['Org_owner'];
    $org_username = $_POST['Org_username'];
    $org_email = $_POST['Org_email'];
    $org_contact = $_POST['Mobile_num'];
    $org_password = $_POST['pass'];
    $org_cpassword = $_POST['cpass'];
    $org_discord = $_POST['discord'];
    $org_instagram = $_POST['instagram'];
    $org_youtube = $_POST['youtube'];

   
    
    //check if this org is already present
    $existSql = "SELECT * from `organizations` WHERE org_name='$org_name' OR org_username='$org_username' OR org_email='$org_email' OR org_contact='$org_contact' "; 
    $result = mysqli_query($conn,$existSql);
    $numRows = mysqli_num_rows($result);
    
    if($numRows>0){
        $showError = "Organization Already exists";
    }
    else{
        if($org_password == $org_cpassword){
            $hash = password_hash($org_password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `organizations` (`org_name`, `org_owner`, `org_username`, `org_email`, `org_contact`, `org_password`, `org_discord`, `org_instagram`, `org_youtube`) VALUES ('$org_name', '$org_owner', '$org_username', '$org_email', '$org_contact', '$hash', '$org_discord', '$org_instagram', '$org_youtube')";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
                header("Location: /app/index.php?signupsuccess=true");
                exit();
            }

        }
        else{
            $showError="Passwords do not match";
                      
        }
    }
    header("Location: /app/index.php?signupsuccess=false&error=$showError");
}

?>
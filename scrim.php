<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>SCRIMS</title>
</head>

<body>
    <?php include "partials/_footer.php"; ?>
    <?php include "partials/_dbconnect.php"; ?>
    <?php include "partials/_header.php"; ?>

    <?php
    $scrim_id = $_GET['scrim_id'];
    $sql = "SELECT * FROM `scrims` WHERE scrim_id = $scrim_id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $scrim_date = $row['scrim_date'];
        $scrim_details = $row['scrim_details'];
        $scrim_lobby_id = $row['scrim_lobby_id'];
        $scrim_lobby_pass = $row['scrim_lobby_pass'];
        $scrim_organizer = $row['scrim_organizer_id'];
        $sql2 = "SELECT org_username FROM `organizations` WHERE org_id='$scrim_organizer' ";
        $result2 = mysqli_query($conn, $sql2);
        $row2= mysqli_fetch_assoc($result2);
    }
    ?>


<?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST'){
        //insert into DB
        // $scrim_date = $_POST['scrim_date'];
        // $scrim_details = $_POST['scrim_details'];  
        $leader_name = $_POST['playername'];
        $player1_UID = $_POST['UID1'];
        $player2_UID = $_POST['UID2'];
        $player3_UID = $_POST['UID3'];
        $player4_UID = $_POST['UID4'];
        $player5_UID = $_POST['UID5'];
        $player6_UID = $_POST['UID6'];
        $leader_contact_number = $_POST['Mobile_num'];
        $sql = "INSERT INTO `teams` (`scrim_id`, `leader_name`, `UID1`, `UID2`, `UID3`, `UID4`, `UID5`, `UID6`, `team_contact`) VALUES ('$scrim_id', '$leader_name', '$player1_UID', '$player2_UID', '$player3_UID', '$player4_UID', '$player5_UID', '$player6_UID', '$leader_contact_number')"; 
        $result = mysqli_query($conn , $sql);
        $showAlert = true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your Entry has been sent to the Organization!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    ?>


    <div class="container-fluid my-3">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Featured UPYO Scrims</h1>
            </div>
            <div class="card-body">
                <h2 class="card-title">Welcome to the Scrim organized by <?php echo $row2['org_username'];?></h2>
                <p class="card-text">Date : <?php echo $scrim_date ?></p>
                <p class="card-text">Details : <?php echo $scrim_details ?></p>
                <p class="card-text">Lobby ID :<?php echo $scrim_lobby_id ?></p>
                <p class="card-text">Lobby Pass :<?php echo $scrim_lobby_pass ?></p>
            </div>
        </div>
    </div>


    <div class="container my-4">
        <h2>Join The Scrim!</h2>
        <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post" id="2">
            <div class="mb-3">
                <label for="playername" class="form-label">Enter Your Name</label>
                <input type="text" class="form-control" id="playername" name="playername" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="UID1" class="form-label">Enter Your UID</label>
                <input type="text" class="form-control" id="UID1" name="UID1" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="UID2" class="form-label">Enter Player 2 UID</label>
                <input type="text" class="form-control" id="UID2" name="UID2" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="UID3" class="form-label">Enter Player 3 UID</label>
                <input type="text" class="form-control" id="UID3" name="UID3" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="UID4" class="form-label">Enter Player 4 UID</label>
                <input type="text" class="form-control" id="UID4" name="UID4" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="UID5" class="form-label">Enter Player 5 UID <em>Write 0 if not applicable!</em></label>
                <input type="text" class="form-control" id="UID5" name="UID5" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="UID6" class="form-label">Enter Player 6 UID <em>Write 0 if not applicable!</em></label>
                <input type="text" class="form-control" id="UID6" name="UID6" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="Mobile_num" class="form-label">Please Enter your Mobile Number </label>
                <input type="tel" class="form-control" id="Mobile_num" name="Mobile_num" placeholder="xxxxxxxxxx"
                    pattern="[0-9]{10}" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1" required>Confirm The details once again!</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit your Details</button>
        </form>
    </div>

    <!-- <div class="container my-3">
        <h3 class="text-center">Browse through scrims hosted by orgs all over India</h3>
        <?php
    $game_id = $_GET['game_id'];
    $sql = "SELECT * FROM `scrims` WHERE scrim_game_id = $game_id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $scrim_id = $row['scrim_id'];
        $scrim_organizer = $row['scrim_organizer_id'];
        $scrim_details = $row['scrim_details'];
        $scrim_date = $row['scrim_date'];
        echo '<div class="row my-3">
            <div class="col-sm-6">
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title">H2K Esports</h5>
                        <p class="card-text">Date : '.$scrim_date.'</p>
                        <p class="card-text">Details : '.$scrim_details.'</p>
                        <a href="scrim.php" class="btn btn-primary">Join the Scrim</a>
                    </div>
                </div>
            </div>';       
    }
    ?> -->

    <!-- <div class="col-sm-6">
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title">H2K Esports</h5>
                        <p class="card-text">Date</p>
                        <p class="card-text">Details</p>
                        <a href="#" class="btn btn-primary">Join the Scrim</a>
                    </div>
                </div>
            </div> -->

    </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
</body>

</html>
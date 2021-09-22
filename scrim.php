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
        $scrim_game_id = $row['scrim_game_id'];
        $sql2 = "SELECT org_username FROM `organizations` WHERE org_id='$scrim_organizer' ";
        $result2 = mysqli_query($conn, $sql2);
        $row2= mysqli_fetch_assoc($result2);
        $sql3 = "SELECT org_discord FROM `organizations` WHERE org_id='$scrim_organizer' ";
        $result3 = mysqli_query($conn, $sql3);
        $row3= mysqli_fetch_assoc($result3);
        $sql4 = "SELECT org_instagram FROM `organizations` WHERE org_id='$scrim_organizer' ";
        $result4 = mysqli_query($conn, $sql4);
        $row4= mysqli_fetch_assoc($result4);
        $sql5 = "SELECT org_youtube FROM `organizations` WHERE org_id='$scrim_organizer' ";
        $result5 = mysqli_query($conn, $sql5);
        $row5= mysqli_fetch_assoc($result5);
    }
    ?>


    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST'){
        //insert into DB
        // $scrim_date = $_POST['scrim_date'];
        // $scrim_details = $_POST['scrim_details'];  
        $team_name = $_POST['teamname'];
        $leader_name = $_POST['playername'];
        $player1_UID = $_POST['UID1'];
        $player2_UID = $_POST['UID2'];
        $player3_UID = $_POST['UID3'];
        $player4_UID = $_POST['UID4'];
        $player5_UID = $_POST['UID5'];
        $player6_UID = $_POST['UID6'];
        $leader_discord_tag = $_POST['leader_discord'];
        $leader_contact_number = $_POST['Mobile_num'];
        $sql = "INSERT INTO `teams` (`scrim_id`, `team_name`, `discord_tag_leader`,`leader_name`, `UID1`, `UID2`, `UID3`, `UID4`, `UID5`, `UID6`, `team_contact`) VALUES ('$scrim_id', '$team_name','$leader_discord_tag','$leader_name', '$player1_UID', '$player2_UID', '$player3_UID', '$player4_UID', '$player5_UID', '$player6_UID', '$leader_contact_number')"; 
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


    <div class="container-fluid my-4">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Featured UPYO Scrims</h1>
            </div>
            <div class="card-body">
                <h2 class="card-title">Welcome to the Scrim organized by <?php echo $row2['org_username'];?></h2>
                <p class="card-text"><b>Date</b> : <?php echo $scrim_date ?></p>
                <p class="card-text"><b>Details</b> : <?php echo $scrim_details ?></p>
                <p class="card-text"><b>Lobby ID</b> : <?php echo $scrim_lobby_id ?></p>
                <p class="card-text"><b>Lobby Pass</b> :<?php echo $scrim_lobby_pass ?></p>
                <p>We request all the Team Leaders to join our Discord Servers for connecting with our Organizations!
                </p>
                <ul class="nav col-md-4 list-unstyled d-flex my-3">
                    <li class="ms-3"><a class="text-muted" href="'.$row3['org_discord'].'"><svg width="24" height="24"
                                xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                <path
                                    d="M19.54 0c1.356 0 2.46 1.104 2.46 2.472v21.528l-2.58-2.28-1.452-1.344-1.536-1.428.636 2.22h-13.608c-1.356 0-2.46-1.104-2.46-2.472v-16.224c0-1.368 1.104-2.472 2.46-2.472h16.08zm-4.632 15.672c2.652-.084 3.672-1.824 3.672-1.824 0-3.864-1.728-6.996-1.728-6.996-1.728-1.296-3.372-1.26-3.372-1.26l-.168.192c2.04.624 2.988 1.524 2.988 1.524-1.248-.684-2.472-1.02-3.612-1.152-.864-.096-1.692-.072-2.424.024l-.204.024c-.42.036-1.44.192-2.724.756-.444.204-.708.348-.708.348s.996-.948 3.156-1.572l-.12-.144s-1.644-.036-3.372 1.26c0 0-1.728 3.132-1.728 6.996 0 0 1.008 1.74 3.66 1.824 0 0 .444-.54.804-.996-1.524-.456-2.1-1.416-2.1-1.416l.336.204.048.036.047.027.014.006.047.027c.3.168.6.3.876.408.492.192 1.08.384 1.764.516.9.168 1.956.228 3.108.012.564-.096 1.14-.264 1.74-.516.42-.156.888-.384 1.38-.708 0 0-.6.984-2.172 1.428.36.456.792.972.792.972zm-5.58-5.604c-.684 0-1.224.6-1.224 1.332 0 .732.552 1.332 1.224 1.332.684 0 1.224-.6 1.224-1.332.012-.732-.54-1.332-1.224-1.332zm4.38 0c-.684 0-1.224.6-1.224 1.332 0 .732.552 1.332 1.224 1.332.684 0 1.224-.6 1.224-1.332 0-.732-.54-1.332-1.224-1.332z" />
                            </svg></a></li>
                    <li class="ms-3"><a class="text-muted" href="'.$row4['org_instagram'].'"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg></a></li>
                    <li class="ms-3"><a class="text-muted" href="'.$row5['org_youtube'].'"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path
                                    d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                            </svg></a></li>
                </ul>
            </div>
        </div>
    </div>

    <hr>

    <div class="container">
        <?php
    //BGMI
    if($scrim_game_id==1){
    echo '<div class="container my-3">
        <h2>Join The Scrim!</h2>
        <form action="'.$_SERVER["REQUEST_URI"].' method="post"" >
            <div class="mb-3">
                <label for="teamname" class="form-label">Enter Your Team Name</label>
                <input type="text" class="form-control" id="teamname" name="teamname" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="playername" class="form-label">Enter Your Name (IGL)</label>
                <input type="text" class="form-control" id="playername" name="playername" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="leader_discord" class="form-label">Enter Your Discord Tag (IGL) </label>
                <input type="text" class="form-control" id="leader_discord" name="leader_discord" aria-describedby="emailHelp" required>
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
                <label for="UID5" class="form-label">Enter Player 5 UID - (fill if applicable) </label>
                <input type="text" class="form-control" id="UID5" name="UID5" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="UID6" class="form-label">Enter Player 6 UID - (fill if applicable) </label>
                <input type="text" class="form-control" id="UID6" name="UID6" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="Mobile_num" class="form-label">Please Enter your Mobile Number </label>
                <input type="tel" class="form-control" id="Mobile_num" name="Mobile_num" placeholder="xxxxxxxxxx"
                    pattern="[0-9]{10}" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                <label class="form-check-label" for="exampleCheck1" required>Confirm The details once again!</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit your Details</button>
        </form>
    </div>';}

    //Valorant
    if($scrim_game_id==2){
        echo '<div class="container my-3">
            <h2>Join The Scrim!</h2>
            <form action="'.$_SERVER["REQUEST_URI"].' method="post"" >
                 <div class="mb-3">
                    <label for="teamname" class="form-label">Enter Your Team Name</label>
                    <input type="text" class="form-control" id="teamname" name="teamname" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="playername" class="form-label">Enter Your Name (IGL)</label>
                    <input type="text" class="form-control" id="playername" name="playername" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="leader_discord" class="form-label">Enter Your Discord Tag (IGL) </label>
                    <input type="text" class="form-control" id="leader_discord" name="leader_discord" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="UID1" class="form-label">Enter Your Game Tag (IGL)</label>
                    <input type="text" class="form-control" id="UID1" name="UID1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="UID2" class="form-label">Enter Player 2 Game Tag</label>
                    <input type="text" class="form-control" id="UID2" name="UID2" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="UID3" class="form-label">Enter Player 3 Game Tag</label>
                    <input type="text" class="form-control" id="UID3" name="UID3" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="UID4" class="form-label">Enter Player 4 Game Tag</label>
                    <input type="text" class="form-control" id="UID4" name="UID4" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="UID5" class="form-label">Enter Player 5 Game Tag</label>
                    <input type="text" class="form-control" id="UID5" name="UID5" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="UID6" class="form-label">Enter Player 6 Game Tag <em>"If Applicable"</em></label>
                    <input type="text" class="form-control" id="UID6" name="UID6" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="Mobile_num" class="form-label">Please Enter your Mobile Number </label>
                    <input type="tel" class="form-control" id="Mobile_num" name="Mobile_num" placeholder="xxxxxxxxxx"
                        pattern="[0-9]{10}" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1" required>Confirm The details once again!</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit your Details</button>
            </form>
        </div>';}

        //CODM
        if($scrim_game_id==3){
            echo '<div class="container my-3">
                <h2>Join The Scrim!</h2>
                <form action="'.$_SERVER["REQUEST_URI"].' method="post"" >
                    <div class="mb-3">
                        <label for="teamname" class="form-label">Enter Your Team Name</label>
                        <input type="text" class="form-control" id="teamname" name="teamname" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="playername" class="form-label">Enter Your Name (IGL)</label>
                        <input type="text" class="form-control" id="playername" name="playername" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="leader_discord" class="form-label">Enter Your Discord Tag (IGL) </label>
                        <input type="text" class="form-control" id="leader_discord" name="leader_discord" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="UID1" class="form-label">Enter Your UID (IGL)</label>
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
                        <label for="UID5" class="form-label">Enter Player 5 UID - (if applicable)</label>
                        <input type="text" class="form-control" id="UID5" name="UID5" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="UID6" class="form-label">Enter Player 6 UID - (if applicable)</label>
                        <input type="text" class="form-control" id="UID6" name="UID6" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="Mobile_num" class="form-label">Please Enter your Mobile Number </label>
                        <input type="tel" class="form-control" id="Mobile_num" name="Mobile_num" placeholder="xxxxxxxxxx"
                            pattern="[0-9]{10}" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        <label class="form-check-label" for="exampleCheck1" required>Confirm The details once again!</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit your Details</button>
                </form>
            </div>';}

            //FREEFIRE
            if($scrim_game_id==4){
                echo '<div class="container my-3">
                    <h2>Join The Scrim!</h2>
                    <form action="'.$_SERVER["REQUEST_URI"].' method="post"" >
                        <div class="mb-3">
                            <label for="teamname" class="form-label">Enter Your Team Name</label>
                            <input type="text" class="form-control" id="teamname" name="teamname" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="playername" class="form-label">Enter Your Name (IGL)</label>
                            <input type="text" class="form-control" id="playername" name="playername" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="leader_discord" class="form-label">Enter Your Discord Tag (IGL) </label>
                            <input type="text" class="form-control" id="leader_discord" name="leader_discord" aria-describedby="emailHelp" required>
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
                            <label for="UID5" class="form-label">Enter Player 5 UID -<em>(if applicable)</em></label>
                            <input type="text" class="form-control" id="UID5" name="UID5" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="UID6" class="form-label">Enter Player 6 UID -<em>(if applicable)</em></label>
                            <input type="text" class="form-control" id="UID6" name="UID6" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="Mobile_num" class="form-label">Please Enter your Mobile Number </label>
                            <input type="tel" class="form-control" id="Mobile_num" name="Mobile_num" placeholder="xxxxxxxxxx"
                                pattern="[0-9]{10}" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                            <label class="form-check-label" for="exampleCheck1" required>Confirm The details once again!</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit your Details</button>
                    </form>
                </div>';}
    
    ?>
    </div>

    <hr>

    <div class="container-fluid">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://source.unsplash.com/2400x800/?esports" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/2400x800/?computers" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/2400x800/?gaming" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
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
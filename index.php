<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>UPYO</title>
</head>

<body>
    <?php include "partials/_footer.php"; ?>
    <?php include "partials/_dbconnect.php"; ?>
    <?php include "partials/_header.php"; ?>

    <!-- Slider Starts here -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner carousel-fade">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/2400x800/?esports,esl" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x800/?gaming,videogames" class="d-block w-100"
                    alt="..." />
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x800/?players, guns" class="d-block w-100" alt="..." />
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>



    <div class="container my-3">
        <h2 class="text-center">Games hosted on our Platform</h2>
        <div class="row">
            <?php
            $sql = "SELECT * FROM `game_category`";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){
                $game_name = $row['game_name'];
                $game_description = $row['game_description'];
                $game_id = $row['game_id'];
                if($game_id==1){
                echo '<div class="col-md-4 my-4">
          <div class="card" style="width: 18rem">
            <img
              src="/app/media/1.png"
              class="card-img-top"
              alt="..."
            />
            <div class="card-body">
              <h5 class="card-title"><a href="scrimlist.php?game_id='.$game_id.'">'.$game_name.'</a></h5>
              <p class="card-text">
              ' . substr($game_description, 0, 125).  '.....
              </p>
              <a href="scrimlist.php?game_id='.$game_id.'" class="btn btn-primary">Browse Scrims</a>
            </div>
          </div>
        </div>';
        }
        if($game_id==2){
            echo '<div class="col-md-4 my-4">
      <div class="card" style="width: 18rem">
        <img
          src="/app/media/2.png"
          class="card-img-top"
          alt="..."
        />
        <div class="card-body">
          <h5 class="card-title"><a href="scrimlist.php?game_id='.$game_id.'">'.$game_name.'</a></h5>
          <p class="card-text">
          ' . substr($game_description, 0, 125).  '.....
          </p>
          <a href="scrimlist.php?game_id='.$game_id.'" class="btn btn-primary">Browse Scrims</a>
        </div>
      </div>
    </div>';
    }
            if($game_id==3){
                echo '<div class="col-md-4 my-4">
        <div class="card" style="width: 18rem">
            <img
            src="/app/media/3.png"
            class="card-img-top"
            alt="..."
            />
            <div class="card-body">
            <h5 class="card-title"><a href="scrimlist.php?game_id='.$game_id.'">'.$game_name.'</a></h5>
            <p class="card-text">
            ' . substr($game_description, 0, 125).  '.....
                </p>
                <a href="scrimlist.php?game_id='.$game_id.'" class="btn btn-primary">Browse Scrims</a>
                </div>
                </div>
                </div>';
                }
            if($game_id==4){
                echo '<div class="col-md-4 my-4">
            <div class="card" style="width: 18rem">
            <img
            src="/app/media/4.png"
            class="card-img-top"
            alt="..."
            />
            <div class="card-body">
            <h5 class="card-title"><a href="scrimlist.php?game_id='.$game_id.'">'.$game_name.'</a></h5>
            <p class="card-text">
            ' . substr($game_description, 0, 125).  '.....
            </p>
            <a href="scrimlist.php?game_id='.$game_id.'" class="btn btn-primary">Browse Scrims</a>
            </div>
            </div>
            </div>';
            }
    
    
    
    }
        ?>
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
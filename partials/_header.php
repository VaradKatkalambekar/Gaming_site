<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">UPYO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog.php">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="calender.php">Calender</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Esports
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Our Partner Orgs</a></li>
                        <li><a class="dropdown-item" href="#">Calender</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="https://forms.gle/CfaQ7vzGNkqzjGuF6">Join Us</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Jobs</a>
                </li>
            </ul>

            <?php
      session_start();
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo '<p class="text-light my-0 mx-2"> Welcome '.$_SESSION['username'].'</p>       
        <a href="partials/_logout.php" class="btn btn-success mx-1"  type="submit">Logout</a>';
      }
      

      else{
      echo '<button class="btn btn-success mx-2"  data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit">Login</button>
      <button class="btn btn-success mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal1" type="submit">Org Signup</button>
    </div>';}
    ?>


        </div>
</nav>

<?php include "partials/_loginModal.php"; ?>
<?php include "partials/_signupModal.php"; ?>

<?php
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> Your Organization is registered on our Website! Login to create Scrims!!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
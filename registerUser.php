<?php

    include('session.php');
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start</title>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous"
  />
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container justify-content-center">
            <a  href="#" class="navbar-brand">Learn Unity</a>

           <!--  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu ">
                <span class="navbar-toggler-icon"></span>
            </button>
 -->
            <!-- <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="about.php" class="nav-link">About me</a>
                    </li>
                </ul>
            </div> -->
        </div>
    </nav>
    <div class="container my-5 padding-bottom-5px d-flex justify-content-center">
        <div class="">
            <div class="card-md-5 bg-light card d-flex justify-content-center p-2 rounded border-dark">
                <form action="check.php" method="POST" class="d-flex flex-column justify-content-center">
                        <div class="mb-3">
                            <label for="runame" class="form-label">Username</label>
                            <input type="text" class="form-control" id="runame" name="runame">
                        </div>
                        <div class="mb-3">
                            <label for="rpwd" class="form-label">Password</label>
                            <input type="password" class="form-control" id="rpwd" name="rpwd">
                        </div>
                        <div class="mb-3">
                            <label for="remail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="remail" name="remail">
                        </div>
                        <button type="submit" class="btn btn-primary w-100" name="CreateUser">Create User</button>
                        <p class="d-flex jusdtify-content-center text-center">or <br> if you already have an account</p>
                        <button type="submit" class="btn btn-primary w-100" name="SignIn">Sign In Here</button>
                        <?php

                if (isset($_SESSION['felMedelande'])) {
                    echo "<br><p class=\"d-flex text-center mx-auto\">" . $_SESSION['felMedelande'] . "</p>";
                }

                ?>
                </form>
                
            </div>
        </div>
    </div>
    

    <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"
  ></script>
  <noscript>Please enable support for JavaScript</noscript>
</body>
</html>
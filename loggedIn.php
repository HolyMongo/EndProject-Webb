<?php
  include_once("dbcon.php"); 
  include("session.php");
//om användaren vill logga ut/klickade på logga ut knappen
  if (isset($_POST['SignOut'])) {
    unset($_SESSION['userID']);
    unset($_SESSION['uname']);
    unset($_SESSION['ModuleID']);
  }

  //om användaren inte är inloggad
  if (!isset($_SESSION['userID']) || !isset($_SESSION['uname'])) {
    header('location: index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn Unity</title>
    <link rel="stylesheet" href="style.css">
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous"
  />
</head>
<body class="overflow-visible">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
          <a  href="#" class="navbar-brand">Learn Unity</a>

          <form action="loggedIn.php" method="POST">
            <input type="submit" name="SignOut" value="Sign Out" class="btn btn-outline-light">
          </form>
        </div>
    </nav>
   
    <div class="container">
      <div class="row">
        <div class="col-md-4">
        <nav class="navbar navbar-expand-md navbar-light bg-light justify-content-center">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
   
          <?php

          $alreadyPutOlTag = false;


          //Hämtar alla uppgifter från databasen och sorterar dem med modulnumret
            $stmt = $pdo->prepare("SELECT * FROM modules ORDER BY ModuleNumber");
            $stmt->execute(array());


            $res = array();
            
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);  
            $ModuleList = "<ol id=\"moduleList\" class=\"rounded-list mr-auto\">";
            //En foreach-loop som lägger in alla moduler i en lista och ger dem olika classer och id:n beroende på om de är sub-uppgifter eller inte
            foreach ($res as $module) {
              $stmt = $pdo->prepare("SELECT * FROM progress WHERE userID = :userID AND moduleID = :moduleID");
              $stmt->execute(array('userID' => $_SESSION['userID'], 'moduleID' => $module['moduleID']));
              $res2 = array();
              $res2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
              if (floor($module['ModuleNumber']) != $module['ModuleNumber'] && !$alreadyPutOlTag) {
                $alreadyPutOlTag = true;
                $ModuleList .= "<ol id=\"moduleList\" class=\"rounded-list\">";
              }elseif(floor($module['ModuleNumber']) == $module['ModuleNumber'] && $alreadyPutOlTag) { 
                $alreadyPutOlTag = false;
                $ModuleList .= "</ol>";
              }
                $ModuleList .= "<li class=\"ModuleItem nav-item active";
                if (isset($res2[0])) {
                  $ModuleList .= " isCompleted";
                }
                $ModuleList .= "\">" . "<p id=\"" . $module['ModuleName'] ."\" class=\"nav-link\">" .$module['DisplayName'] . "</p></li> ";
            }
            $ModuleList .= "</ol>";
            echo $ModuleList;

          ?>
          </div>
          </nav>
      </div>
      <div class="col-md-8 mt-2 h-50">
        

          <div class="border border-dark p-2 overflow-auto h-50 " id="ModuleContent">
              <?php
              //Om get variabeln är satt så letar vi på uppgiften med det modulnamnet
            if (isset($_GET['assignment'])) {
              $stmt = $pdo->prepare("SELECT * FROM modules WHERE ModuleName = :moduleName");
              $stmt->execute(array('moduleName' => $_GET['assignment']));
              $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
              //hittar vi något skriver vi ut den uppgiften
              if (isset($res[0]['content'])) { 
                //sätter session variabler till den datan som vi hämtade och skriver ut den
                $_SESSION['ModuleID'] = $res[0]['moduleID'];
                $_SESSION['ModuleName'] = $res[0]['ModuleName'];
                
                $stmt = $pdo->prepare("SELECT * FROM progress WHERE userID = :userID AND moduleID = :moduleID");
                $stmt->execute(array('userID' => $_SESSION['userID'], 'moduleID' => $module['moduleID']));
                $res2 = array();
                $res2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                
                echo $res[0]['content'];
              }
              else { //om vi inte hittar någont i databasen så skriver vi ut ett litet felmedelande
                echo "Hmmm.... cant seem to find the assignment";
              }
            }
            else // om Get variabeln inte har ett värde så 
            {
              echo "Click on an assignment to start";
            }
            
            ?>
          </div>
      </div>
    </div>
  </div>
  
  <script src="js.js"></script>
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


</body>
</html>
<?php
    include_once("dbcon.php");
    include("session.php");

    //kollar om det finns data för både användarID och moludID. Om det inte finns så skickas användaren tillbaka till LoggedIn.php
    if (isset($_SESSION['userID']) && isset($_SESSION['ModuleID'])) {
        //Om det finns så kopieras de till nya variabler som senare används till att söka efter data i databasen
        $ModuleID = $_SESSION['ModuleID'];
        $UserID = $_SESSION['userID'];



        $sql = "SELECT * FROM progress WHERE UserID = :userID && ModuleID = :moduleID";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array('userID' => $UserID, 'moduleID' => $ModuleID));
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        //Om det redan finns en kombination av dessa två värden i databasen så vill vi inte skicka in den utan skicka användaren tillbaka till LoggedIn.php
        if (!isset($res[0])) {
            //annars så skickar vi in den datan i databasen
            $sql = "INSERT INTO progress(UserID, ModuleID) VALUES ('$UserID', '$ModuleID')";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array());
            
            echo "Inserted corerctly ;)";
            header('location: loggedIn.php?assignment=' . $_SESSION['ModuleName']);
        }
        else {
            echo "already marked as done!";
            header('location: loggedIn.php?assignment=' . $_SESSION['ModuleName']);
        }
        
    }
    else { 
        header('location: loggedIn.php');
    }
?>
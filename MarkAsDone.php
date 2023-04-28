<?php
    include_once("dbcon.php");
    include("session.php");

    $ModuleID = $_SESSION['ModuleID'];
    $UserID = $_SESSION['userID'];

    $sql = "INSERT INTO progress(UserID, ModuleID) VALUES ('$UserID', '$ModuleID')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array());

    echo "Hej";

?>
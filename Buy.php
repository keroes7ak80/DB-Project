<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname="Art_Gallery";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$GUN=$_SESSION["username"];
if(isset($_GET['id'])) 
$AID=$_GET['id'];


$conn->query("update artwork set GUN='$GUN' where ID='$AID'");
$conn->query("update artwork set Status='1' where ID='$AID'");
header('location: Art_Gallery_Main.php');
$conn->close();

?>
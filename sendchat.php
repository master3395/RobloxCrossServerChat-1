<html>
<head>
<?php
session_start();
$gameid = $_POST["gameid"];
$username = $_POST["username"];
$message = $_POST["message"];
$con = mysqli_connect("localhost",example,example,example);
if(mysqli_connect_errno()){
echo("Failed to connect to database. This is a server-side issue.");
}
elseif($gameid!=NULL and $username!=NULL and $message!=NULL){
if(!stristr($message,"</head>") and !stristr($message,"<username>") and !stristr($message,"</username>") and !stristr($message,"</message>") and !stristr($message,"<message>")){
$data = mysqli_query($con,"INSERT INTO Games (gameid,username,message) VALUES ('$gameid','$username','$message')");
}
if(!$data){
echo("Error sending data.");
}
else{
echo("Data received.");
mysqli_query($con,"DELETE FROM Games ORDER BY messageid LIMIT 1");
}
}
else{
echo("Check to make sure you are sending all required POST variables. We received: ".$gameid.$username.$message);
}
?>
</head>
<body></body>
</html>

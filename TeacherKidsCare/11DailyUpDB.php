
<?php
 error_reporting(0);
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "phplogin";

 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);

 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }

 if (!$conn->set_charset("utf8")) { printf("Error loading character set utf8: %s\n", $conn->error); exit();}

                                
$date1 =date("Y-m-d");
$username1 = $_POST["username"];
$q= "SELECT * from attendance WHERE date = '$date1' AND username = '$username1'";
$res= $conn->query($q);
$row = $res->fetch_assoc();

if ($_POST['sleep'] == '1') {
    $sql = "UPDATE  `attendance` 
    SET 
    SleepStatus =  'good'
    WHERE username =  '".$_POST["username"]."' AND date = CURDATE()";
    
    if ($conn->query($sql)==FALSE){
            echo "Error ".
            $conn->error;
        }
        else{
             header("Location:DailyUpdate.php");
            }
} 

if ($_POST['sleep'] == '2') {
    $sql = "UPDATE  `attendance` 
    SET 
    SleepStatus =  'ok'
    WHERE username =  '".$_POST["username"]."' AND date = CURDATE()";
    
    if ($conn->query($sql)==FALSE){
            echo "Error ".
            $conn->error;
        }
        else{
             header("Location:DailyUpdate.php");
            }

} 
if ($_POST['sleep'] == '3') {
    $sql = "UPDATE  `attendance` 
    SET 
    SleepStatus =  'little'
    WHERE username =  '".$_POST["username"]."' AND date = CURDATE()";
    
    if ($conn->query($sql)==FALSE){
            echo "Error ".
            $conn->error;
        }
        else{
             header("Location:DailyUpdate.php");
            }

} 

if ($_POST['sleep'] == '4') {
    $sql = "UPDATE  `attendance` 
    SET 
    SleepStatus =  'not sleep'
    WHERE username =  '".$_POST["username"]."' AND date = CURDATE()";
    
    if ($conn->query($sql)==FALSE){
            echo "Error ".
            $conn->error;
        }
        else{
             header("Location:DailyUpdate.php");
            }

} 



if ($_POST['food'] == '1') {
    $sql = "UPDATE  `attendance` 
    SET 
    FoodStatus =  'good'
    WHERE username =  '".$_POST["username"]."' AND date = CURDATE()";
    
    if ($conn->query($sql)==FALSE){
            echo "Error ".
            $conn->error;
        }
        else{
             header("Location:DailyUpdate.php");
            }
} 

if ($_POST['food'] == '2') {
    $sql = "UPDATE  `attendance` 
    SET 
    FoodStatus =  'ok'
    WHERE username =  '".$_POST["username"]."' AND date = CURDATE()";
    
    if ($conn->query($sql)==FALSE){
            echo "Error ".
            $conn->error;
        }
        else{
             header("Location:DailyUpdate.php");
            }

} 

if ($_POST['food'] == '3') {
    $sql = "UPDATE  `attendance` 
    SET 
    FoodStatus = 'little'
    WHERE username =  '".$_POST["username"]."' AND date = CURDATE()";
    
    if ($conn->query($sql)==FALSE){
            echo "Error ".
            $conn->error;
        }
        else{
             header("Location:DailyUpdate.php");
            }

} 

if ($_POST['food'] == '4') {
    $sql = "UPDATE  `attendance` 
    SET 
    FoodStatus = 'little'
    WHERE username =  '".$_POST["username"]."' AND date = CURDATE()";
    
    if ($conn->query($sql)==FALSE){
            echo "Error ".
            $conn->error;
        }
        else{
             header("Location:DailyUpdate.php");
            }

} 



?>
                               



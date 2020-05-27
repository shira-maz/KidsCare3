
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
$q= "SELECT date, username, attendanceStatus from attendance WHERE date = '$date1' AND username = '$username1'";
$res= $conn->query($q);
$row = $res->fetch_assoc();


if ($_POST['action'] == 'V') {
if($row['username'] == $username1 && $row['date'] == $date1){
    if($row['attendanceStatus'] == 'present' || $row['attendanceStatus'] == 'absent'){
        $sql = "UPDATE `attendance`
                SET
                attendanceStatus = 'present'
                WHERE username =  '".$_POST["username"]."' AND date = CURDATE()";
    }
}

else{                             
$sql = "INSERT INTO `attendance` (date, username, attendanceStatus)
VALUES
(' $date1', '".$_POST["username"]."', 'present')";
}

if ($conn->query($sql)==FALSE){
    echo "Error ".
    $conn->error;
    
}
else{
    header("Location:attendanceList.php");
}

}
else if ($_POST['action'] == 'X') {

    if($row['username'] == $username1 && $row['date'] == $date1){
        if($row['attendanceStatus'] == 'present' || $row['attendanceStatus'] == 'absent'){
            $sql1 = "UPDATE `attendance`
            SET
            attendanceStatus = 'absent'
            WHERE username =  '".$_POST["username"]."'  AND date = CURDATE()";
        }
    }

    else{
    $sql1 = "INSERT INTO `attendance` (date, username, attendanceStatus)
    VALUES
    (' $date1', '".$_POST["username"]."', 'absent')";
    }

    
        if ($conn->query($sql1)==FALSE){
            echo "Error ".
            $conn->error;
            
        }
        else{
            header("Location:attendanceList.php");
        }
}



?>
                               



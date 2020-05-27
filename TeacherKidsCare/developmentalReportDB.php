<?php
 include ('Templates/DB.php');
 include ('Templates/head.php');
 $date1 = $_POST["date"];
 $user1 = $_POST["username"];
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<body class="vertical-layout vertical-menu 1-column  bg-full-screen-image blank-page blank-page" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row"></div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                <div class="card-header border-0">
                                    <div class="text-center mb-1">
                                        <img src="../app-assets/images/logo/logo.png" alt="branding logo">
                                    </div>
                                 
                                </div>
                                <div class="card-content">
                                    <div class="card-body text-center">
                                <?php
                                  $q1= "SELECT * FROM developmentalreport where username='$user1' and date = '$date1'";
                                  $res1= $conn->query($q1);
                                  $row5 = $res1->fetch_assoc();

                                 

                                  if($row5['username'] == $user1 && $row5['date'] == $date1){
                                    
                                    $sql2 = "UPDATE  developmentalreport 
                                    SET 
                                    Language1 = '".$_POST["Language1"]."',  Language2 = '".$_POST["Language2"]."',
                                    Language3 = '".$_POST["Language3"]."',  Language4 = '".$_POST["Language4"]."',
                                    communication1 = '".$_POST["communication1"]."', communication2 = '".$_POST["communication2"]."',
                                    communication3 = '".$_POST["communication3"]."', communication4 = '".$_POST["communication4"]."', 
                                    motorica1 = '".$_POST["motorica1"]."', motorica2 = '".$_POST["motorica2"]."',
                                    motorica3 = '".$_POST["motorica3"]."', motorica4 = '".$_POST["motorica4"]."',
                                    attention1 = '".$_POST["attention1"]."', attention2 = '".$_POST["attention2"]."', 
                                    attention3 = '".$_POST["attention3"]."', attention4 = '".$_POST["attention4"]."', 
                                    movement1 = '".$_POST["movement1"]."', movement2 = '".$_POST["movement2"]."',  
                                    movement3 = '".$_POST["movement3"]."', movement4 = '".$_POST["movement4"]."', 
                                    independence1 = '".$_POST["independence1"]."', independence2 = '".$_POST["independence2"]."',
                                    independence3 = '".$_POST["independence3"]."'
                                     WHERE username =  '$user1' AND date = '$date1'";

                                    echo "עידכון הדוח נשמר בהצלחה" ;  
                                    
                                    if ($conn->query($q1)==false) {
                                        echo "התרחשה תקלה, אנא נסי שנית ".
                                        $conn->error;
                                        exit();
                                    }

                                    if ($conn->query($sql2)==false) {
                                        echo "התרחשה תקלה, אנא נסי שנית ".
                                        $conn->error;
                                        exit();
                                    }

                                    }

                                    if($row5['username'] != $user1 && $row5['date'] != $date1) {
                                        $sql = "INSERT INTO developmentalreport (date, username, fullName, Language1, Language2, Language3, Language4, 
                                        communication1, communication2, communication3, communication4,
                                        motorica1, motorica2,motorica3,motorica4,attention1, attention2, attention3, attention4,
                                        movement1, movement2, movement3, movement4, independence1,independence2, independence3)
                                        VALUES ('".$_POST["date"]."', '".$_POST["username"]."',
                                        '".$_POST["fullName"]."', '".$_POST["Language1"]."',
                                        '".$_POST["Language2"]."', '".$_POST["Language3"]."',
                                        '".$_POST["Language4"]."', '".$_POST["communication1"]."',
                                        '".$_POST["communication2"]."', '".$_POST["communication3"]."',
                                        '".$_POST["communication4"]."', '".$_POST["motorica1"]."', '".$_POST["motorica2"]."',
                                        '".$_POST["motorica3"]."', '".$_POST["motorica4"]."', '".$_POST["attention1"]."', '".$_POST["attention2"]."',
                                        '".$_POST["attention3"]."', '".$_POST["attention4"]."', '".$_POST["movement1"]."', '".$_POST["movement2"]."',
                                        '".$_POST["movement3"]."', '".$_POST["movement4"]."', '".$_POST["independence1"]."', '".$_POST["independence2"]."',
                                        '".$_POST["independence3"]."' )";
                                        echo "הדוח נשמר בהצלחה";

                                        if ($conn->query($sql) == false) {
                                            echo "התרחשה תקלה, אנא נסי שנית ".
                                            $conn->error;
                                            exit();
                                        }
                                }
                                 $conn->close();       
                                 ?>

                                    </div>
                                

                                    <p class="card-subtitle text-muted text-center font-small-6 mx-2 my-1"><span> <a href="kidsForReports.php" class="card-link"> לחצי כאן לחזרה</a></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>

<?php
  include ('Templates/footer.php');
  include ('Templates/JS.php');
?>

</body>
</html>
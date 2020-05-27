
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->

<?php
     include 'Templates\head.php';
     ?>

    <title>KidsCare-Details</title>

<body class="vertical-layout vertical-menu 1-column  bg-full-screen-image blank-page blank-page" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                <div class="card-header border-0">
                                    <div class="text-center mb-1">
                                        <img src="../app-assets/images/logo/logo.png" alt="branding logo">
                                    </div>
                                    <div class="font-large-1  text-center">                            
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

                                    <h1 class ="text-center">

                                    <?php
                                     include 'Templates\DB.php';
                                        

 $target_dir = "../uploads/";
 $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
 $uploadOk = 1;
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 // Check if image file is a actual image or fake image
 if(isset($_POST["submit"])) {
     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
     if($check !== false) {
         $uploadOk = 1;
     } else {
         $uploadOk = 0;
     }
 }

 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
                                                       
                              
                                    $sql = "UPDATE `accounts` 
                                    SET 
                                    email = '".$_POST["email"]."',  fullname = '".$_POST["fullName"]."',
                                    idNum = '".$_POST["idNum"]."', gender = '".$_POST["gender"]."',
                                    birthday= '".$_POST["birthday"]."', parentName1= '".$_POST["parentName1"]."',
                                    phone1 = '".$_POST["phone1"]."', parentName2 = '".$_POST["parentName2"]."',
                                    phone2= '".$_POST["phone2"]."', address= '".$_POST["address"]."',
                                    allergies= '".$_POST["allergies"]."',
                                    medicines=  '".$_POST["medicines"]."',
                                    fileToUpload='". basename($_FILES["fileToUpload"]["name"])."'
                                  WHERE username='".$_SESSION['name']."'";
        
                                 
                                    if ($conn->query($sql)==FALSE){
                                            echo "Error ".
                                            $conn->error;
                                            
                                        }
                                        else{
                                            echo  "הפרטים נשמרו בהצלחה";
                                        }
                                  
                                    ?>
                                    </h1>
                                        
                                  </div>

                                    <p class="card-subtitle text-muted text-center font-small-6 mx-2 my-1"><span><a href="home.php" class="card-link">לחזרה לדף הבית</a></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
                              
    <!-- END: Content-->

    <?php
     include 'Templates\JS.php';
     ?>

</body>
</html>



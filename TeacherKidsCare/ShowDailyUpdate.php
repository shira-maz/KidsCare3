
<?php
     include('Templates/DB.php');
$username1 = $_SESSION["name"];
$query ="SELECT * FROM accounts WHERE username = '$username1'";
mysqli_query($conn, $query) or die('Error querying database.');
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<?php
     include('Templates/head.php');
     ?>
    <title>KidsCare-Details</title>
    
<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">
<?php
     include('Templates/menu.php');
     ?>

  <!-- BEGIN: Content-->
  <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">שינה וארוחות</h3>
                </div>
            </div>

            <div class="content-body">
                <section id="line-awesome-icons">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>


                                <div class="content-wrapper">

                                    <div class="content-body">
                                        <section class="flexbox-container">
                                            <div class="col-12 d-flex align-items-center justify-content-center">

                                                <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                                    <div class="card-content" style="margin-top:7%;">
                                                        <div class="row justify-content-md-center">

                                                         <div class="card">
															
														<form action="" method="post">

                                                    
                                                            <div class=form-group row>
                                                            <h4 class="card-title">הורה יקר, על מנת לצפות בעדכון יומי בחר תאריך: </h4>
                                                            <label class="col-lg-5"> תאריך</label><input type="date" class="form-control round col-md-7" style="display: inline-block" name="SelectedDate"  ></div>
                                                             <div class="form-actions center">
                                                             <div class="form-group text-center">
                                                             <button type="submit"  name="submit" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">הצג</button> </div>
                                                             </div>
                                                          </form>

                                                <?php
                                            if (isset($_POST['submit'])) { 
                                            $SelectedDate= $_POST['SelectedDate'];
                                            
                                            echo "<h4> עדכון שינה וארוחות עבור התאריך: ".$SelectedDate. "</h4>";


                                            $sql = "SELECT sleepStatus, mealsStatus FROM dailyupdate WHERE  username = '$username1'AND date='$SelectedDate' ";
                                            $result1 = $conn->query($sql);
                                          
                                            $conn->close();
                                        if ($result1->num_rows > 0) {
                                            while ($row = $result1->fetch_assoc()) {

                                                
                                                        echo "<h4> מצב שינה: ". $row["sleepStatus"]."<br> מצב ארוחות: ". $row["mealsStatus"]. "</h4>";
                                            }
                                        }

                                        else {
                                            echo "<h4> טרם הוזן עדכון יומי עבור תאריך זה </h4>";

                                        }

   

                                          
                                    }

                        
                                    $conn->close();
                                            ?>
                                             
                                            


                                                            </div>


                                                        </div>
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
     include('Templates/footer.php');
     include('Templates/JS.php');
     ?>


</body>

</html>
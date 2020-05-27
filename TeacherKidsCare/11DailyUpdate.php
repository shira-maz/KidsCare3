<?php
include ('Templates/DB.php');
include ('Templates/head.php');
include ('Templates/menu.php');
$date1 =date("Y-m-d");
?>



<title>KidsCare-Daily Update</title>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">עדכון יומי</h3>
                </div>
            </div>

            <div class="content-body">
                <section id="line-awesome-icons">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">עדכון שינה וארוחות</h4>
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
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <section>
                                            <div class="container">
                                                <div class="row">
                                            

                                                    <?php
                                                       $sql = "SELECT username, fullName, fileToUpload FROM accounts where status='1'";
                                                       $result = $conn->query($sql);
                                                      if ($result->num_rows > 0) {
                                                          while ($row = $result->fetch_assoc()) { 
                                                              
                                                              $username1 = $row['username'];
                                                              $q= "SELECT * from attendance WHERE date = '$date1' AND username = '$username1'";
                                                              $res= $conn->query($q);
                                                              $row1 = $res->fetch_assoc();
                                                            if ($row1['attendanceStatus'] == 'present') {
                                                                ?>
                                                    
                                                    <div class="col-lg-12 col-xl-10">
                            <div id="accordion3" class="card-accordion">
                                <div class="card collapse-icon accordion-icon-rotate">
                                    <div class="card">
                                        <div class="card-header" id="headingGOne">
                                            <h4 class="mb-0">
                                                <button class="btn btn-link" style="font-size:16px" data-toggle="collapse" data-target="#accordionC1" aria-expanded="true" aria-controls="accordionC1">
                                               <span class="avatar avatar-online"><img  src="../uploads/<?= $row['fileToUpload'] ?>" alt="avatar">
                                               <?= $row['fullName'] ?>
                                                </button>
                                            </h4>
                                        </div>

                                        <div id="accordionC1" class="collapse show" aria-labelledby="headingGOne" data-parent="#accordion3">
                                            <div class="card-body">
                                            <div class="row skin skin-flat">
                                            <div class="col-md-11 col-sm-12">
                                            <form method="post" action="DailyUpDB.php" name="attendance" autocomplete="on">
                                            <input type="hidden" name="username" value="<?= $row['username'] ?>">

                                            <img style ="display: inline; width:1.8em; height:2em; margin-right:2%" src="..\images\bed2.png"> <h5  style ="display: inline"> <b> מצב שינה יומי </b></h5>
                                                    <div class="container" style="margin-bottom: 5%; margin-top:1%">
                                                    <br>
                                                    <?php if($row1['SleepStatus'] == 'good') {?>
                                                        <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="sleep" value="1" style =" background-color: #6967ce; color:white;"> מצויין </button>                                
                                                    <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="sleep" value="2"> בינוני </button>
                                                    <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="sleep" value="3"> ישן מעט </button>
                                                    <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="sleep" value="4"> לא ישן </button>
                                                        <?php } 

                                                            else if($row1['SleepStatus'] == 'ok'){ ?> 
                                                     <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="sleep" value="1" > מצויין </button>                                
                                                    <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="sleep" value="2" style =" background-color: #6967ce; color:white;"> בינוני </button>
                                                    <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="sleep" value="3"> ישן מעט </button>
                                                    <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="sleep" value="4"> לא ישן </button>
                                                            <?php } 
                                                     else if($row1['SleepStatus'] == 'little'){ ?> 
                                                                        <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="sleep" value="1" > מצויין </button>                                
                                                                       <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="sleep" value="2" > בינוני </button>
                                                                       <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="sleep" value="3" style =" background-color: #6967ce; color:white;"> ישן מעט </button>
                                                                       <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="sleep" value="4"> לא ישן </button>
                                                                               <?php } 

                                                  else if($row1['SleepStatus'] == 'not sleep'){ ?> 
                                                                        <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="sleep" value="1" > מצויין </button>                                
                                                                       <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="sleep" value="2" > בינוני </button>
                                                                       <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="sleep" value="3" > ישן מעט </button>
                                                                       <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="sleep" value="4" style =" background-color: #6967ce; color:white;"> לא ישן </button>
                                                                               <?php } 
                                                                               
                                                                               else{?> 
                                                                                <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="sleep" value="1" > מצויין </button>                                
                                                                               <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="sleep" value="2" > בינוני </button>
                                                                               <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="sleep" value="3" > ישן מעט </button>
                                                                               <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="sleep" value="4" > לא ישן </button>
                                                                                       <?php }?>
                                                                    
                                                    </div>

                                                    <img style ="display: inline; width:1.1em; height:1.6em; margin-right:2%" src="..\images\food.png"/> <h5 style ="display: inline"> <b> מצב ארוחות יומי </b></h5>
                                                    <div class="container" style ="margin-top:1%">
                                                    <?php 
                                                    
                                                    if($row1['FoodStatus'] == 'good') {?>
                                                        <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="food" value="1" style =" background-color: #6967ce; color:white;"> מצויין </button>
                                                    <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="food" value="2"> בינוני </button>
                                                    <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="food" value="3"> אכל מעט </button>
                                                    <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="food" value="4"> לא אכל </button>
                                                        <?php } 

                                                     else if($row1['FoodStatus'] == 'ok') {?>
                                                        <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="food" value="1" > מצויין </button>
                                                    <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="food" value="2" style =" background-color: #6967ce; color:white;"> בינוני </button>
                                                    <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="food" value="3"> אכל מעט </button>
                                                    <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="food" value="4"> לא אכל </button>
                                                        <?php } 

                                                     else if($row1['FoodStatus'] == 'little') {?>
                                                        <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="food" value="1" > מצויין </button>
                                                    <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="food" value="2"> בינוני </button>
                                                    <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="food" value="3"  style =" background-color: #6967ce; color:white;"> אכל מעט </button>
                                                    <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="food" value="4"> לא אכל </button>
                                                        <?php } 

                                                         else if($row1['FoodStatus'] == 'not eat') {?>
                                                        <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="food" value="1" > מצויין </button>
                                                    <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="food" value="2"> בינוני </button>
                                                    <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="food" value="3"  > אכל מעט </button>
                                                    <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="food" value="4" style =" background-color: #6967ce; color:white;"> לא אכל </button>
                                                        <?php } 
                                                        
                                                        else { ?>
                                                            <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="food" value="1" > מצויין </button>
                                                        <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="food" value="2"> בינוני </button>
                                                        <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="food" value="3"> אכל מעט </button>
                                                        <button class="btn btn-outline-primary btn-min-width round btn-sm mr-1 mb-1" type="submit" name="food" value="4"> לא אכל </button>
                                                            <?php } 
                                                        ?>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>


                                                    <?php
                                                            }      
                                                }
                                                }
                                                 ?>

                                                </div>
                                            </div>
                                        </section>
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
include 'Templates\footer.php';
include 'Templates\JS.php';
?>

</body>

</html>
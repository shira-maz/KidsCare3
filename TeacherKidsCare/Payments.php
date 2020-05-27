<?php 
include 
('Templates/DB.php');
?>

<?php 
include ('Templates/head.php');
?>
<title>KidsCare-Payment</title>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <?php 
    include ('Templates/menu.php');
    ?>


    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">תשלומים</h3>
                </div>
            </div>

            <div class="content-body">
                <section id="line-awesome-icons">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                  
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
                                                    <!--Profile Card-->

                                                    <?php
                                                    $sql = "SELECT fullName, fileToUpload, username FROM accounts WHERE status='1'";

                                                    $result1 = $conn->query($sql);
                                                    $conn->close();
                                                if ($result1->num_rows > 0) {
                                                    while ($row = $result1->fetch_assoc()) { ?>

                                                    <div class="col-md-4 mt-4">
                                                        <div class="card profile-card-4">
                                                            <div class="card-body pt-5">
                                                            <a href="‏‏KidPayments.php?username=<?= $row['username'] ?>">
                                                                <img alt="profile-image" class="profile"
                                                                    src="../uploads/<?= $row['fileToUpload'] ?>" /> </a>
                                                                                <h5 class="card-title text-center"> <a
                                                                        href="‏‏KidPayments.php?username=<?= $row['username'] ?>">
                                                                        <?= $row['fullName'] ?> </a></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php }
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
include ('Templates/footer.php');
include ('Templates/JS.php');
?>

</body>

</html>
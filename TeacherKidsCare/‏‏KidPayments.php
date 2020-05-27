<?php
include 'Templates\DB.php';
$username1 = $_GET["username"]; 
$query ="SELECT * FROM accounts WHERE username = '$username1'";
mysqli_query($conn, $query) or die('Error querying database.');
$result2 = mysqli_query($conn, $query);
$row2 = mysqli_fetch_array($result2);
$kidUser=$row2['username'];
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<?php 
include 'Templates\head.php';
?>
<title>KidsCare-Kid Paynents</title>

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-color="bg-gradient-x-purple-blue" data-col="2-columns">
    <?php 
    include 'Templates\menu.php';
    ?>

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">תשלומים לפי ילד</h3>
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

            <div class="card col-12 border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-content" style="margin-top:7%;">
                    <div class="row justify-content-md-center">

                        <div class="card ">
                            <div class="card profile-card-4">
                                <div class="card-body pt-5">
                                                                        <img alt="profile-image" class="profile"
                                                                            src="../uploads/<?= $row2['fileToUpload'] ?>" />
                                                                        <h5 class="card-title text-center">
                                                                            <?= $row2['fullName'] ?> </h5>
                                                                    </div>

                                                              
                                                                    <!-- Task List table -->
                                        <div class="table-responsive">
                                            <table id="users-contacts" class="table table-white-space table-bordered table-striped row-grouping display no-wrap icheck table-middle">
                                            <tr>
                                            <th>מספר תשלום</th>
                                            <th>מזהה עסקה</th>
                                                <th>סכום</th>
                                                <th>תאריך תשלום</th>
                                            </tr>
                                            <?php
                                            $query1 ="SELECT txnid, createdtime, payment_amount FROM payments WHERE custom = '$kidUser'";
                                            $result3 = mysqli_query($conn, $query1);
                                            $num =1;
                                                if ($result3->num_rows > 0) {
                                                    while ($row = $result3->fetch_assoc()) { ?>
                                                    <tr>
                                                    <td><?= $num++ ?></td>
                                                    <td><?= $row['txnid'] ?></td>
                                                        <td><?= $row['payment_amount'] ?></td>
                                                        <td> <?= $row['createdtime'] ?>  </td>
                                                      </tr>
                                                

                                                <?php }
                                                }
                                                 ?>

                                            </table>
                                        </div>
                                        </div>
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
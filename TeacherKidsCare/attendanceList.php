<?php
include ('Templates/DB.php');
include ('Templates/head.php');
include ('Templates/menu.php');
$date1 =date("Y-m-d");
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->


<title>KidsCare-</title>


<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-color="bg-gradient-x-purple-blue" data-col="2-columns">


    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">רשימת נוכחות</h3>
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
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                    <div class="table-responsive ">
                                        <form method="post" action="attendanceDB.php" name="attendance" autocomplete="on" target="_self">
                                            <table id="users-contacts" class="table table-white-space table-bordered table-striped row-grouping display no-wrap icheck table-middle">
                                            <tr>
                                                <th colspan="2">שם הילד</th>
                                                <th>נוכח</th>
                                                <th>נעדר</th>
                                             </tr>
                                            <?php
                                                
                                                 $sql = "SELECT username, fullName,  fileToUpload FROM accounts where status='1'";
                                                 $result = $conn->query($sql);
                                                 
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) { 
                                                        
                                                        $username1 = $row['username'];
                                                        $q= "SELECT date, username, attendanceStatus from attendance WHERE date = '$date1' AND username = '$username1'";
                                                        $res= $conn->query($q);
                                                        $row1 = $res->fetch_assoc();?>

                                                    <tr>
                                                    <form method="post" action="attendanceDB.php" name="attendance" autocomplete="on" enctype="multipart/form-data">                                                 
                                                        <td style = "border-left:none;">
                                                            <div class="media">
                                                                <div class="media-body media-middle">
                                                               <img style="float:left; padding-right: 1px;" src="../uploads/<?= $row['fileToUpload'] ?>" alt="avatar" class="avatar" ></td>
                                                               <td style = "border-right:none;">
                                                                    <span style="margin-right: 3px; " class="media-heading text-bold-700"> 
                                                                    <a href="KidDetails.php?username=<?= $row['username'] ?>"><?= $row['fullName'] ?> </a> </span>
                                                                    <input type="hidden" name="username" value="<?= $row['username'] ?>">
                                                                    <input type="hidden" name="fullName" value="<?= $row['fullName'] ?>">
                                                                </div>
                                                            </div>
                                                        </td>
                                                                                                               
                                                        <?php if($row1['attendanceStatus'] == 'absent') {?>
                                                            <td class="text-center">
                                                            <input type="submit"  name="action" value="V"  style="background-color: white; border:none; color:green; font-weight: bold;">
                                                            </td>
                                                            <td class="text-center">
                                                            <input type="submit" name="action" value="X" style="background-color: white; color:red; font-weight: bold; border-color:darkorchid; border-width:3px;" >
                                                            </td>

                                                            <?php } 

                                                            else if($row1['attendanceStatus'] == 'present'){ ?> 
                                                            <td class="text-center">
                                                            <input type="submit"  name="action" value="V"  style=" background-color: white; color:green; font-weight: bold; border-color:darkorchid; border-width:3px;">
                                                            </td>
                                                            <td class="text-center">
                                                            <input type="submit" name="action" value="X" style=" background-color: white; border:none; color:red; font-weight: bold;" >
                                                            </td>

                                                            <?php } 

                                                            else{ ?> 
                                                            <td class="text-center">
                                                            <input type="submit"  name="action" value="V"  style="background-color: white; border:none; color:green; font-weight: bold;">
                                                            </td>
                                                            <td class="text-center">
                                                            <input type="submit" name="action" value="X" style="background-color: white; border:none; color:red; font-weight: bold;" >
                                                            </td>
                                                            <?php } ?>
                                                        </form>
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
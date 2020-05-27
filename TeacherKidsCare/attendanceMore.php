
<?php
include ('Templates/DB.php');

 if(isset($_POST['search'])){
     $date2 = $_POST['dates1'];
     $q= "SELECT date, fullName, attendanceStatus from attendance WHERE date = ' $date2' ";
     $res= $conn->query($q);
     $count = $res->num_rows;
 }

 

 ?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->

<?php 
include ('Templates/head.php');
?>
<title>KidsCare-Registration</title>

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-color="bg-gradient-x-purple-blue" data-col="2-columns">
    <?php 
 include ('Templates/menu.php');
?>

<div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">רשימות נוכחות מתאריכים קודמים </h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-detached content-left">
                <div class="content-body">
                    <section class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-head">
                                    <div class="card-header">
                                        <h4 class="card-title"></h4>
                                        <a class="heading-elements-toggle">
                                            <i class="la la-ellipsis-h font-medium-3"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <!-- Task List table -->
                                        <div class="table-responsive">
                                        <h3> אנא בחר תאריך </h3>
                                        <form method="post">
                                            <input type="date" name = "dates1">
                                            <input type = "submit" name="search" value="display">
                                        </form>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    </div>
            <div class="content-detached content-left">
                <div class="content-body">
                    <section class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-head">
                                    <div class="card-header">
                                        <h4 class="card-title"></h4>
                                        <a class="heading-elements-toggle">
                                            <i class="la la-ellipsis-h font-medium-3"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <!-- Task List table -->
                                        <div class="table-responsive">
                                        
                                            <table id="users-contacts" class="table table-white-space table-bordered table-striped row-grouping display no-wrap icheck table-middle">
                                            <tr>
                                                 <th>תאריך</th>
                                                <th>שם הילד</th>
                                                <th>סטטוס נוכחות</th>
                                            </tr>
                                            <?php
                                                                                        
                                            if ($count > 0) {
                                                while ($row3 = $res->fetch_assoc()) { 
                                                    ?>
                                            <tr>
                                            <td>
                                                        <div class="media">
                                                            <div class="media-body media-middle">
                                                            <span style="margin-right: 3px; " class="media-heading text-bold-700"><?php echo $row3['date'] ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="media">
                                                            <div class="media-body media-middle">
                                                            <span style="margin-right: 3px; " class="media-heading text-bold-700"><?php echo $row3['fullName'] ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                    <?php if($row3['attendanceStatus'] == 'present') {?>
                                                    <span style="margin-right: 3px; color: green;" class="media-heading text-bold-700">V</span>
                                                    <?php } else { ?>
                                                        <span style="margin-right: 3px; color: red " class="media-heading text-bold-700">X</span>
                                                    <?php } ?>           
                                                    </td>
                                            </tr>
                                            <?php }
                                            }?>
                                            </table>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    </div>
            <div class="sidebar-detached sidebar-left">
                <div class="sidebar">
                    <div class="bug-list-sidebar-content">
                       

                    </div>
                </div>
            </div>
        </div>
    </div>

                                            



</body>
</html>
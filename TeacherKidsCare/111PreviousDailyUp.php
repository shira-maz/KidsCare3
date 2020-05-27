<?php
include ('Templates/DB.php');
include ('Templates/head.php');
include ('Templates/menu.php');
$date1 =date("Y-m-d");

if (isset($_POST['search'])) {
    $date1 = $_POST['dates1'];
}
?>

<style>
td, th {
   text-align: center;
}
</style>


<title>KidsCare-Previous Daily Update</title>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">דיווחים קודמים</h3>
                </div>
            </div>

            <div class="content-body">
                <section id="line-awesome-icons">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">דיווחי שינה וארוחות</h4>
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
                    
                                       <div class="col-lg-12 col-xl-12 text-center" style="margin-bottom:10%" >
                                           <h3> אנא בחר תאריך </h3>
                                        <form method="post" >
                                            <input type="date" name = "dates1" class="col-xs-4">
                                            <button type = "submit" name="search"   style = "display:inline; line-height: 7.5px; padding:11px 15px 11px 15px; " class="btn btn-glow btn-bg-gradient-x-purple-blue col-xs-4"> בחר </button>
                                        </form>
                                   </div>

                                   <div class="table-responsive">
                                        
                                        <table id="users-contacts" class="table table-white-space table-bordered table-striped row-grouping display no-wrap icheck table-middle">
                                    
                                        <?php     
                                           $qD= "SELECT * from attendance WHERE date = '$date1' ";
                                           $resD= $conn->query($qD);
                                           $countD = $resD->num_rows;
                                           ?>

                                           <?php
                                        if ($countD > 0) {?>
                                         <h3 class = "text-center" > דיווח לתאריך  <?= $date1 ?> </h3>
                                        <tr>
                                             <th> תאריך</th>
                                            <th>שם הילד</th>
                                            <th>סטטוס נוכחות</th>
                                            <th>מצב שינה</th>
                                            <th>מצב ארוחות</th>
                                        </tr>
                                        
                                        <?php 
                                            while ($row3D = $resD->fetch_assoc()) { ?>
                                           
                                        <tr>
                                        <td>
                                                    <div class="media">
                                                        <div class="media-body media-middle">
                                                        <span style=" text-align: center; " class="media-heading text-bold-700"><?php echo $row3D['date'] ?></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="media">
                                                        <div class="media-body media-middle">
                                                        <span style=" text-align: center; "class="media-heading text-bold-700"><?php echo $row3D['fullName'] ?></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td> 
                                                <?php if($row3D['attendanceStatus'] == 'present') {?>
                                                <span style=" text-align: center; color: green;" class="media-heading text-bold-700">V</span>
                                                <?php }
                                                 else { ?>
                                                    <span style=" text-align: center; color: red " class="media-heading text-bold-700">X</span>
                                                <?php } ?>           
                                                </td>
                                                <td> 
                                                <?php if($row3D['attendanceStatus'] == 'present' && $row3D['SleepStatus'] == 'good') {?>
                                                <span style="color: black; text-align: center;" class="media-heading text-bold-700">מצויין</span>
                                                
                                                <?php } 
                                                else if ($row3D['attendanceStatus'] == 'present' && $row3D['SleepStatus'] == 'ok') {?>
                                                 <span style=" color: black; text-align: center;" class="media-heading text-bold-700">ישן חלקית</span>
                                                 <?php } 
                                                else if ( $row3D['attendanceStatus'] == 'present' && $row3D['SleepStatus'] == 'little') {?>
                                                 <span style=" color: black; text-align: center;" class="media-heading text-bold-700">ישן מעט</span>
                                                 <?php } 
                                                else if ( $row3D['attendanceStatus'] == 'present' && $row3D['SleepStatus'] == 'not sleep') {?>
                                                 <span style=" color: black; text-align: center;" class="media-heading text-bold-700">לא ישן בכלל</span>

                                                <?php } else { ?>
                                                    <span style="margin-right: 3px; color: red " class="media-heading text-bold-700">-</span>
                                                <?php } ?>           
                                                </td>

                                            
                                                <td> 
                                                <?php if($row3D['attendanceStatus'] == 'present' && $row3D['FoodStatus'] == 'good') {?>
                                                <span style="color: black; text-align: center;" class="media-heading text-bold-700">מצויין</span>
                                                
                                                <?php } 
                                                else if ($row3D['attendanceStatus'] == 'present' && $row3D['FoodStatus'] == 'ok') {?>
                                                 <span style=" color: black; text-align: center;" class="media-heading text-bold-700">אכל חלקית</span>
                                                 <?php } 
                                                else if ($row3D['attendanceStatus'] == 'present' && $row3D['FoodStatus'] == 'little') {?>
                                                 <span style=" color: black; text-align: center;" class="media-heading text-bold-700">אכל מעט</span>
                                                 <?php } 
                                                else if ($row3D['attendanceStatus'] == 'present' && $row3D['FoodStatus'] == 'not sleep') {?>
                                                 <span style=" color: black; text-align: center;" class="media-heading text-bold-700">לא אכל בכלל</span>

                                                <?php } else { ?>
                                                    <span style="margin-right: 3px; color: red " class="media-heading text-bold-700">-</span>
                                                <?php } ?>           
                                                </td>
                                        </tr>
                                        <?php }
                                        }

                                        else {  ?>
                                        <h2 style =" text-align: center;">אין רישום עבור יום זה</h2>
                                             
                                            <?php  }
                                        ?>
                                        </table>
                                        </div>
                                                </div>
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

<Script> 
                                           var x = function convertDigitIn (05-07-2013);
                                            document.getElementById("demo").innerHTML = x;
 
                                            function convertDigitIn(str){
                                            return str.split('/').reverse().join('/');}
                                           
                                           </Script>
</html>
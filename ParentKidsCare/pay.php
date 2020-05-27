<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<?php 
include ('Templates/head.php');
include ('Templates/DB.php');
include ('Templates/menu.php');
?>

<title>KidsCare-pay</title>

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">
   
 <!-- BEGIN: Content-->
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">דף הבית</h3>
            </div>
        </div>

        <div class="content-body">
            <section id="line-awesome-icons">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">תשלומים לגן</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
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
                                        <?php
                                        $total = 20000;
                                        $sumquery ="SELECT SUM(payment_amount) AS value_sum FROM payments WHERE custom = '$username1'";
                                        mysqli_query($conn, $sumquery) or die('Error querying database.');
                                        $sumresult = mysqli_query($conn, $sumquery);
                                        $sumrow = mysqli_fetch_array($sumresult);
                                        $paid = $sumrow['value_sum'];

                                        $nowtotal =  $total - $sumrow['value_sum'];
                                        $paymentsnum =10;
                                        $splittotal = $total/$paymentsnum;
                                        $countquery ="SELECT COUNT(id) AS value_count FROM payments WHERE custom = '$username1'";
                                        mysqli_query($conn, $countquery) or die('Error querying database.');
                                        $countresult = mysqli_query($conn, $countquery);
                                        $countrow = mysqli_fetch_array($countresult);
                                        $count = $countrow['value_count'];
                                        $next = $countrow['value_count']+1;
                                        ?>
                                        
                                        <h4 class = "text-center">
                                        הורה יקר, התשלום לגן מחולק לעשרה תשלומים שווים בסך <?=  $splittotal ?> לכל תשלום. <br><br>

                                        <?php 
                                        if ( $count>0 ) {
                                            echo nl2br("עד כה, שולם לגן  ₪ $paid\n ב-  $count תשלומים\n");

                                        }

                                        else {
                                            echo  "עד כה לא בוצע אף תשלום לגן";
                                        }

?>
<br>
                                        יתרת תשלום נוכחית -   ₪<?= $nowtotal ?><br><br>
                                        לחץ כדי לשלם את תשלום מספר <?=  $next ?> על סך ₪<?=  $splittotal ?> 

                                        </h4>
                                        

                                          <form class="paypal" action="payments.php" method="post" id="paypal_form">
                                          <input type="hidden" name="cmd" value="_xclick" />
                                          <input type="hidden" name="no_note" value="1" />
                                          <input type="hidden" name="lc" value="US" />
                                          <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
                                          <input type="hidden" name="first_name" value="Test" />
                                          <input type="hidden" name="last_name" value="User" />
                                          <input type="hidden" name="payer_email" value="gm_1231902590_per@paypal.com" />
                                          <input type="hidden" name="item_number" value="111" />
                                          <input type="submit" name="submit"   class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-6 mr-1 mb-1" style= "margin:2% 25%" value="שלם עכשיו בPayPal"/>
                                          </form>

        
                                        </div>
                                    </section>
                                   </div>
                                </div>
                            </div>


                            <div class="card" style = "margin-top:4%">
                            <div class="card-header">
                                <h4 class="card-title">תשלומים קודמים</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
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
                                         <div class="table-responsive">
                                            <table id="users-contacts" class="table table-white-space table-bordered table-striped row-grouping display no-wrap icheck table-middle">
                                            <tr>
                                            <th>מספר תשלום</th>
                                            <th>מזהה עסקה</th>
                                                <th>סכום</th>
                                                <th>תאריך תשלום</th>
                                            </tr>
                                            <?php
                                            $query1 ="SELECT txnid, createdtime, payment_amount FROM payments WHERE custom = '$username1'";
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



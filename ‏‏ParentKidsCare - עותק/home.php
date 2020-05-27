<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<?php 
include 'Templates\head.php';
?>
<title>KidsCare-Home</title>

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">
   
<?php 
include 'Templates\menu.php';
?>
	
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
                                <h4 class="card-title">דף הבית</h4>
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
									           <div class=" text-center">
                                                   <h3 class=> הורה יקר, <br>
                                                אנו שמחות שבחרת בנו להיות האחראיות על טיפול וצמיחת ילדך.
                                                <br>
                                            הרגש חופשי לפנות אלינו בכל שאלה  <br>  
                                  <br>  חנה ויעל<br><br>
                                  (דף זה יתמלא בהמשך עפ"י הפיצ'רים והדפים הבאים שנשלים...)
                                    </h3>
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
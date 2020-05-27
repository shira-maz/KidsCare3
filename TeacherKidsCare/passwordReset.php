<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<?php 
include ('Templates/head.php');
include ('Templates/DB.php');


?>


<title>KidsCare-Register</title>
<script src="registrationFormValidation.js"></script>


<body class="vertical-layout vertical-menu 1-column  bg-full-screen-image " data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">
    <div class="app-content content"  >
        <div class="content-wrapper">
            <div class="content-body" >
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-5 col-md-9 col-11 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                <div class="card-header border-0">
                                    <div class="text-center mb-1">
                                        <img style = " margin-bottom:5%" src="../app-assets/images/logo/logo.png" alt="branding logo">
                                    </div>
                                    <div class="font-large-1  text-center">
                                       שכחתי סיסמה
                                    </div>
                                </div>
                                <div class="card-content" style="margin-top:7%;">
                                <div class="row justify-content-md-center">
                        <div class=" col-xl-12 col-lg-11 col-md-11">
                            <div class="card">
                                <form method="post" action="check.php">
                                <div class=form-group row>
                                <h4 style =" text-align:center;">אנא מלא את הפרטים הבאים:  </h4>
                                </div>
                                <div class=form-group row>
                                <label class="col-xl-3 required">אימייל</label><input type="email"  class="form-control round col-md-8" style ="display: inline-block" name="email" required></div>
                               
                                <div class=form-group row>				
                                <label class="col-xl-3">ת.ז</label><input type="text" class="form-control round col-md-8" style ="display: inline-block" name="idNum" required ></div>
                              
                                
                                <div class="form-group text-center">
                                     <button type="submit" id="myBtn" name="search" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">הצג את סיסמתי</button>
                                  </div>
                                  <div class="form-group text-center">
                                  <p class="card-subtitle text-muted text-center font-small-6 mx-2 my-1"><span>לחזרה לדף ההתחברות <a href="index.php" class="card-link">לחץ כאן</a></span></p>
                                  </div>
                                  
                                </div>                         		
                            </form>
                        </div>
                    </div>
    <!-- END: Content-->

    <?php 
include ('Templates/JS.php');
?>

</body>
</html>
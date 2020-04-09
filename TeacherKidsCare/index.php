<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<?php 
include 'Templates\DB.php';
?>

<?php 
include 'Templates\head.php';
?>
<title>KidsCare-Login</title>


<body class="vertical-layout vertical-menu 1-column  bg-full-screen-image blank-page blank-page" data-open="click"
    data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                <div class="card-header border-0">
                                    <div class="text-center mb-1">
                                        <img src="../app-assets/images/logo/logo.png" alt="branding logo">
                                    </div>
                                    <div class="font-large-1  text-center">
                                        התחברות
                                    </div>
                                </div>
                                <div class="card-content">

                                    <div class="card-body">
                                        <form class="form-horizontal" action="authenticate.php" method="post">

                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" class="form-control round" name="username"
                                                    placeholder="שם משתמש" id="username" required>
                                                <div class="form-control-position">
                                                    <i class="ft-user"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" class="form-control round" name="password"
                                                    placeholder="סיסמה" id="password" required>
                                                <div class="form-control-position">
                                                    <i class="ft-lock"></i>
                                                </div>
                                                <p id="demo"></p>

                                            </fieldset>
         
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">התחבר</button>
                                            </div>
                                            <?php
                                                if(isset($_SESSION["error"])){
                                                    $error = $_SESSION["error"];
                                                    echo "<span> <h5> $error </h5> </span>";
                                                }
                                            ?>  
                                        </form>
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

include 'Templates\JS.php';
?>

</body>
</html>
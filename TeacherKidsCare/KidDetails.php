<?php
include 'Templates\DB.php';
$username1 = $_GET["username"]; {
$query ="SELECT * FROM accounts WHERE username = '$username1'";
mysqli_query($conn, $query) or die('Error querying database.');
$result2 = mysqli_query($conn, $query);
$row2 = mysqli_fetch_array($result2);
}

?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<?php 
include 'Templates\head.php';
?>
<title>KidsCare-Kid Details</title>

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
                    <h3 class="content-header-title">פרטי הילד</h3>
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

                                                <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                                    <div class="card-content" style="margin-top:7%;">
                                                        <div class="row justify-content-md-center">

                                                            <div class="card">
                                                                <div class="card profile-card-4">
                                                                    <div class="card-body pt-5">
                                                                        <img alt="profile-image" class="profile"
                                                                            src="../uploads/<?= $row2['fileToUpload'] ?>" />
                                                                        <h5 class="card-title text-center">
                                                                            <?= $row2['fullName'] ?> </h5>
                                                                    </div>

                                                                    <form method="post" action="APRegister.php"
                                                                        name="accounts"
                                                                        onsubmit="return registrationFormValidation();"
                                                                        autocomplete="on" enctype="multipart/form-data">
                                                                        <div class=form-group row>
                                                                            <label class="col-lg-4">שם
                                                                                משתמש</label><input type="text"
                                                                                class="form-control round col-md-8"
                                                                                style="display: inline-block"
                                                                                name="username"
                                                                                value="<?php echo $row2['username'] ?>"
                                                                                required readonly> </div>
                                                                        <div class=form-group row>
                                                                            <label class="col-lg-4">סיסמה</label><input
                                                                                type="password" name="password"
                                                                                class="form-control round col-md-8"
                                                                                style="display: inline-block"
                                                                                value="<?php echo $row2['password'] ?>"
                                                                                required readonly> </div>
                                                                        <div class=form-group row>
                                                                            <label class="col-lg-4">אימייל</label><input
                                                                                type="email"
                                                                                class="form-control round col-md-8"
                                                                                style="display: inline-block"
                                                                                name="email"
                                                                                value="<?php echo $row2['email'] ?>"
                                                                                required readonly></div>
                                                                        <div class=form-group row>
                                                                            <label class="col-lg-4">שם מלא</label><input
                                                                                type="text"
                                                                                class="form-control round col-md-8"
                                                                                style="display: inline-block"
                                                                                name="fullName"
                                                                                value="<?php echo $row2['fullName'] ?>"
                                                                                required readonly></div>
                                                                        <div class=form-group row>
                                                                            <label class="col-lg-4">ת.ז</label><input
                                                                                type="text"
                                                                                class="form-control round col-md-8"
                                                                                style="display: inline-block"
                                                                                name="idNum"
                                                                                value="<?php echo $row2['idNum'] ?>"
                                                                                required readonly></div>
                                                                        <div class=form-group row>
                                                                            <label class="col-lg-4">מין</label>
                                                                            <input type="radio"
                                                                                style="display: inline-block"
                                                                                name="gender" value="זכר" checked
                                                                                required readonly><label> זכר</label>
                                                                            <input type="radio"
                                                                                style="display: inline-block"
                                                                                name="gender" value="נקבה" checked
                                                                                required readonly><label> נקבה</label>
                                                                        </div>
                                                                        <div class=form-group row>
                                                                            <label class="col-lg-4">תאריך
                                                                                לידה</label><input type="date"
                                                                                class="form-control round col-md-8"
                                                                                style="display: inline-block"
                                                                                name="birthday"
                                                                                value="<?php echo $row2['birthday'] ?>"
                                                                                required readonly></div>
                                                                        <div class=form-group row>
                                                                            <label class="col-lg-4">שם האב</label><input
                                                                                type="text"
                                                                                class="form-control round col-md-8"
                                                                                style="display: inline-block"
                                                                                name="parentName1"
                                                                                value="<?php echo $row2['parentName1'] ?>"
                                                                                required readonly></div>
                                                                        <div class=form-group row>
                                                                            <label class="col-lg-4">מספר
                                                                                טלפון</label><input type="numbers"
                                                                                class="form-control round col-md-8"
                                                                                style="display: inline-block"
                                                                                name="phone1"
                                                                                value="<?php echo $row2['phone1'] ?>"
                                                                                required readonly> </div>
                                                                        <div class=form-group row>
                                                                            <label class="col-lg-4">שם האם</label><input
                                                                                type="text"
                                                                                class="form-control round col-md-8"
                                                                                style="display: inline-block"
                                                                                name="parentName2"
                                                                                value="<?php echo $row2['parentName2'] ?>"
                                                                                required readonly></div>
                                                                        <div class=form-group row>
                                                                            <label class="col-lg-4">מספר
                                                                                טלפון</label><input type="numbers"
                                                                                class="form-control round col-md-8"
                                                                                style="display: inline-block"
                                                                                name="phone2"
                                                                                value="<?php echo $row2['phone2'] ?>"
                                                                                required readonly></div>
                                                                        <div class=form-group row>
                                                                            <label class="col-lg-4">כתובת</label><input
                                                                                type="text"
                                                                                class="form-control round col-md-8"
                                                                                style="display: inline-block"
                                                                                name="address"
                                                                                value="<?php echo $row2['address'] ?>"
                                                                                required readonly></div>
                                                                        <div class=form-group row>
                                                                            <label
                                                                                class="col-lg-4">אלרגיות</label><textarea
                                                                                class="form-control round col-md-8"
                                                                                readonly style="display: inline-block"
                                                                                name="allergies"><?php echo $row2['allergies'] ?></textarea>
                                                                        </div>
                                                                        <div class=form-group row>
                                                                            <label
                                                                                class="col-lg-4">תרופות</label><textarea
                                                                                class="form-control round col-md-8"
                                                                                readonly style="display: inline-block"
                                                                                name="medicines"><?php echo $row2['medicines'] ?> </textarea>
                                                                        </div>

                                                                </div>
                                                                </form>

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
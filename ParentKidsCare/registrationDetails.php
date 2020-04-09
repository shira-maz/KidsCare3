
<?php
     include 'Templates\DB.php';
$username1 = $_SESSION["name"]; 
$query ="SELECT * FROM accounts WHERE username = '$username1'";
mysqli_query($conn, $query) or die('Error querying database.');
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<?php
     include 'Templates\head.php';
     ?>
    <title>KidsCare-Details</title>
    
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
                                                                            src="../uploads/<?= $row['fileToUpload'] ?>" />
                                                                        <h5 class="card-title text-center">
                                                                            <?= $row['fullName'] ?> </h5>
                                                                    </div>

                            <form method="post" action="EditingRegister.php" name="accounts" onsubmit="return registrationFormValidation();" autocomplete="on" enctype="multipart/form-data">
                                <div class=form-group row>
                                <label class="col-lg-3">שם משתמש</label><input type="text"  class="form-control round col-md-8" style ="display: inline-block" name="username" value = "<?php echo $row['username'] ?>"  required disabled >	</div>
                                <div class=form-group row>
                                    <label class="col-lg-3">סיסמה</label><input type="password" name="password" class="form-control round col-md-8" style ="display: inline-block"  value = "<?php echo $row['password'] ?>" required disabled>	</div>
                                <div class=form-group row>
                                <label class="col-lg-3">אימייל</label><input type="email"  class="form-control round col-md-8" style ="display: inline-block" name="email" value = "<?php echo $row['email'] ?>" required></div>
                                <div class=form-group row>
                                <label class="col-lg-3">שם מלא</label><input type="text"  class="form-control round col-md-8" style ="display: inline-block" name="fullName" value = "<?php echo $row['fullName'] ?>" required ></div>	
                                <div class=form-group row>				
                                <label class="col-lg-3">ת.ז</label><input type="text" class="form-control round col-md-8" style ="display: inline-block" name="idNum"  value = "<?php echo $row['idNum'] ?>" required ></div>
                                <div class=form-group row>
                                    <label class="col-lg-3">מין</label>
                                <input type="radio"   style ="display: inline-block" name="gender" value="זכר" checked required ><label > זכר</label>
                                <input type="radio"  style ="display: inline-block" name="gender" value="נקבה" checked required ><label> נקבה</label>
                                </div>
                                <div class=form-group row>
                                <label class="col-lg-3">תאריך לידה</label><input type="date" class="form-control round col-md-8" style ="display: inline-block" name="birthday"  value = "<?php echo $row['birthday'] ?>" required ></div>
                                <div class=form-group row>	
                                <label class="col-lg-3">שם האב</label><input type="text"  class="form-control round col-md-8" style ="display: inline-block" name="parentName1" value = "<?php echo $row['parentName1'] ?>" required ></div>
                                <div class=form-group row>
                                <label class="col-lg-3">מספר טלפון</label><input type="numbers"  class="form-control round col-md-8" style ="display: inline-block" name="phone1" value = "<?php echo $row['phone1'] ?>" required >	</div>
                                <div class=form-group row>
                                <label class="col-lg-3">שם האם</label><input type="text" class="form-control round col-md-8" style ="display: inline-block" name="parentName2" value = "<?php echo $row['parentName2'] ?>" required ></div>
                                <div class=form-group row>
                                 <label class="col-lg-3">מספר טלפון</label><input type="numbers" class="form-control round col-md-8" style ="display: inline-block" name="phone2" value = "<?php echo $row['phone2'] ?>" required ></div>
                                 <div class=form-group row>	
                                    <label class="col-lg-3">כתובת</label><input type="text"  class="form-control round col-md-8" style ="display: inline-block" name="address" value = "<?php echo $row['address'] ?>"  required ></div>
                                 <div class=form-group row>
                                <label class="col-lg-3">אלרגיות</label><textarea  class="form-control round col-md-8" style ="display: inline-block" name="allergies"  ><?php echo $row['allergies'] ?></textarea></div>
                                <div class=form-group row>
                                <label class="col-lg-3">תרופות</label><textarea  class="form-control round col-md-8" style ="display: inline-block" name="medicines" ><?php echo $row['medicines'] ?></textarea></div>
                                <label class="col-lg-3" style = "margin-bottom:3%">העלה תמונה</label>
                                <input  type="file"  name="fileToUpload" id="fileToUpload" required  /> <br>
                                <P class="text-center" style = "margin-left:10%; margin-top:3%; font-size: 1rem "> מומלץ להעלות תמונה מרובעת</P>
                                <input type="hidden" name="status" value="3" hide >
                                <div class="form-actions center">
                                      <div class="form-group text-center">
                                     <button type="submit"  class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">שמור פרטים</button>
                                  </div>
                                </div>                         		
                                </form>

</div>


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
<!-- END: Body-->

</html>
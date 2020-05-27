<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<?php 
include ('Templates/head.php');
include ('Templates/DB.php');


?>

<<style>
#fadeout {
  opacity: 1;
  transition: 1s opacity;
  text-align: center;
  font-size:16px;
}
p{
    font-size:16px;
}

body {
     text-align: center;
}
</style>

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
                                  
                                </div>
                                <div class="card-content">
                                <div class="row justify-content-md-center">
                        <div class=" col-xl-12 col-lg-11 col-md-11">
                            <div class="card">
                           
                         
                                <?php
                                if(isset($_POST['search']))
                                {
                                    $email = $_POST['email'];
                                    $idNum = $_POST['idNum'];
                                    $result = mysqli_query($conn,"SELECT * FROM accounts WHERE (email='$email' OR idNum='$idNum') ");
                                    $row = mysqli_fetch_assoc($result);
                                      $password=$row['password'];
                                            
                               
                                if($result->num_rows > 0){
                                  if($email==$row['email'] && $idNum==$row['idNum']) { ?>
                                    <div class="row">
                                     <div class="col-12">
                                    <div class="card">
                                    <h4 style="margin-bottom:5%%;"> <b> כדי לשמור על פרטיותך, הסיסמה תוצג למשך 
                                    <h4 id= "count" style = "display:inline;">  </h4>
                                      <h4 style = "display:inline;">  שניות בלבד </b> </h4>
                                    
                                    <h4 id="fadeout" style="margin-bottom: 50px;">  סיסמתך היא:<br> <?php echo $row['password'];?> </h4>
                                    </div>
                                    </div>
                                    </div>
                                    </div> 
                                   
                                <?php } 
                                else if($email == $row['email'] && $idNum != $row['idNum']) { ?>
                                    <div class="row">
                                     <div class="col-12">
                                    <div class="card">
                                    <h2>מספר ת.ז שגוי, אנא נסה שנית!</h2>
                                       <p class="card-subtitle text-muted text-center font-small-6 mx-2 my-1"><span>לניסיון חוזר <a href="passwordReset.php" class="card-link">לחץ כאן</a></span></p>
                                    </div>
                                    </div>
                                    </div> 
                                    </div> 
                                 

                                    
                                <?php } 
                                 else if($email != $row['email'] && $idNum == $row['idNum']) { ?>
                                    
                                    <div class="row">
                                     <div class="col-12">
                                    <div class="card">
                                    <h2>כתובת מייל שגויה, אנא נסה שנית!</h2>
                                    <p class="card-subtitle text-muted text-center font-small-6 mx-2 my-1"><span>לניסיון חוזר <a href="passwordReset.php" class="card-link">לחץ כאן</a></span></p>
                                    </div>
                                    </div>
                                    </div> 
                                    </div> 
                                  

                                <?php } }

                                    else{ ?>
                                    <div class="row">
                                    <div class="col-12">
                                    <div class="card">
                                    <h2> הפרטים שגויים, אנא נסה שנית</h2>
                                        <p class="card-subtitle text-muted text-center font-small-6 mx-2 my-1"><span>לניסיון חוזר <a href="passwordReset.php" class="card-link">לחץ כאן</a></span></p>
                                    </div>
                                    </div>
                                    </div> 
                                    </div> 
                                  
                                  <?php  }} ?>
                              
                                  <div class="form-group text-center">
                                  <p class="card-subtitle text-muted text-center font-small-6 mx-2 my-1"><span>לחזרה לדף ההתחברות <a href="index.php" class="card-link">לחץ כאן</a></span></p>
                                  </div>
                                </div>                         		
                        </div>
                    </div>

<?php 
include ('Templates/JS.php');
?>

<script>
 window.onload = function() {
  window.setTimeout(fadeout, 30000); //8 seconds
}

function fadeout() {
  document.getElementById('fadeout').style.opacity = '0';
}   

var timeLeft = 30;
    var elem = document.getElementById('count');
    
    var timerId = setInterval(countdown, 1000);
    
    function countdown() {
      if (timeLeft == -1) {
        clearTimeout(timerId);
        doSomething();
      } else {
        elem.innerHTML = timeLeft;
        timeLeft--;
      }
    }
</script>



</body>
</html>
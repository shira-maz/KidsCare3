<?php
include('Templates/DB.php');
include('Templates/menu.php');
include('Templates/head.php');

$date1 =date("Y-m-d");
$username1 = $_GET["username"]; 
    $query ="SELECT * FROM accounts WHERE username = '$username1'";
    mysqli_query($conn, $query) or die('Error querying database.');
    $result1 = mysqli_query($conn, $query);
    $row2 = mysqli_fetch_array($result1);
    

    $query1= "SELECT date FROM developmentalreport where username = '$username1' ORDER BY date DESC LIMIT 1";
    $res1= $conn->query($query1);
    $row3 = $res1->fetch_assoc();


    $q1= "SELECT * FROM developmentalreport where username='$username1' and date = '$date1'";
    $res3= $conn->query($q1);
    $row4 = $res3->fetch_assoc();

?>

<style>
    h5, body{
        color:black;
    }
    .profile-card-4 h5 {
        color:black;
    }
    .container {
    margin-bottom: 4%;
}

    @media screen and (max-width: 800px) {
label{
    display:block;
}

    }
    

</style>

<title>KidsCare-Developmental Report</title>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">דיווח התפתחותי</h3>
                </div>
            </div>

     
  <div class="card profile-card-4">
            <div class="card-body pt-5">
                <img alt="profile-image" class="profile"
                    src="../uploads/<?= $row2['fileToUpload'] ?>" />
                <h5 class="card-title text-center">
                    <?= $row2['fullName'] ?> </h5>
            </div>
            
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <section>
                                            <div class="container">
                                            
                                            
                                            <h4 class="text-center">  
                                            <?php  if ($row3['date'] ==  $date1 ) 
                                            echo " הדוח האחרון עבור ילד זה מולא היום <br/> הינך יכולה לבצע בו שינויים בעמוד זה. ";
                                            else if ($row3['date'] == null) {
                                            echo "לא מולאו דוחות עדיין";}
                                            else echo "הדוח האחרון עבור ילד זה מולא בתאריך " . $row3['date']."<br>";
                                            ?>
                                </h4>
                                            <form method="post" action="developmentalReportDB.php" name="developmentalreport" >
                                            <input type="hidden" name="date" value="<?= $date1 ?>">
                                            <input type="hidden" name="username" value="<?= $row2['username'] ?>">
                                            <input type="hidden" name="fullName" value="<?= $row2['fullName'] ?>">
                                            <div class="row">
                        <div class="col-lg-12 col-xl-10" style="margin-right:5%;">
                            <div id="accordion3" class="card-accordion">
                                <div class="card collapse-icon accordion-icon-rotate">
                                    <div class="card">
                                        <div class="card-header" id="headingGOne">
                                            <button type='button' class="btn btn-link" style="font-size:16px;" data-toggle="collapse" data-target="#accordionC1" aria-expanded="true" aria-controls="accordionC1">
                                                שפה (הבנה והבעה)</button> 
                                        </div>

                                        <div id="accordionC1" class="collapse show" aria-labelledby="headingGOne" data-parent="#accordion3">
                                            <div class="card-body " style="background-color:LightCyan">
                                            <div class="row skin skin-flat ">
                                            <div class="col-md-10 col-sm-12">
                                         

                                            <div class="container">
                                            <h5> <b> מבינ/ה את התכנים הנלמדים בגן</b> </h5>
                                            <label> <input type = "radio" value="תמיד"  name="Language1" required <?php if (isset ($row4['Language1']) && $row4['Language1'] == "תמיד" ) { echo 'checked';}?>> תמיד &nbsp;   </label>                      
                                            <label> <input type = "radio" value="לעיתים" name="Language1" <?php if (isset ($row4['Language1']) && $row4['Language1'] == "לעיתים" ) { echo 'checked';}?>> לעיתים &nbsp; </label>  
                                            <label> <input type = "radio" value="לעיתים רחוקות" name="Language1" <?php if (isset ($row4['Language1']) && $row4['Language1'] == "לעיתים רחוקות" ) { echo 'checked';}?>> לעיתים רחוקות &nbsp;    </label>      
                                            <label> <input type = "radio" value="אף פעם" name="Language1" <?php if (isset ($row4['Language1']) && $row4['Language1'] == "אף פעם" ) { echo 'checked';}?>> אף פעם &nbsp;    </label>             
       
                                             </div>
                                            <div class="container">
                                            <h5> <b>מבינ/ה ועונה נכון על שאלות שנשאל</b> </h5>
                                            <label> <input type = "radio"  value="תמיד" name="Language2" required <?php if (isset ($row4['Language2']) && $row4['Language2'] == "תמיד" ) { echo 'checked';}?>> תמיד &nbsp;     </label>                       
                                            <label> <input type = "radio"  value="לעיתים" name="Language2" <?php if (isset ($row4['Language2']) && $row4['Language2'] == "לעיתים" ) { echo 'checked';}?> > לעיתים &nbsp; </label>  
                                            <label> <input type = "radio"  value="לעיתים רחוקות" name="Language2" <?php if (isset ($row4['Language2']) && $row4['Language2'] == "לעיתים רחוקות" ) { echo 'checked';}?>> לעיתים רחוקות &nbsp;  </label>  
                                            <label> <input type = "radio"  value="אף פעם" name="Language2" <?php if (isset ($row4['Language2']) && $row4['Language2'] == "אף פעם" ) { echo 'checked';}?>> אף פעם &nbsp;  </label>  

                                             </div>
                                            <div class="container">
                                            <h5> <b>מתאר/ת באופן מילולי תמונות שמוצגות לו </b></h5>
                                            <label>  <input type = "radio"  value="תמיד" name="Language3" required <?php if (isset ($row4['Language3']) && $row4['Language3'] == "תמיד" ) { echo 'checked';}?>> תמיד &nbsp;  </label>                          
                                            <label>  <input type = "radio"  value="לעיתים" name="Language3"  <?php if (isset ($row4['Language3']) && $row4['Language3'] == "לעיתים" ) { echo 'checked';}?>> לעיתים &nbsp; </label>  
                                            <label>  <input type = "radio"  value="לעיתים רחוקות" name="Language3" <?php if (isset ($row4['Language3']) && $row4['Language3'] == "לעיתים רחוקות" ) { echo 'checked';}?>> לעיתים רחוקות &nbsp; </label>  
                                            <label>  <input type = "radio"  value="אף פעם" name="Language3" <?php if (isset ($row4['Language3']) && $row4['Language3'] == "אף פעם" ) { echo 'checked';}?>> אף פעם &nbsp; </label>  

                                             </div>
                                             <div class="container">
                                             <h5> <b>האם קיים חוסר שטף בדיבור (גמגום)?</b></h5>
                                            <label> <input type = "radio" value="תמיד" name="Language4" required <?php if (isset ($row4['Language4']) && $row4['Language4'] == "תמיד" ) { echo 'checked';}?>> תמיד &nbsp;             </label>               
                                            <label> <input type = "radio" value="לעיתים" name="Language4" <?php if (isset ($row4['Language4']) && $row4['Language4'] == "לעיתים" ) { echo 'checked';}?>> לעיתים &nbsp; </label>  
                                            <label> <input type = "radio" value="לעיתים רחוקות" name="Language4" <?php if (isset ($row4['Language4']) && $row4['Language4'] == "לעיתים רחוקות" ) { echo 'checked';}?>> לעיתים רחוקות &nbsp; </label>  
                                            <label> <input type = "radio" value="אף פעם" name="Language4" <?php if (isset ($row4['Language4']) && $row4['Language4'] == "אף פעם" ) { echo 'checked';}?>> אף פעם &nbsp; </label>  

                                             </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>

                        <div class="col-lg-12 col-xl-10" style="margin-right:5%;">
                            <div id="accordion3" class="card-accordion">
                                <div class="card collapse-icon accordion-icon-rotate">
                                    <div class="card">
                                        <div class="card-header" id="headingGOne">
                                            <h4 class="mb-0">
                                            <button type='button' class="btn btn-link" style="font-size:16px;" data-toggle="collapse" data-target="#accordionC2" aria-expanded="true" aria-controls="accordionC1">
                                                תפקוד חברתי ותקשורתי
                                                </button>
                                            </h4>
                                        </div>
                         <div id="accordionC2" class="collapse show" aria-labelledby="headingGOne" data-parent="#accordion3">
                                <div class="card-body" style="background-color:Lavender">
                                   <div class="row skin skin-flat">
                                        <div class="col-md-10 col-sm-12">
                                            <div class="container">
                                            <h5> <b> יוצר/ת קשר עם ילדים ומסוגל/ת ליזום משחק </b></h5>
                                                    <label>  <input type = "radio"  value="תמיד" name="communication1" required <?php if (isset ($row4['communication1']) && $row4['communication1'] == "תמיד" ) { echo 'checked';}?>> תמיד &nbsp;     </label>                       
                                                    <label>  <input type = "radio"  value="לעיתים" name="communication1"  <?php if (isset ($row4['communication1']) && $row4['communication1'] == "לעיתים" ) { echo 'checked';}?> > לעיתים &nbsp; </label>  
                                                    <label>  <input type = "radio"  value="לעיתים רחוקות" name="communication1"  <?php if (isset ($row4['communication1']) && $row4['communication1'] == "לעיתים רחוקות" ) { echo 'checked';}?>> לעיתים רחוקות &nbsp;   </label>    
                                                    <label>  <input type = "radio"  value="אף פעם" name="communication1"  <?php if (isset ($row4['communication1']) && $row4['communication1'] == "אף פעם" ) { echo 'checked';}?>> אף פעם &nbsp;   </label>                                                             
                                                         
                                                    </div>
                                                    <div class="container">
                                                    <h5> <b> משתתפ/ת בתחרויות ומקבל/ת הן הצלחה והן כישלון </b></h5>
                                                    <label>  <input type = "radio"  value="תמיד" name="communication2"  required <?php if (isset ($row4['communication2']) && $row4['communication2'] == "תמיד" ) { echo 'checked';}?>> תמיד &nbsp;      </label>                      
                                                    <label>  <input type = "radio"  value="לעיתים" name="communication2" <?php if (isset ($row4['communication2']) && $row4['communication2'] == "לעיתים" ) { echo 'checked';}?>> לעיתים &nbsp; </label>  
                                                    <label>  <input type = "radio"  value="לעיתים רחוקות" name="communication2" <?php if (isset ($row4['communication2']) && $row4['communication2'] == "לעיתים רחוקות" ) { echo 'checked';}?>> לעיתים רחוקות &nbsp;     </label>                                                    
                                                    <label>  <input type = "radio"  value="אף פעם" name="communication2" <?php if (isset ($row4['communication2']) && $row4['communication2'] == "אף פעם" ) { echo 'checked';}?>> אף פעם &nbsp;     </label>                                                   
                                    
                                                    </div>
                                                    <div class="container">
                                                    <h5> <b> מגיב/ה באלימות פיזית או מילולית </b></h5>
                                                    <label>  <input type = "radio"  value="תמיד" name="communication3"  required <?php if (isset ($row4['communication3']) && $row4['communication3'] == "תמיד" ) { echo 'checked';}?>> תמיד &nbsp;     </label>                       
                                                    <label>  <input type = "radio"  value="לעיתים" name="communication3" <?php if (isset ($row4['communication3']) && $row4['communication3'] == "לעיתים" ) { echo 'checked';}?>> לעיתים &nbsp; </label>  
                                                    <label>  <input type = "radio"  value="לעיתים רחוקות" name="communication3" <?php if (isset ($row4['communication3']) && $row4['communication3'] == "לעיתים רחוקות" ) { echo 'checked';}?>> לעיתים רחוקות &nbsp; </label>  
                                                    <label>  <input type = "radio"  value="אף פעם" name="communication3" <?php if (isset ($row4['communication3']) && $row4['communication3'] == "אף פעם" ) { echo 'checked';}?>> אף פעם &nbsp; </label>  
                                                    </div>

                                                    <div class="container">
                                                    <h5 style> <b> אינו/ה מפרש/ת רמזים וסיטואציות חברתיות </b></h5>
                                                    <label>  <input type = "radio"  value="תמיד" name="communication4"  required  <?php if (isset ($row4['communication4']) && $row4['communication4'] == "תמיד" ) { echo 'checked';}?>> תמיד &nbsp; </label>                         
                                                    <label>  <input type = "radio"  value="לעיתים" name="communication4" <?php if (isset ($row4['communication4']) && $row4['communication4'] == "לעיתים" ) { echo 'checked';}?>> לעיתים &nbsp; </label>  
                                                    <label>  <input type = "radio"  value="לעיתים רחוקות" name="communication4" <?php if (isset ($row4['communication4']) && $row4['communication4'] == "לעיתים רחוקות" ) { echo 'checked';}?>> לעיתים רחוקות &nbsp; </label>  
                                                    <label>  <input type = "radio"  value="אף פעם" name="communication4" <?php if (isset ($row4['communication4']) && $row4['communication4'] == "אף פעם" ) { echo 'checked';}?>> אף פעם &nbsp; </label>  

                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div> 

                        <div class="col-lg-12 col-xl-10" style="margin-right:5%;">
                            <div id="accordion3" class="card-accordion">
                                <div class="card collapse-icon accordion-icon-rotate">
                                    <div class="card">
                                        <div class="card-header" id="headingGOne">
                                            <h4 class="mb-0">
                                                <button type='button' class="btn btn-link" style="font-size:16px" data-toggle="collapse" data-target="#accordionC3" aria-expanded="true" aria-controls="accordionC1">
                                                מוטוריקה עדינה
                                                </button>
                                            </h4>
                                        </div>

                                        <div id="accordionC3" class="collapse show" aria-labelledby="headingGOne" data-parent="#accordion3">
                                            <div class="card-body" style="background-color:LavenderBlush">
                                            <div class="row skin skin-flat ">
                                            <div class="col-md-10 col-sm-12 col-xs-12">
                                                   <div class="container">
                                                   <h5> <b> אחיזה ושליטה בכלי כתיבה </b></h5>
                                                   <label> <input type = "radio"  value="בהתאם לגיל" name="motorica1" required <?php if (isset ($row4['motorica1']) && $row4['motorica1'] == "בהתאם לגיל" ) { echo 'checked';}?>> בהתאם לגיל &nbsp;     </label>                    
                                                   <label> <input type = "radio"  value="מתקשה" name="motorica1" <?php if (isset ($row4['motorica1']) && $row4['motorica1'] == "מתקשה" ) { echo 'checked';}?> > מתקשה &nbsp;</label>
                                                   <label> <input type = "radio"  value="מתקשה מאוד" name="motorica1" <?php if (isset ($row4['motorica1']) && $row4['motorica1'] == "מתקשה מאוד" ) { echo 'checked';}?>> מתקשה מאוד &nbsp;</label> 
                                                   <label> <input type = "radio"  value="נמנע/ת" name="motorica1"  <?php if (isset ($row4['motorica1']) && $row4['motorica1'] == "נמנע/ת" ) { echo 'checked';}?>> נמנע/ת &nbsp;     </label> 
                                                    </div>
                                                    <div class="container">
                                                    <h5> <b> ציור, צביעה ויצירה </b></h5>
                                                    <label> <input type = "radio"  value="בהתאם לגיל" name="motorica2" required <?php if (isset ($row4['motorica2']) && $row4['motorica2'] == "בהתאם לגיל" ) { echo 'checked';}?>> בהתאם לגיל &nbsp; </label>                        
                                                    <label> <input type = "radio"  value="מתקשה" name="motorica2" <?php if (isset ($row4['motorica2']) && $row4['motorica2'] == "מתקשה" ) { echo 'checked';}?>> מתקשה &nbsp; </label> 
                                                    <label> <input type = "radio"  value="מתקשה מאוד" name="motorica2"" <?php if (isset ($row4['motorica2']) && $row4['motorica2'] == "מתקשה מאוד" ) { echo 'checked';}?>> מתקשה מאוד &nbsp;</label> 
                                                    <label> <input type = "radio"  value="נמנע/ת" name="motorica2" <?php if (isset ($row4['motorica2']) && $row4['motorica2'] == "נמנע/ת" ) { echo 'checked';}?>> נמנע/ת &nbsp; </label> 
                                                    </div>
                                                    <div class="container">
                                                    <h5> <b> משחקי בנייה והרכבה </b></h5>
                                                    <label> <input type = "radio"  value="בהתאם לגיל" name="motorica3" required  <?php if (isset ($row4['motorica3']) && $row4['motorica3'] == "בהתאם לגיל" ) { echo 'checked';}?>> בהתאם לגיל &nbsp;</label>                    
                                                    <label> <input type = "radio"  value="מתקשה" name="motorica3" <?php if (isset ($row4['motorica3']) && $row4['motorica3'] == "מתקשה" ) { echo 'checked';}?>> מתקשה &nbsp;</label> 
                                                    <label> <input type = "radio"  value="מתקשה מאוד" name="motorica3" <?php if (isset ($row4['motorica3']) && $row4['motorica3'] == "מתקשה מאוד" ) { echo 'checked';}?>> מתקשה מאוד &nbsp;</label> 
                                                    <label> <input type = "radio"  value="נמנע/ת" name="motorica3" <?php if (isset ($row4['motorica3']) && $row4['motorica3'] == "נמנע/ת" ) { echo 'checked';}?>> נמנע/ת &nbsp;</label> 
                                                    </div>
                                                    <div class="container" ">
                                                    <h5> <b> מניפולציות בכף היד (חרוזים והרכבות קטנות) </b></h5>
                                                    <label> <input type = "radio" value="בהתאם לגיל" name="motorica4" required <?php if (isset ($row4['motorica4']) && $row4['motorica4'] == "בהתאם לגיל" ) { echo 'checked';}?>> בהתאם לגיל &nbsp; </label>                       
                                                    <label> <input type = "radio" value="מתקשה" name="motorica4" <?php if (isset ($row4['motorica4']) && $row4['motorica4'] == "מתקשה" ) { echo 'checked';}?>> מתקשה &nbsp;</label> 
                                                    <label> <input type = "radio" value="מתקשה מאוד" name="motorica4" <?php if (isset ($row4['motorica4']) && $row4['motorica4'] == "מתקשה מאוד" ) { echo 'checked';}?>> מתקשה מאוד &nbsp;</label> 
                                                    <label> <input type = "radio" value="נמנע/ת" name="motorica4" <?php if (isset ($row4['motorica4']) && $row4['motorica4'] == "נמנע/ת" ) { echo 'checked';}?>> נמנע/ת &nbsp;</label> 
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>

                        <div class="col-lg-12 col-xl-10" style="margin-right:5%;">
                            <div id="accordion3" class="card-accordion">
                                <div class="card collapse-icon accordion-icon-rotate">
                                    <div class="card">
                                        <div class="card-header" id="headingGOne">
                                            <h4 class="mb-0">
                                                <button type='button' class="btn btn-link" style="font-size:16px" data-toggle="collapse" data-target="#accordionC4" aria-expanded="true" aria-controls="accordionC1">
                                                תפקודי קשב
                                                </button>
                                            </h4>
                                        </div>

                                        <div id="accordionC4" class="collapse show" aria-labelledby="headingGOne" data-parent="#accordion3">
                                            <div class="card-body" style="background-color:HoneyDew">
                                            <div class="row skin skin-flat ">
                                            <div class="col-md-10 col-sm-12">                                            
                                            <div class="container">
                                            <h5 style> <b> אימפולסיבי/ת </b></h5>
                                            <label>   <input type = "radio"  value="תמיד" name="attention1" required <?php if (isset ($row4['attention1']) && $row4['attention1'] == "תמיד" ) { echo 'checked';}?>> תמיד &nbsp;   </label>           
                                            <label>   <input type = "radio"  value="לעיתים" name="attention1" <?php if (isset ($row4['attention1']) && $row4['attention1'] == "לעיתים" ) { echo 'checked';}?>> לעיתים &nbsp; </label>  
                                            <label>   <input type = "radio"  value="לעיתים רחוקות" name="attention1" <?php if (isset ($row4['attention1']) && $row4['attention1'] == "לעיתים רחוקות" ) { echo 'checked';}?>> לעיתים רחוקות &nbsp; </label>  
                                            <label>   <input type = "radio"  value="אף פעם" name="attention1" <?php if (isset ($row4['attention1']) && $row4['attention1'] == "אף פעם" ) { echo 'checked';}?>> אף פעם &nbsp; </label>  

                                            </div>
                                            <div class="container">
                                            <h5> <b> קשוב/ה להוראות </b></h5>
                                             <label>  <input type = "radio"  value="תמיד" name="attention2"  required <?php if (isset ($row4['attention2']) && $row4['attention2'] == "תמיד" ) { echo 'checked';}?>> תמיד &nbsp;  </label>              
                                             <label>  <input type = "radio"  value="לעיתים" name="attention2" <?php if (isset ($row4['attention2']) && $row4['attention2'] == "לעיתים" ) { echo 'checked';}?>> לעיתים &nbsp; </label>  
                                             <label>  <input type = "radio"   value="לעיתים רחוקות" name="attention2" <?php if (isset ($row4['attention2']) && $row4['attention2'] == "לעיתים רחוקות" ) { echo 'checked';}?>> לעיתים רחוקות &nbsp; </label> 
                                             <label>  <input type = "radio"   value="אף פעם" name="attention2" <?php if (isset ($row4['attention2']) && $row4['attention2'] == "אף פעם" ) { echo 'checked';}?>> אף פעם &nbsp; </label>  
 
                                             </div>
                                            <div class="container"  >
                                            <h5> <b> מתמיד/ה במשימות </b></h5>
                                            <label> <input type = "radio"  value="תמיד" name="attention3"  required <?php if (isset ($row4['attention3']) && $row4['attention3'] == "תמיד" ) { echo 'checked';}?>> תמיד &nbsp; </label>                  
                                            <label> <input type = "radio"  value="לעיתים" name="attention3" <?php if (isset ($row4['attention3']) && $row4['attention3'] == "לעיתים" ) { echo 'checked';}?>> לעיתים &nbsp; </label>  
                                            <label> <input type = "radio"  value="לעיתים רחוקות" name="attention3" <?php if (isset ($row4['attention3']) && $row4['attention3'] == "לעיתים רחוקות" ) { echo 'checked';}?>> לעיתים רחוקות &nbsp; </label>  
                                            <label> <input type = "radio"  value="אף פעם" name="attention3" <?php if (isset ($row4['attention3']) && $row4['attention3'] == "אף פעם" ) { echo 'checked';}?>> אף פעם &nbsp; </label>  

                                            </div>
                                             <div class="container" >
                                             <h5> <b> מרבה להתנועע </b></h5>
                                             <label> <input type = "radio"  value="תמיד" name="attention4" required <?php if (isset ($row4['attention4']) && $row4['attention4'] == "תמיד" ) { echo 'checked';}?>> תמיד &nbsp;   </label>                 
                                             <label> <input type = "radio"  value="לעיתים" name="attention4" <?php if (isset ($row4['attention4']) && $row4['attention4'] == "לעיתים" ) { echo 'checked';}?>> לעיתים &nbsp; </label>  
                                             <label> <input type = "radio"  value="לעיתים רחוקות" name="attention4" <?php if (isset ($row4['attention4']) && $row4['attention4'] == "לעיתים רחוקות" ) { echo 'checked';}?>> לעיתים רחוקות &nbsp; </label>  
                                             <label> <input type = "radio"  value="אף פעם" name="attention4" <?php if (isset ($row4['attention4']) && $row4['attention4'] == "אף פעם" ) { echo 'checked';}?>> אף פעם &nbsp; </label>  

                                             </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>

                        <div class="col-lg-12 col-xl-10" style="margin-right:5%;">
                            <div id="accordion3" class="card-accordion">
                                <div class="card collapse-icon accordion-icon-rotate">
                                    <div class="card">
                                        <div class="card-header" id="headingGOne">
                                            <h4 class="mb-0">
                                                <button type='button' class="btn btn-link" style="font-size:16px" data-toggle="collapse" data-target="#accordionC5" aria-expanded="true" aria-controls="accordionC1">
                                               תפקוד תנועתי
                                                </button>
                                            </h4>
                                        </div>

                                        <div id="accordionC5" class="collapse show" aria-labelledby="headingGOne" data-parent="#accordion3">
                                            <div class="card-body" style="background-color:LightCyan">
                                            <div class="row skin skin-flat ">
                                            <div class="col-md-10 col-sm-12">
                                            
                                            <div class="container">
                                            <h5> <b> הליכה וריצה </b></h5>
                                            <label>  <input type = "radio" value="בהתאם לגיל" name="movement1" required <?php if (isset ($row4['movement1']) && $row4['movement1'] == "בהתאם לגיל" ) { echo 'checked';}?>> בהתאם לגיל &nbsp; </label>                         
                                            <label>  <input type = "radio"  value="מתקשה" name="movement1" <?php if (isset ($row4['movement1']) && $row4['movement1'] == "מתקשה" ) { echo 'checked';}?>> מתקשה &nbsp; </label>  
                                            <label>  <input type = "radio"  value="מתקשה מאוד" name="movement1"  <?php if (isset ($row4['movement1']) && $row4['movement1'] == "מתקשה מאוד" ) { echo 'checked';}?>> מתקשה מאוד &nbsp; </label>  
                                            <label>  <input type = "radio"  value="נמנע/ת" name="movement1"  <?php if (isset ($row4['movement1']) && $row4['movement1'] == "נמנע/ת" ) { echo 'checked';}?>> נמנע/ת &nbsp; </label>  
                                            </div>
                                            <div class="container" >
                                            <h5> <b> קפיצה </b></h5>
                                            <label>   <input type = "radio" value="בהתאם לגיל" name="movement2"  required <?php if (isset ($row4['movement2']) && $row4['movement2'] == "בהתאם לגיל" ) { echo 'checked';}?>> בהתאם לגיל &nbsp; </label>                       
                                            <label>   <input type = "radio"  value="מתקשה" name="movement2"  <?php if (isset ($row4['movement2']) && $row4['movement2'] == "מתקשה" ) { echo 'checked';}?>> מתקשה &nbsp; </label>  
                                            <label>   <input type = "radio"  value="מתקשה מאוד" name="movement2"  <?php if (isset ($row4['movement2']) && $row4['movement2'] == "מתקשה מאוד" ) { echo 'checked';}?>> מתקשה מאוד &nbsp; </label>  
                                            <label>   <input type = "radio"  value="נמנע/ת" name="movement2" <?php if (isset ($row4['movement2']) && $row4['movement2'] == "נמנע/ת" ) { echo 'checked';}?>> נמנע/ת &nbsp; </label>  
                                            </div>
                                             <div class="container" > 
                                            <h5> <b> השתתפות בריתמיקה </b></h5>
                                            <label>  <input type = "radio"  value="בהתאם לגיל" name="movement3" required <?php if (isset ($row4['movement3']) && $row4['movement3'] == "בהתאם לגיל" ) { echo 'checked';}?>> בהתאם לגיל &nbsp; </label>                 
                                            <label>  <input type = "radio" value="מתקשה" name="movement3"  <?php if (isset ($row4['movement3']) && $row4['movement3'] == "מתקשה" ) { echo 'checked';}?>> מתקשה &nbsp; </label>  
                                            <label>  <input type = "radio"  value="מתקשה מאוד" name="movement3"  <?php if (isset ($row4['movement3']) && $row4['movement3'] == "מתקשה מאוד" ) { echo 'checked';}?>> מתקשה מאוד &nbsp; </label>  
                                            <label>  <input type = "radio"  value="נמנע/ת" name="movement3" <?php if (isset ($row4['movement3']) && $row4['movement3'] == "נמנע/ת" ) { echo 'checked';}?>> נמנע/ת &nbsp; </label>  
                                            </div>
                                             <div class="container"> 
                                              <h5> <b> משחקי כדור </b></h5>
                                              <label>   <input type = "radio"  value="בהתאם לגיל" name="movement4" required <?php if (isset ($row4['movement4']) && $row4['movement4'] == "בהתאם לגיל" ) { echo 'checked';}?>> בהתאם לגיל &nbsp;   </label>                         
                                              <label>   <input type = "radio"  value="מתקשה" name="movement4"  <?php if (isset ($row4['movement4']) && $row4['movement4'] == "מתקשה" ) { echo 'checked';}?>> מתקשה &nbsp; </label>  
                                              <label>   <input type = "radio"  value="מתקשה מאוד" name="movement4"  <?php if (isset ($row4['movement4']) && $row4['movement4'] == "מתקשה מאוד" ) { echo 'checked';}?>> מתקשה מאוד &nbsp; </label> 
                                              <label>   <input type = "radio"   value="נמנע/ת" name="movement4" <?php if (isset ($row4['movement4']) && $row4['movement4'] == "נמנע/ת" ) { echo 'checked';}?>> נמנע/ת &nbsp; </label> 
                                              </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>


                        <div class="col-lg-12 col-xl-10" style="margin-right:5%;">
                            <div id="accordion3" class="card-accordion">
                                <div class="card collapse-icon accordion-icon-rotate">
                                    <div class="card">
                                        <div class="card-header" id="headingGOne">
                                            <h4 class="mb-0">
                                                <button type='button' class="btn btn-link" style="font-size:16px" data-toggle="collapse" data-target="#accordionC6" aria-expanded="true" aria-controls="accordionC1">
                                                מידת העצמאות והתלות
                                                </button>
                                            </h4>
                                        </div>

                                        <div id="accordionC6" class="collapse show" aria-labelledby="headingGOne" data-parent="#accordion3">
                                            <div class="card-body" style="background-color:Lavender">
                                            <div class="row skin skin-flat ">
                                            <div class="col-md-10 col-sm-12">
                                            <div class="container" >
                                            <h5> <b> ביצוע משימות </b></h5>
                                            <label>  <input type = "radio"  value="עצמאי/ת" name="independence1" required <?php if (isset ($row4['independence1']) && $row4['independence1'] == "עצמאי/ת" ) { echo 'checked';}?>>  עצמאי/ת &nbsp;   </label>                  
                                            <label>  <input type = "radio"  value="לעיתים תלוי/ה" name="independence1"   <?php if (isset ($row4['independence1']) && $row4['independence1'] == "לעיתים תלוי/ה" ) { echo 'checked';}?>> לעיתים תלוי/ה &nbsp; </label> 
                                            <label>  <input type = "radio"  value="תלוי/ה במבוגר" name="independence1"   <?php if (isset ($row4['independence1']) && $row4['independence1'] == "תלוי/ה במבוגר" ) { echo 'checked';}?>> תלוי/ה במבוגר &nbsp; </label> 
                                            </div>
                                            <div class="container">
                                            <h5> <b> אכילה </b></h5>
                                            <label>   <input type = "radio"   value="עצמאי/ת" name="independence2" required  <?php if (isset ($row4['independence2']) && $row4['independence2'] == "עצמאי/ת" ) { echo 'checked';}?>>  עצמאי/ת &nbsp;   </label>                
                                            <label>   <input type = "radio"  value="לעיתים תלוי/ה" name="independence2"  <?php if (isset ($row4['independence2']) && $row4['independence2'] == "לעיתים תלוי/ה" ) { echo 'checked';}?>> לעיתים תלוי/ה &nbsp; </label> 
                                            <label>   <input type = "radio"  value="תלוי/ה במבוגר" name="independence2"  <?php if (isset ($row4['independence2']) && $row4['independence2'] == "תלוי/ה במבוגר" ) { echo 'checked';}?>> תלוי/ה במבוגר &nbsp; </label>         
                                           </div>
                                            <div class="container">
                                           <h5> <b> שמירה על הניקיון  </b></h5><br>
                                            <label>   <input type = "radio"  value="עצמאי/ת" name="independence3" required  <?php if (isset ($row4['independence3']) && $row4['independence3'] == "עצמאי/ת" ) { echo 'checked';}?>> עצמאי/ת &nbsp;      </label>               
                                            <label>   <input type = "radio"  value="לעיתים תלוי/ה" name="independence3"  <?php if (isset ($row4['independence3']) && $row4['independence3'] == "לעיתים תלוי/ה" ) { echo 'checked';}?>> לעיתים תלוי/ה &nbsp;  </label> 
                                            <label>   <input type = "radio"  value="תלוי/ה במבוגר" name="independence3"  <?php if (isset ($row4['independence3']) && $row4['independence3'] == "תלוי/ה במבוגר" ) { echo 'checked';}?>> תלוי/ה במבוגר &nbsp; </label> 
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                     
                        <input type = "submit" value = "שלח דוח" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-8 mr-1 mb-1 " style="margin-top:5%; margin-right:10%;">                                   
                        </form> 
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


    <?php
   include('Templates/footer.php');
   include('Templates/JS.php');
?>

</body>

</html>

<?php 
include ('Templates/DB.php');
include ('Templates/menu.php');
include ('Templates/head.php');

$date1 =date("Y-m-d");
if (isset($_POST['search'])) {
    $date1 = $_POST['dates1'];
}

    $query ="SELECT * FROM accounts WHERE username = '$username1'";
    mysqli_query($conn, $query) or die('Error querying database.');
    $result1 = mysqli_query($conn, $query);
    $row2 = mysqli_fetch_array($result1);
    
?>

<style>
td, th {
   text-align: center;
}

h5, p{
    display: inline;
     text-align: right;
}

h3{
    color:black;
}


.card-body{
    margin-bottom: 3%;
}

body{
    color:black;
}

@media screen and (max-width: 800px) {
h5, p{
    display:block;
    text-align: center;
}
</style>


<title>KidsCare-Developmental Reports</title>


<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">דיווחי התפתחות </h3>
                </div>
            </div>
           
                 </div>
                 <div class="content-body">
                <section id="line-awesome-icons">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-center" style ="margin-top:2%;">   הורים יקרים,<br>  כדי שתוכלו לעקוב אחר התפתחות ילדכם במהלך השנה <br>
                  אנו נמלא בכל רבעון דוח התפתחות המומלץ על ידי משרד הבריאות. <br> <br>
                 אנו ממליצות לעיין בדוחות בתשומת לב ולעזור לילדכם לשפר את יכולתיו   <br> 
                 בתחומים בהם הוא מתקשה.</h3> 
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
                                        <div class="text-center"                
                                                
                                            <div class="container">
                                     
                                                <div class="row">  
                                    
                                        <?php   
                                        $qD= "SELECT * from  developmentalreport where username = '$username1'";
                                        $resD= $conn->query($qD);
                                        $countD = $resD->num_rows;
                                        if ($countD > 0) {
                                            $i=1;
                                            while ($row3D = $resD->fetch_assoc()) { ?>
                                                                    <div class="col-lg-12 col-xl-12">
                                       
                                             <div id="accordion3" class="card-accordion">
                                <div class="card collapse-icon accordion-icon-rotate">
                                <div class="card">
                                        <div class="card-header" id="headingGOne">
                                            <button type='button' class="btn btn-link " style="font-size:18px; " data-toggle="collapse" data-target="<?php echo '#accordionC'.$i; ?>" aria-expanded="true" "<?php echo 'accordionC'.$i; ?>">
                                            דוח לתאריך  <?= $row3D['date'] ?></button> 
                                        </div>
                                        <div id="<?php echo 'accordionC'.$i; ?>" class="collapse " aria-labelledby="headingGOne" data-parent="<?php echo '#accordionC'.$i; ?>">

                                                <div class="col-lg-12 col-xl-12 text-center" style="margin-bottom:6%" >
                                                              <div class="card" style="margin-top:4%;">
                                                               <h4> שפה (הבנה והבעה)</h4> 
                                                                <div class="card-body" style="background-color:LightCyan">
                                                                 <h5> <b>  מבינ/ה את התכנים הנלמדים בגן-  </b></h5>
                                                                <p class="media-heading text-bold-700"><?php echo $row3D['Language1'] ?></p><br>                                                                 <br>
                                                                <h5> <b>מבי/ה ועונה נכון על שאלות שנשאל-</b></h5>
                                                                <p class="media-heading text-bold-700"><?php echo $row3D['Language2'] ?></p><br>                                                                   
                                                                <h5> <b>מתאר/ת באופן מילולי תמונות שמוצגות לו- </b></h5>
                                                                <p class="media-heading text-bold-700"><?php echo $row3D['Language3'] ?></p><br>                                                                 <br>
                                                                <h5> <b>האם קיים חוסר שטף בדיבור (גמגום)?</b></h5>
                                                                <p class="media-heading text-bold-700"><?php echo $row3D['Language4'] ?></p><br>                                                                 </div>
                                                          
                                                                <h4> תפקוד חברתי ותקשורתי </h4>
                                                                <div class="card-body" style="background-color:Lavender">
                                                                <h5 > <b> יוצר/ת קשר עם ילדים ומסוגל/ת ליזום משחק- </b></h5>
                                                                <p class="media-heading text-bold-700"><?php echo $row3D['communication1'] ?></p><br>                                                                 <br>
                                                                <h5> <b> משתתפ/ת בתחרויות ומקבל/ת הן הצלחה והן כישלון- </b></h5>
                                                                 <p class="media-heading text-bold-700"><?php echo $row3D['communication2'] ?></p><br>                                                                 <br>
                                                                <h5> <b> מגיב/ה באלימות פיזית או מילולית </b></h5>
                                                                <p class="media-heading text-bold-700"> <?php echo $row3D['communication3'] ?></p><br>                                                                 <br>
                                                                <h5 > <b> אינו/ה מפרש רמזים וסיטואציות חברתיות- </b></h5>
                                                                <p class="media-heading text-bold-700"><?php echo $row3D['communication4'] ?></p><br>                                                                 <br>
                                                                </div>

                                                                <h4> מוטוריקה עדינה </h4>
                                                                <div class="card-body" style="background-color:LavenderBlush">
                                                                <h5 > <b> אחיזה ושליטה בכלי כתיבה- </b></h5>
                                                                <p class="media-heading text-bold-700"><?php echo $row3D['motorica1'] ?></p><br>                                                                 <br>
                                                                <h5 > <b> ציור, צביעה ויצירה- </b></h5>
                                                                <p class="media-heading text-bold-700"><?php echo $row3D['motorica2'] ?></p><br>                                                                 <br>
                                                                <h5 > <b> משחקי בנייה והרכבה- </b></h5>
                                                                <p class="media-heading text-bold-700"><?php echo $row3D['motorica3'] ?></p><br>                                                                 <br>
                                                                <h5 > <b> מניפולציות בכף היד (חרוזים והרכבות קטנות)- </b></h5>
                                                                <p class="media-heading text-bold-700"><?php echo $row3D['motorica4'] ?></p><br> 
                                                                <br>
                                                                </div>
                    
                                                                <h4> תפקודי קשב</h4> 
                                                                 <div class="card-body" style="background-color:HoneyDew">
                                                                <h5> <b> אימפולסיבי/ת- </b></h5>
                                                                <p class="media-heading text-bold-700"><?php echo $row3D['attention1'] ?></p><br>                                                                <br>
                                                                <h5 > <b> קשוב/ה להוראות- </b></h5>
                                                                <p s class="media-heading text-bold-700"><?php echo $row3D['attention2'] ?></p><br>                                                                <br>
                                                                <h5> <b> מתמיד/ה במשימות- </b></h5>
                                                                <p class="media-heading text-bold-700"><?php echo $row3D['attention3'] ?></p><br>                                                                
                                                                <h5 > <b> מרבה להתנועע- </b></h5>
                                                                <p  class="media-heading text-bold-700"><?php echo $row3D['attention4'] ?></p><br>
                                                                  </div>
                                                           
                                                                <h4> תפקוד תנועתי</h4> 
                                                                <div class="card-body" style="background-color:LightCyan">
                                                                 <h5> <b> הליכה וריצה- </b></h5>
                                                                <p  class="media-heading text-bold-700"><?php echo  $row3D['movement1'] ?></p><br>
                                                                <h5> <b> קפיצה </b></h5>
                                                                <p class="media-heading text-bold-700"><?php echo $row3D['movement2'] ?></p><br>
                                                                <h5> <b> השתתפות בריתמיקה- </b></h5>
                                                                <p class="media-heading text-bold-700"><?php echo $row3D['movement3'] ?></p><br>
                                                                <h5> <b> משחקי כדור- </b></h5>
                                                                <p  class="media-heading text-bold-700"><?php echo $row3D['movement4'] ?></p><br>
                                                                </div>
                                                         
                                                                <h4> מידת העצמאות והתלות</h4>
                                                                <div class="card-body" style="background-color:Lavender">
                                                                <h5> <b> ביצוע משימות- </b></h5>
                                                                <p class="media-heading text-bold-700"><?php echo $row3D['independence1'] ?></p><br>
                                                                <h5> <b> אכילה- </b></h5>
                                                                <p class="media-heading text-bold-700"><?php echo $row3D['independence2'] ?></p><br>
                                                                <h5> <b> שמירה על הניקיון-  </b></h5>
                                                                <p class="media-heading text-bold-700"><?php echo $row3D['independence3'] ?></p><br>
                                                                </div>
                                                                </div>        
                                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                        <?php 
                                $i++;
    
                                    }

                                        }

                                        else {  ?>
                                        <div style ="margin:auto"> 
                                        <h2 >לא הוזנו דוחות עדיין</h2>
                                        </div>
                                            <?php  }
                                        ?>
                                       
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
include ('Templates/footer.php');
include ('Templates/JS.php');
?>

</body>
</html>
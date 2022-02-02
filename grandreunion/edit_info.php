<?php
    session_start();  
    
    if(!isset($_SESSION['email']))
    {
      header("Location: ../logout.html");
    }
        // CREATING SESSION  
        $name    = $_SESSION['Name']      ;
        $email   = $_SESSION['email']     ;
        $address = $_SESSION['address']   ;
        $city    = $_SESSION['city']      ;
        $state   = $_SESSION['state']     ;
        $country = $_SESSION['country']   ;
        $zipcode = $_SESSION['zipcode']   ;
        $mobile  = $_SESSION['mobile']    ;
        $dob     = $_SESSION['dob']       ;

        $status      = $_SESSION['status']       ;
        $certificate = $_SESSION['certificate']  ;
        $dosedate    = $_SESSION['valid']        ;

          $marital      = $_SESSION['marital']        ;
        $accompaniments = $_SESSION['accompanyingNo'] ;
          $gh           = $_SESSION['room']           ;
          $cost         = $_SESSION['cost']           ;

        $industry     = $_SESSION['industry']     ;
        $profession   = $_SESSION['profession']   ;
        $organisation = $_SESSION['orgName']      ;
        $designation  = $_SESSION['designation']  ;
        $waddress     = $_SESSION['work_address'] ;
        $wcity        = $_SESSION['work_city']    ;
        $wstate       = $_SESSION['work_state']   ;
        $wcountry     = $_SESSION['work_country'] ;
        $wzipcode     = $_SESSION['work_zipcode'] ;

        $rollno      = $_SESSION['rollNum']         ;
        $joinyear    = $_SESSION['joinYear']        ;
        $degree      = $_SESSION['degree']          ;
        $dept        = $_SESSION['department']      ;
        $hall        = $_SESSION['hall']            ;
        $yog         = $_SESSION['graduatingYear']  ;
        $involvement = $_SESSION['involvements']    ;
        $hobbies     = $_SESSION['hobbies']         ;

        $reciept = $_SESSION['reciept'] ;  
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,700,300'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="./css/signup.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

</head>
<body>
<?php include('navbar.php') ?>
<!-- partial:index.partial.html -->
<div class="signup__container">
  <div class="container__child signup__thumbnail">
    <div class="thumbnail__content text-center">
      <h1 class="heading--primary">Personal Details</h1>
      <h2 class="heading--secondary"></h2>
    </div>
    <div class="signup__overlay"></div>
  </div>
  <div class="container__child signup__form">
    <form action="backend\signup.php" method = "post" enctype="multipart/form-data" onSubmit="window.location.reload()">
      <?php include './edit/personal.php' ?>
      <?php include './edit/covid.php' ?>
      <?php include './edit/accomodation.php' ?>
      <?php include './edit/work.php' ?>
      <?php include './edit/nostalgia.php' ?>
    </form>  
  </div>
</div>
<!-- partial -->

<script>
       let next5Allow=0;
       document.getElementById("accompanyingNo").defaultValue = "0";
       function next1(){
           let name = document.getElementById("name").value;
           let city = document.getElementById("personal_city").value;
           let country = document.getElementById("country").value;
           let mobile = document.getElementById("mobile").value;
           let dob = document.getElementById("dob").value;
           console.log(dob.length);
           if(name.length>0&&city.length>0&&country.length>0&&mobile.length>0&&dob.length>0){
                document.getElementsByClassName("section1")[0].style.display = 'none';
                document.getElementsByClassName("section2")[0].style.display = 'block';
                document.getElementsByClassName("heading--primary")[0].innerHTML = "Covid Information";
           }
           else{
               alert("Filled the requried Fields!!");
           }
       }
       function back1(){
        //    console.log("Im in");
           document.getElementsByClassName("section2")[0].style.display = 'block';
           document.getElementsByClassName("section3")[0].style.display = 'none';
           document.getElementsByClassName("heading--primary")[0].innerHTML = "Covid Information";
       } 
       function next2(){
        //    console.log("Im in");
           let nguests = document.getElementById("accompanyingNo").value;
           let room = document.getElementById("room").value;

           if(nguests.length>0 && room.length>0){
                document.getElementsByClassName("section3")[0].style.display = 'none';
                document.getElementsByClassName("section4")[0].style.display = 'block';
                document.getElementsByClassName("heading--primary")[0].innerHTML = "Work Experience";
           }
           else{
               alert("Filled the requried Fields!!");
           }
       } 
       function back2(){
        //    console.log("Im in");
           document.getElementsByClassName("section3")[0].style.display = 'block';
           document.getElementsByClassName("section4")[0].style.display = 'none';
           document.getElementsByClassName("heading--primary")[0].innerHTML = "Accomodation";
       }
       function next3(){
        //    console.log("Im in");

           let org = document.getElementById("org").value;
           let designation = document.getElementById("desig").value;
           if(org.length>0 && designation.length > 0){
                document.getElementsByClassName("section4")[0].style.display = 'none';
                document.getElementsByClassName("section5")[0].style.display = 'block';
                document.getElementsByClassName("heading--primary")[0].innerHTML = "Nostalgic Section";
           }
           else{
               alert("Filled the requried Fields!!");
           }
           
       }
       function back3(){

           document.getElementsByClassName("section4")[0].style.display = 'block';
           document.getElementsByClassName("section5")[0].style.display = 'none';
           document.getElementsByClassName("heading--primary")[0].innerHTML = "Work Experience";

       } 

       function next4(){

        let joinyear = document.getElementById("join").value;
        let degrees = document.getElementById("degree").value;
        let dep = document.getElementById("dept").value;
        let hall = document.getElementById("hall").value;
        let yog = document.getElementById("yog").value;

        if(joinyear.length > 0 && degrees.length>0 && dep.length>0 && hall.length > 0 && yog.length>0){
            document.getElementsByClassName("section5")[0].style.display = 'none';
            document.getElementsByClassName("section6")[0].style.display = 'block';
            document.getElementsByClassName("heading--primary")[0].innerHTML = "Covid Information";
        }
        else{
               alert("Filled the requried Fields!!");
           }
       }

       function back4(){

           document.getElementsByClassName("section1")[0].style.display = 'block';
           document.getElementsByClassName("section2")[0].style.display = 'none';
           document.getElementsByClassName("heading--primary")[0].innerHTML = "Personal Details";
         
       } 

       function next5(){
           console.log("next5");
            let status=document.getElementById("status").value;
            let certificate=document.getElementById("certificate").value;
            let yes=document.getElementById("yes").checked;
            let no=document.getElementById("no").checked;
            

            if(status == "Fully Vaccinated"){
                if(certificate !="") next5Allow=1;
            }
            else if(status == "Partially Vaccinated"){
                if((yes || no) && certificate !="") next5Allow=1;
            }
            else if(status == "Not Vaccinated Yet"){
                if(yes || no) next5Allow=1;
            }else{
                next5Allow=0;
            }
            // const fi = document.getElementById('certificate');
        // Check if any file is selected.
        // if (fi.files.length > 0) {
        //     for (var i = 0; i <= fi.files.length - 1; i++) {
  
        //         const fsize = fi.files.item(i).size;
        //         const file = Math.round((fsize / 1024));
        //         // The size of the file.
        //         //console.log(file);
        //         if(fsize > 5242880){
        //             console.log(fsize);
        //             // document.getElementById('submit').disabled = true;
        //             next5Allow = 0;
        //             document.getElementById('size_file').style.visibility = "visible";
        //             // visibility: visible;
        //         }
        //     }
        // }
            if(next5Allow){

                document.getElementsByClassName("section2")[0].style.display = 'none';
                document.getElementsByClassName("section3")[0].style.display = 'block';
                document.getElementsByClassName("heading--primary")[0].innerHTML = "Accomodation";

            }


           
       }

       function back5(){

            document.getElementsByClassName("section5")[0].style.display = 'block';
           document.getElementsByClassName("section6")[0].style.display = 'none';
       }



       function calc_cost(){
           let nguest = document.getElementById("accompanyingNo").value;
           let choice = document.getElementById("room").value;
           console.log(nguest,choice);

           var cost = 0;

           if(choice === "Technology Guest House/ Alumni Guest House"){
                cost = 2250 + 7000 + 4000*nguest + 2250*nguest;
           }
           else if(choice === "VGH/ SAM"){
               cost = 900 + 900*nguest + 7000 + 4000*nguest; 
           }
           else if(choice === "NA"){
               cost = 7000; 
           }

           document.getElementById("cost").value =  "Total Cost = (₹) "+cost;

           console.log(cost);
       }

       function vaccine(){
            if(document.getElementById('status').value == "Partially Vaccinated"){
                console.log("pv");
                // document.getElementsByClassName("imp")[0].style.display = 'inline-block';
                document.getElementsByClassName("valid1")[0].style.display = 'block';
                document.getElementsByClassName("certification1")[0].style.display='block';
                
            }
            if(document.getElementById('status').value == "Not Vaccinated Yet"){
                console.log("nv");
                // document.getElementsByClassName("imp")[0].style.display = 'none';
                document.getElementsByClassName("valid1")[0].style.display = 'block';
                document.getElementsByClassName("certification1")[0].style.display='none';
            }
            if(document.getElementById('status').value == "Fully Vaccinated"){
                console.log("fv");
                // document.getElementsByClassName("imp")[0].style.display = 'inline-block';
                document.getElementsByClassName("valid1")[0].style.display = 'none';
                document.getElementsByClassName("certification1")[0].style.display='block';
            }
        };
       
    if(performance.navigation.type == 2){
        location.reload(true);
    }
    </script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
function checkemailAvailability() {
jQuery.ajax({
url: "Utility/check_username_availablity.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-email-availability-status").html(data);
},
error:function (){}
});
}
</script>
<!-- JS -->
<!--This will facilitate process of background tasks-->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.dirtyforms/2.0.0/jquery.dirtyforms.min.js"></script>
  
</body>
</html>

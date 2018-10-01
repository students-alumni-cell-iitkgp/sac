<html>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script type="text/javascript">
  $(function () {

    $('#form1').on('submit', function (e) {

      e.preventDefault();

      $.ajax({
        type: 'post',
        url: 'acap-rega.php',
        data: $('#form1').serialize(),
        success: function (response) {
        /* if(response== 0 )
         {
          swal({
            title: "WRONG CAPTCHA!",
            text: "Please re-enter the captcha!",
            icon: "error",
            buttons: true,
            dangerMode: true,
          }).then((value) => {

          });
        }*/
       
        if(response==0)
        {
          swal({
            title: "INCOMPLETE DETAILS!",
            text: "Please fill all the details!",
            icon: "error",
            buttons: true,
            dangerMode: true,
          }).then((value) => {

          });
        }
        else if(response== 2 )
        {
         swal({
          title: "REGISTRATED!",
          text: "Registration successful!",
          icon: "success",
          buttons: true,
          dangerMode: true,
        }).then((value) => {
          window.location="acap.php";

        });
//alert(response);
}
else
{
  alert(response);
}
}
});

    });

  });
</script> 





<script type="text/javascript">
  $(function () {

    $('#form2').on('submit', function (e) {

      e.preventDefault();

      $.ajax({
        type: 'post',
        url: 'acapregstu.php',
        data: $('#form2').serialize(),
        success: function (response) {
        if(response== 0 )
        {
          swal({
            title: "INCOMPLETE DETAILS!",
            text: "Please fill all the details!",
            icon: "error",
            buttons: true,
            dangerMode: true,
          }).then((value) => {

          });
        }
        else if(response== 2 )
        {
         swal({
          title: "REGISTERED!",
          text: "Registration successful!",
          icon: "success",
          buttons: true,
          dangerMode: true,
        }).then((value) => {
          window.location="acap.php";

        });
//alert(response);
}
else
{
  alert(response);
}
}
});

    });

  });
</script> 
<head>

  <title>Students Alumni Cell &middot; IIT Kharagpur</title>

  <link rel="icon" href="img/meet_14.png">

  <link rel="stylesheet" href="css/materialize.min.css">

  <script src="js/materialize.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/style.css">





  <style>

    ul.indicators{z-index: 3;}

    .slider .indicators .indicator-item{ height: 10px; width: 50px; border-radius: 0px; margin: 5px 12px; background-color: #a4a9b2; }

    .slider .indicators .indicator-item.active{ background-color: #717375; }



    @media only screen and (min-width: 768px) {

     .about {

       padding: 6px 100px;

     }





     .slider .slides li #img1 {

      background-size: 80% 100%;

      background-color: #FCFBF9;

      background-repeat: no-repeat;

      background-position: center;

    }





  }



  @media only screen and (max-width: 414px){

   .about{

     padding-left: .5em;

   }



 }

 @media only screen and (max-width: 995px){

   #fbplug{

    display: none;

  }

}



</style>

</head>

<body>

 <div class="_wrapper">

   <?php include 'navbar.php';?>



   <div>

    <img src="img/dak.jpg" width="100%" alt="">

    <div class="row">

      <div class="heading">

        <center>

          <h class="subheading"><b>Alumni Career Assistance Programme</b></h>

        </center>

      </div>

    </div>

    <div>

      <div class="center-align">

        <div class="row">

          <div class="col l10 offset-l1">

            <div >

              <p class="z-depth-1 text_align" style="font-size: 16px;padding: 3.3em 3em;background-color: white; " >'Alumni Career Assistance Programme' (ACAP) aims on helping the final year students to understand the confusing and tedious process of placements in a company specific manner, as every company has a different procedure for selection. The students sitting for placements will fill in their companies of choice in a manner of preference and will be allotted an alumnus/alumna who themselves were placed in the same company in KGP as a mentor/buddy.

                Each alumnus will be allotted at most 4 mentees and every student will fill in 3 companies of choice strictly in their order of preference.

                The students will be allotted respective mentors latest by 15th October giving them more than a month's time to prepare for the company of their choice.

                This initiative will help the students in applying and getting placed in various companies through without last minute chaos. This Program also signifies the first of the Institute's attempt at engagement of the recently graduated alumni with the Institute.
                Thus, we encourage all alumni to sign up for the Program and start off on the track of giving back to your alma mater. You can sign up through the 'Alumni Registration' link below.</p>

              </div></div>



            </div>

          </div>





        </div>





        <div class="heading">

          <center>

            <h class="subheading"><b>Registration</b></h>

          </center>

        </div>

        <hr><hr>

        <br>

        <div class="row" style="margin-left:20.5%">

          <div class="col l6" >

            <center>

              <div class="row section">

                <div class="col">

                  <!-- Modal Trigger -->

                  <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Alumni Registration</a>

                </div>

              </div>

              <!-- Modal Structure -->

              <div id="modal1" class="modal">

                <form class="col s12"  id="form1">

                 <div class="modal-content">

                  <h4>Alumni Registration <hr></h4>

                  <div class="row">

                   <div class="row">

                     <div class="input-field col s12">

                       <input placeholder="Name" name="name" type="text" class="validate" >

                       <label for="name">Name</label>

                     </div>

                   </div>

                   <div class="row">

                     <div class="input-field col s12">

                       <input placeholder="Phone Number" name="phoneno" type="text" class="validate">

                       <label for="phoneno">Phone No</label>

                     </div>

                   </div>

                   <div class="row">

                     <div class="input-field col s12">

                       <input placeholder="Email" name="email" type="email" class="validate">

                       <label for="email">Email</label>

                     </div>

                   </div>

                   <div class="row">

                    <div class="input-field col s12">

                     <input placeholder="Company Name" name="company" type="text" class="validate" >

                     <label for="hall">Current company</label>

                   </div>

                 </div>

                 <div class="row">

                  <div class="input-field col s12">

                   <input placeholder="Company Designation" name="designation" type="text" class="validate" >

                   <label for="hall">Current Designation</label>

                 </div>

               </div>

               <div class="row">

                <div class="input-field col s12">

                 <input placeholder="Current City" name="city" type="text" class="validate" >

                 <label for="hall">Current City</label>

               </div>

             </div>

             <div class="row">

               <div class="input-field col s12">

                <input placeholder="Areas Of Expertise" name="expertise" type="text" class="validate" >

                <label for="hall">Areas Of Expertise</label>

              </div>

            </div>

            <div class="row">

              <div class="input-field col s12">

               <input placeholder="Year of Graduation" name="gradyear" type="text" class="validate" >

               <label for="hall">Year of Graduation</label>

             </div>

           </div>

           <div class="row">

            <div class="input-field col s12">

             <input placeholder="Company placed via CDC" name="cdc" type="text" class="validate" >

             <label for="hall">Company placed via CDC</label>

           </div>

         </div>

           <!--
           <div class="row">

            <?php
           // @session_start();
           // include 'captcha_gen_a.php';
            ?>

            <div class="input-field col s12">
             <input placeholder="ENTER CAPTCHA" name="captcha_a" type="text" class="validate">

             <label for="email">ENTER CAPTCHA</label>


           </div>

         </div>-->

       </div>



     </div>
     <div class="modal-footer">

      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat" style="background-color:#26a69a"><input style="padding:9px"  type="submit" name="submit"></a>

    </div>

  </form>

</div>

</center>

</div>











<div class="col l6">

  <div class="row section">

    <div class="col">

      <!-- Modal Trigger -->

      <a class="waves-effect waves-light btn modal-trigger" href="#modal2">Students Registration</a>

    </div>

  </div>

  <!-- Modal Structure -->

  <div id="modal2" class="modal">

    <form class="col s12" id="form2" >

     <div class="modal-content">

      <h4> <center>Students Registration</center>   <hr></h4>

      <div class="row">

        <div class="row">

         <div class="input-field col s12">

           <input placeholder="Name" name="name" type="text" class="validate" >

           <label for="name">Name</label>

         </div>

       </div>

       <div class="row">

         <div class="input-field col s12">

           <input placeholder="Roll Number" name="roll" type="text" class="validate" >

           <label for="roll">Roll No</label>

         </div>

       </div>

       <div class="row">

         <div class="input-field col s12">

           <input placeholder="Phone Number" name="phoneno" type="text" class="validate">

           <label for="phoneno">Phone No</label>

         </div>

       </div>


       <div class="row">

         <div class="input-field col s12">

           <input placeholder="Email" name="email" type="email" class="validate">

           <label for="email">Email</label>

         </div>

       </div>

       <p style="
       margin-left: 12px;
       color: palegoldenrod;
       text-align: justify;
       ">Please fill in the companies for which you genuinely want to prepare for. This will greatly help us in allotting mentors to you.</p>

       <div class="row">

        <div class="input-field col s12">

         <input placeholder="Company Name" name="PC1" type="text" class="validate" >

         <label for="hall">Preferred company 1</label>

       </div>

     </div>

     <div class="row">

      <div class="input-field col s12">

       <input placeholder="Company Name" name="PC2" type="text" class="validate" >

       <label for="hall">Preferred company 2</label>

     </div>

   </div>

   <div class="row">

    <div class="input-field col s12">

     <input placeholder="Company Name" name="PC3" type="text" class="validate" >

     <label for="hall">Preferred company 3</label>

   </div>

 </div>

 <div class="row">

   <div class="input-field col s12">

     <input placeholder="Preferred placement field (Eg. Software, Consultancy)" name="PC4" type="text" class="validate">

     <label for="email">Preferred placement field (Eg. Software, Consultancy)</label>

   </div>

 </div>
 <!--
 <div class="row">

  <?php
 /* @session_start();
  include 'captcha_gen_s.php';*/
  ?>

  <div class="input-field col s12">
   <input placeholder="ENTER CAPTCHA" name="captcha_s" type="text" class="validate">

   <label for="email">ENTER CAPTCHA</label>


 </div>

</div>
-->






</div>

</div>




<div class="modal-footer">

  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat" style="background-color:#26a69a;padding:0px!important"><input style="padding:9px;width:150px"  type="submit" name="submit"></a>

</div>

</form>



</div>

</div>





</div>

<?php

include 'footer.php';

?>



</body>



<script type="text/javascript">

  $(document).ready(function(){

  // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered

  $('.modal-trigger').leanModal();

});

</script>




</html>



<html>
<head>
  <link rel="stylesheet" href="css/materialize.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style type="text/css">
 
   @media only screen and (min-width: 768px){
      .ac-sam-cov img{
        margin-left: 80px;



    }
   } 
    @media only screen and (max-width: 468px){
      .ac-sam-cov{

margin: 0px auto;
max-width:100%;

    }
   } 
    </style>
  <script>
   $(document).ready(function(){
    $('.slider').slider({full_width: true});
  });
 </script>
</head>
<body>
  <div class="_wrapper">
    <?php include 'navbar.php';?>
   
    <div class="row ac-sam-cov">
        <img src="img/sam3.jpg" class="">
    </div>
    <div class="row">
      <div class="col l8 s12 m8">
        <div class="info z-depth-2">
          <p>We live our day to day lives oblivious to the beauty that surrounds us. And by the time we do realise what exactly it is that we’ve been blessed with, it’s generally too late. But when the good ol’ days call yet again, nostalgia surrounds us as we walk the hallowed boulevards of our youth.
           The Annual Alumni Meet brings to the esteemed alumni a chance to reconnect with their Alma Mater. It lets them relive the carefree days of their college lives as they get a chance to visit all the locations they once frequented. With department and hall visits, and events like Illumination and Musical Night, the Meet rekindles the romance between the alumni and their institute. Apart from these, informal fun events like bonfire and kite flying bring out the child in all those present.
           From what used to be a simple dinner till its 7th year, the Annual Annual Meet has now evolved into a three day event that stirs up quite a buzz days before it takes place. The alumni enthusiastically look forward to getting back together with their batch mates and chatting up on what was and what has been. Each year now the Golden, Ruby and Silver Jubilee batches are invited to the meet as special guests of honor. The 13th Annual Alumni Meet celebrates 60 years of the graduation of the batch of 1955 – the first graduating batch of IIT Khara­gpur – by bringing them back to their roots. The Meet is now a major event anticipated by both the alumni and the students.
           As the years pass by and winds of change keep blowing, the Alumni Meet too shall keep evolving with the changing times, hoping to bring to the alumni an experience that they may cherish all their lives. </p>
         </div>
       </div>
       <div class="col l4 s12 m4">
        <div class="info z-depth-2">
        </div>
      </div>
    </div>
     <div class="row">
  <?php include 'gallery.php';?>
  </div>
  </div>
  <?php include 'footer.php';?>
</body>
</html>
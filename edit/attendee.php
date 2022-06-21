<style>

  .section2{
    display:block;
    width:100%;
    justify-content:center;
    /* margin-bottom:1rem; */

  }
  
  .mobilemode{
        display:none;
        width:100%;
  }
  .section2 .row{
   
    margin-top:25px;
    padding:0px;
    z-index: -2;
    display:flex;
    flex-flow:row nowrap;
    justify-content :center;
  }
  .section2 .bord{
      margin-left:20px;
  }

  .section2 button:hover{
    color: #4169e1;
  }
  .bord .d{
    color: #4169e1 !important;
    margin-right:13px;
    
  }
  .textS h2 {
    color: #4169e1;
    font-size: 280%;
  }
   
    .wrappers{
      max-width: 75%;
      margin-bottom:4%;   
      background-color: rgba(255, 255, 255, 0.93);
      
      margin:0 auto;
    }
    @media only screen and (max-width: 900px) {
      .section2{
        display:none;
      }
      .mobilemode{
        display:block;
      }
      .wrappers{
        margin-top:0;
        max-width: 101%;
        width:80%;
        /* margin-bottom:2%;    */
        background-color: rgb(229,228,226);
        padding:0;
      }
    }
    @media only screen and (max-width: 450px) {
      .section2{
        display:none;
      }
      .mobilemode{
        display:block;
      }
      .wrappers{
        margin-top:0;
        max-width: 101%;
        width:98%;
        /* margin-bottom:2%;    */
        background-color: rgb(229,228,226);
        padding:0;
      }
    }

.wrappers {
    margin-top: 4% !important;
    margin-bottom: 2% !important;
    background-color: white;
    margin: auto;
    width: 94%;
    /*max-width: 580px;*/
    box-shadow: 0px 2px 15px 0px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    padding-bottom: 2%;
}


.btn:focus {
    outline: none !important;
}


@media (min-width: 900px) {
    .bord {
        background-color: white;
        font-size: 0.9em;
    }
    .bord .bttons {
        /* font-size: large; */
        margin: 2px;
        padding: 4px 6px;
        /* width: 100%; */
    }
    .bord button {
        outline: none;
        background-color: transparent;
        border: 0px solid transparent;
        display: block;
        width: max-content;
        font-size:1rem !important;
    }
}


@media only screen and (max-width: 600px) {
  
    .wrappers {
        margin-left: 10px;
        margin-right: 10px;
    }
    
    .bord {
        /* border-right: 1px solid black;*/
        background-color: rgb(235, 235, 235);
        /* width: 50%; */
    }
    .bord .bttons {
        font-size: large;
        margin: 2px;
        padding: 2px 4px;
        width: 100%;
    }
    .bord button {
        margin-top: 5px;
        outline: none;
        background-color: transparent;
        border: 0px solid transparent;
        display: block;
        width: max-content;
    }
    .bord .bttons:hover {
        background-color: rgb(255, 255, 255);
        border: 0px solid transparent;
        border-radius: 10px;
    }
}
</style>

    <?php
      $path="connection.php";
      include 'adminPages/config.php';
      $batch2000=getBatch('2000');$no2000=getBatch('2000');
      $batch2002=getBatch('2002');$no2002=getBatch('2002');
      $batch2005=getBatch('2005');$no2005=getBatch('2005');
      $batch2007=getBatch('2007');$no2007=getBatch('2007');
      $batch2010=getBatch('2010');$no2010=getBatch('2010');
      $batch2012=getBatch('2012');$no2012=getBatch('2012');
      
      $no_of_people2000 = 0;
      $no_of_people2002 = 0;
      $no_of_people2005 = 0;
      $no_of_people2007 = 0;
      $no_of_people2010 = 0;
      $no_of_people2012 = 0;

      while($val=$no2000->fetch(PDO::FETCH_ASSOC)){ $no_of_people2000++;}
      while($val=$no2002->fetch(PDO::FETCH_ASSOC)){ $no_of_people2002++;}
      while($val=$no2005->fetch(PDO::FETCH_ASSOC)){ $no_of_people2005++;}
      while($val=$no2007->fetch(PDO::FETCH_ASSOC)){ $no_of_people2007++;}
      while($val=$no2010->fetch(PDO::FETCH_ASSOC)){ $no_of_people2010++;}
      while($val=$no2012->fetch(PDO::FETCH_ASSOC)){ $no_of_people2012++;}
    
    ?>
      <div class="prof8 wrappers section2" >
        <div class="container-fluid" style="margin-top:2.5vw !important;">
          <div class="row">
            <div class="col-md-3" style = "padding-top:30px">
              <div class="bord" style = "background-color:#fff; width:103%;padding-bottom:10px;margin-left:-10px;">
                <div class="bttons"><button class="my-1" id="2000_btn" onclick="show_2000()">2000 <span style="color:red;"><?php echo "(".$no_of_people2000.")" ?></span></button></div>
                <div class="bttons"><button class="my-1" id="2002_btn" onclick="show_2002()">2002 <span style="color:red;"><?php echo "(".$no_of_people2002.")" ?></span></button></div>
                <div class="bttons"><button class="my-1" id="2005_btn" onclick="show_2005()">2005 <span style="color:red;"><?php echo "(".$no_of_people2005.")" ?></span></button></div>
                <div class="bttons"><button class="my-1" id="2007_btn" onclick="show_2007()">2007 <span style="color:red;"><?php echo "(".$no_of_people2007.")" ?></span></button></div>
                <div class="bttons"><button class="my-1" id="2010_btn" onclick="show_2010()">2010 <span style="color:red;"><?php echo "(".$no_of_people2010.")" ?></span></button></div>
                <div class="bttons"><button class="my-1" id="2012_btn" onclick="show_2012()">2012 <span style="color:red;"><?php echo "(".$no_of_people2012.")" ?></span></button></div>
            </div>
            </div>
            <div class="col-8" style="background-color:white;">
              <div id="2000" style="text-align:center;">
                <table class="table">
                    <tr>
                        <th scope="row">Names</th>
                    </tr>
                    <?php   while($value=$batch2000->fetch(PDO::FETCH_ASSOC)){?>
                      <tr><td><?php echo  $value['name']; ?></td></tr>
                    <?php } ?>
                    </tr>
                    
                </table>
              </div>

              <div id="2002" style="text-align:center;">
                <table class="table">
                    <tr>
                        <th scope="row">Names</th>
                    </tr>
                    <?php   while($value=$batch2002->fetch(PDO::FETCH_ASSOC)){?>
                      <tr><td><?php echo  $value['name']; ?></td></tr>
                    <?php } ?>
                </table>
              </div>
              <div id="2005" style="text-align:center; ">
                <table class="table">
                    <tr>
                        <th scope="row">Names</th>
                    </tr>
                    <?php   while($value=$batch2005->fetch(PDO::FETCH_ASSOC)){?>
                      <tr><td><?php echo  $value['name']; ?></td></tr>
                    <?php } ?>
                </table>
              </div>
              <div id="2007" style="text-align:center; ">
                <table class="table">
                    <tr>
                        <th scope="row">Names</th>
                    </tr>
                    <?php   while($value=$batch2007->fetch(PDO::FETCH_ASSOC)){?>
                      <tr><td><?php echo  $value['name']; ?></td></tr>
                    <?php } ?>
                </table>
              </div>

              <div id="2010" style="text-align:center; ">
                <table class="table">
                    <tr>
                        <th scope="row">Names</th>
                    </tr>
                    <?php   while($value=$batch2010->fetch(PDO::FETCH_ASSOC)){?>
                      <tr><td><?php echo  $value['name']; ?></td></tr>
                    <?php } ?>
                </table>
              </div>
              <div id="2012" style="text-align:center; ">
                <table class="table">
                    <tr>
                        <th scope="row">Names</th>
                    </tr>
                    <?php   while($value=$batch2012->fetch(PDO::FETCH_ASSOC)){?>
                      <tr><td><?php echo  $value['name']; ?></td></tr>
                    <?php } ?>
                </table>
              </div>
            </div>
          </div>
          
          
        </div>
      </div>
      <script>
          function show_2000(){
            document.getElementById('2000').style.display = "block";
            document.getElementById('2002').style.display = "none";
            document.getElementById('2005').style.display = "none";
            document.getElementById('2007').style.display = "none";
            document.getElementById('2010').style.display = "none";
            document.getElementById('2012').style.display = "none";
            document.getElementById("2000_btn").style.color = "#4169e1";
            document.getElementById("2000_btn").style.color     = "black";
            document.getElementById("2005_btn").style.color  = "black";
            document.getElementById("2007_btn").style.color    = "black";
            document.getElementById("2010_btn").style.color  = "black";
            document.getElementById("2012_btn").style.color    = "black";
          }
          function show_2002(){
            document.getElementById('2000').style.display = "none";
            document.getElementById('2002').style.display = "block";
            document.getElementById('2005').style.display = "none";
            document.getElementById('2007').style.display = "none";
            document.getElementById('2010').style.display = "none";
            document.getElementById('2012').style.display = "none";
            document.getElementById("2000_btn").style.color = "black";
            document.getElementById("2002_btn").style.color     = "#4169e1";
            document.getElementById("2005_btn").style.color  = "black";
            document.getElementById("2007_btn").style.color    = "black";
            document.getElementById("2010_btn").style.color  = "black";
            document.getElementById("2012_btn").style.color    = "black";
          }
          function show_2005(){
            document.getElementById('2000').style.display = "none";
            document.getElementById('2002').style.display = "none";
            document.getElementById('2005').style.display = "block";
            document.getElementById('2007').style.display = "none";
            document.getElementById('2010').style.display = "none";
            document.getElementById('2012').style.display = "none";
            document.getElementById("2000_btn").style.color = "black";
            document.getElementById("2002_btn").style.color     = "black";
            document.getElementById("2005_btn").style.color  = "#4169e1";
            document.getElementById("2007_btn").style.color    = "black";
            document.getElementById("2010_btn").style.color  = "black";
            document.getElementById("2012_btn").style.color    = "black";
          }
          function show_2007(){
            document.getElementById('2000').style.display = "none";
            document.getElementById('2002').style.display = "none";
            document.getElementById('2005').style.display = "none";
            document.getElementById('2007').style.display = "block";
            document.getElementById('2010').style.display = "none";
            document.getElementById('2012').style.display = "none";
            document.getElementById("2000_btn").style.color = "black";
            document.getElementById("2002_btn").style.color     = "black";
            document.getElementById("2005_btn").style.color  = "black";
            document.getElementById("2007_btn").style.color    = "#4169e1";
            document.getElementById("2010_btn").style.color  = "black";
            document.getElementById("2012_btn").style.color    = "black";
          }

          function show_2010(){
            document.getElementById('2000').style.display = "none";
            document.getElementById('2002').style.display = "none";
            document.getElementById('2005').style.display = "none";
            document.getElementById('2007').style.display = "none";
            document.getElementById('2010').style.display = "block";
            document.getElementById('2012').style.display = "none";
            document.getElementById("2000_btn").style.color = "black";
            document.getElementById("2002_btn").style.color     = "black";
            document.getElementById("2005_btn").style.color  = "black";
            document.getElementById("2007_btn").style.color    = "black";
            document.getElementById("2010_btn").style.color  = "#4169e1";
            document.getElementById("2012_btn").style.color    = "black";
          }

          function show_2012(){
            document.getElementById('2000').style.display = "none";
            document.getElementById('2002').style.display = "none";
            document.getElementById('2005').style.display = "none";
            document.getElementById('2007').style.display = "none";
            document.getElementById('2010').style.display = "none";
            document.getElementById('2012').style.display = "block";
            document.getElementById("2000_btn").style.color = "black";
            document.getElementById("2002_btn").style.color     = "black";
            document.getElementById("2005_btn").style.color  = "black";
            document.getElementById("2007_btn").style.color    = "black";
            document.getElementById("2010_btn").style.color  = "black";
            document.getElementById("2012_btn").style.color    = "#4169e1";
          }

          show_2000();
        </script>

<div class="prof7" id = "prof7" style = "margin: 40px;margin-top:0px; padding:30px">

<form action = "backend\reciept.php" method = "post">
        <div class="wrapper">
                
            <div class="container">
                <div class="row"> 
                    <h5 style="font-weight: 800; padding-left: 1vw;">Pay the required amount to the given account and upload the receipt</h5>
                    <div class = "col-12"><h2 style = "color: #691313f5;"><?php echo "$cost"?></h2></div>
                    <div class = "col-12"><ul style="margin-left:1vw;">
                        <li>ACCOUNT HOLDER NAME: IIT KGP AAIR EVENTS FUND</li>
                        <li>BANK: HDFC BANK</li>
                        <li>ACCOUNT NO: 50100217409918</li>
                        <li>IFSC: HDFC0001065</li>
                        <li>MICR: 721240102</li>
                        <li>SWIFT CODE: HDFCINBBCAL</li>
                    </ul></div>

                    <div class="col-sm-12 col-md-12">
                        <label for="reciept">Drive Link for Fee Reciept <span style="color:red;">*</span></label>
                        <input class="form-control" type="text" id="reciept" name="reciept" <?php echo "$reciept"?> required>
                    </div>
                </div>

                <div class="row m-3 justify-content-md-between justify-content-around">
            <div class=" col-3">  <button class="btn btn-primary"> <a href="Utility/get_update.php" style="color:inherit;text-decoration:none" > Skip for now</a></button></div>   
            <div class="  col-3">  <button type="submit" id="submit" value = "submit" class="btn btn-primary">Submit</button></div>
            </div>
            </div>
        </div>
    </form>
</div>
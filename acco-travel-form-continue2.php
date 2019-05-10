<?php
session_start();
if ($_SESSION["email"] == "" ) {
	header('Location:homecoming.php');
}

include 'connection.php';

@$email=$_SESSION['email'];
@$arrDate=$_POST['arrDate'];
@$arrTime=$_POST['arrTime'];
@$arrSt=$_POST['arrSt'];
@$trainName=$_POST['trainName'];
@$trainNo=$_POST['trainNo'];
@$accNo=$_POST['accNo'];
@$secPhone=$_POST['secPhone'];
@$iscab=$_POST['iscab'];
@$cabWhere=$_POST['cabWhere'];
@$cabWhen=$_POST['cabWhen'];
@$cabDate=$_POST['cabDate'];
@$cabPpl=$_POST['cabPpl'];		//To be added in database column
@$depDate=$_POST['depDate'];
@$depTime=$_POST['depTime'];
@$depSt=$_POST['depSt'];
@$dtrainName=$_POST['dtrainName'];
@$dtrainNo=$_POST['dtrainNo'];
@$iscab2=$_POST['iscab2'];
@$acabPref=$_POST['acabPref'];
@$dcabPref=$_POST['dcabPref'];

@$accNo2=$_POST['accNo2'];
@$accName1=$_POST['accName1'];
@$accRel1=$_POST['accRel1'];
@$accAge1=$_POST['accAge1'];
@$accName2=$_POST['accName2'];
@$accRel2=$_POST['accRel2'];
@$accAge2=$_POST['accAge2'];
@$accName3=$_POST['accName3'];
@$accRel3=$_POST['accRel3'];
@$accAge3=$_POST['accAge3'];
@$prefName=$_POST['prefName'];
@$prefYear=$_POST['prefYear'];
@$prefDep=$_POST['prefDep'];
@$prefHall=$_POST['prefHall'];

$query1="UPDATE `sac`.`travel` SET arrivaldate='$arrDate', arrivalstation='$arrSt', trainname='$trainName', trainno='$trainNo', accompanyno='$accNo', 
secondaryphone='$secPhone' , cabreq='$iscab', cabfrom='$cabWhere', cabat='$cabWhen',arrivaltime='$arrTime' , cabdate='$cabDate' , arrivalcabpref='$acabPref' , departdate='$depDate' ,
 departtime='$depTime' , departtrain='$dtrainName' , departtrainno='$dtrainNo' , departstation='$depSt' , depcabreq='$iscab2' , depcabpref='$dcabPref', cabpeople='$cabPpl' WHERE `travel`.`email`='$email' ";

$result1=$connection->query($query1);

$query2="UPDATE `sac`.`accommodation` SET accompanyno='$accNo2', accname1='$accName1', accrel1='$accRel1', accage1='$accAge1', accname2='$accName2', 
accrel2='$accRel2', accage2='$accAge2', accname3='$accName3', accrel3='$accRel3', accage3='$accAge3', prefname='$prefName', prefyear='$prefYear', prefdep='$prefDep', 
prefhall='$prefHall' WHERE  `accomodation`.`email`='$email' ";

$result2=$connection->query($query2);

if($result1!=FALSE && $result2!=FALSE) {
	$_SESSION['form_submit']=TRUE;
	// echo '<script type="text/javascript">'; 
	// echo 'alert(" Your response is added ");'; 
	// echo 'window.location.href = "home.php";';
	// echo '</script>';
}

else {
	$_SESSION['form_submit']='fail';
	// echo '<script type="text/javascript">'; 
	// echo 'alert(" There is some problem, Please try again. ");'; 
	// echo 'window.location.href = "home.php";';
	// echo '</script>';
}
header("location: home_hc.php");

?>
<?php

    require 'phpmailer/PHPMailerAutoload.php';
    $mail= new PHPMailer();
    $mail->SMTPDebug=3;
    $mail->isSMTP();
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->isHTML(true);
    $mail->CharSet='UTF-8';
    $mail->Username='email';
    $mail->Password='password';

    $mail->setFrom('email');
    $mail->addAddress('anjaniit23@gmail.com');
 
    $mail->Subject='Testing PHP mailer';
    $mail->Body='<h1>Some Random text</h1>';  
    $mail->SMTPOptions=array('ss1'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ));
    if(!$mail->send()){
        echo $mail->ErrorInfo;
    }else{
        echo "Mail sent. :)";
    }

?>
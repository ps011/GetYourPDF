<?php

 require_once('class.phpmailer.php');

    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Username = "prasheelsoni11@gmail.com";
    $mail->Password = "37Goldy37!";
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "465";

    $mail->setFrom('prasheelsoni11@gmail.com', ' Prasheel');
    $mail->AddAddress('prasheelsoni11@mail.com', ' Goldy');

    $mail->Subject  =  'using PHPMailer';
    $mail->IsHTML(true);
    $mail->Body    = 'Hi there ,
                        <br />
                        this mail was sent using PHPMailer...
                        <br />
                        cheers... :)';

     if($mail->Send())
     {
        echo "Message was Successfully Send :)";
     }
     else
     {
        echo "Mail Error - >".$mail->ErrorInfo;
     }

?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
require "../PHPMailer/PHPMailer.php";
require "../PHPMailer/Exception.php";
require "../PHPMailer/SMTP.php";

function send_email($send_who_mail, $subject, $body){

    $mail = new PHPMailer();
    try {

        //email settings
        $mail->isSMTP();
        $mail->Host =  "smtp.gmail.com";
        //$mail->Host = "ssl://smtp.gmail.com";

        $mail->SMTPAuth = true;
        $mail->Username = "lizirukhadze4@gmail.com";
        $mail->Password = "liziTestpassword";
        $mail->Port = 465;
        //$mail->Port = 587;
        $mail->SMTPSecure = "ssl";
        //$mail->SMTPSecure = "tls";
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        //smtp settings
        $mail->isHTML(true);
        $mail->setFrom($send_who_mail, 'Lizi');
        //$mail->addAddress("IrakliMenabdeTest@gmail.com");
        $mail->addAddress($send_who_mail);
        $mail->Subject = ("liziRukhadze ($subject)");
        $mail->Body = $body;


        if($mail->send()){
            $status = "success";
            $response = "Email has been sent successfully";
        }
        else{
            $status = "failed";
            $response = "Something is wrong: ".$mail->ErrorInfo;
        }
        //echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n";
    }
    catch (Exception $e) {
        $status = "failed";
        $response = "Something is wrong: ".$mail->ErrorInfo."  e: ".$e;
    }

    //exit(json_encode(array("status" => $status, "response" => $response)));
    echo json_encode(array("status" => $status, "response" => $response));

}
